<?php
class Images extends Controller
{
    /**
     * @var Image
     */
    private $imageModel;

    public function __construct()
    {
        $this->imageModel = $this->model('Image');
    }

    public function index($page = 1)
    {
        $_SESSION['img_page'] = $page;
        $data = [
            'images' => $this->imageModel->getSome($this->is_auth() ? $_SESSION['name'] : '', ((int)$page - 1) * 9, 9),
            'favourites' => isset($_SESSION['favourites']) ? $_SESSION['favourites'] : [],
            'page' => $page,
            'count' => $this->imageModel->count($this->is_auth() ? $_SESSION['name'] : '')
        ];
        $this->view('images', $data);
    }

    public function add()
    {
        $data = [
            'image_error' => isset($_SESSION['image_error']) ? $_SESSION['image_error'] : null
        ];
        $_SESSION['image_error'] = null;
        $this->view('add-image', $data);
    }

    public function upload()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') $this->redirect('/');
        if (
            empty($_POST['title']) ||
            empty($_POST['author']) ||
            empty($_POST['watermark']) ||
            empty($_FILES['image'])
        ) {
            $_SESSION['image_error'] = 'Wypełnij wszystkie wymagane pola.';
            http_response_code(422);
            $this->redirect('/images/add');
        }

        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
        $author = trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING));
        $watermark = trim(filter_input(INPUT_POST, 'watermark', FILTER_SANITIZE_STRING));
        $image = $_FILES['image'];
        $file_type = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        $visible = filter_input(INPUT_POST, 'visibility', FILTER_SANITIZE_STRING);
        $public = $visible == NULL || ($visible == 'public' && $this->is_auth());

        if (!$this->imageModel->is_image_valid($image)) {
            $_SESSION['image_error'] = 'Zdjęcie musi być w formacie .png, .jpg lub .jpeg i nie przekraczać 1 MB.';
            http_response_code(422);
            $this->redirect('/images/add');
        }

        $path = '/images/' . basename($image['name'], '.' . $file_type) . time() . '.' . $file_type;
        $watermark_path = '/images/watermarks/' . basename($image['name'], '.' . $file_type) . time() . '.png';
        $thumbnail_path = '/images/thumbnails/' . basename($image['name'], '.' . $file_type) . time() . '.jpg';

        move_uploaded_file($image['tmp_name'], APP_ROOT . '/web' . $path);
        $this->imageModel->createThumbnail(APP_ROOT . '/web' . $path, APP_ROOT . '/web' . $thumbnail_path);
        $this->imageModel->addWatermark(APP_ROOT . '/web' . $path, APP_ROOT . '/web' . $watermark_path, $watermark);

        $this->imageModel->create($title, $author, $watermark, $watermark_path, $thumbnail_path, $public);

        $this->redirect('/images/');
    }

    public function remember()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
            $this->redirect('/images/');

        if (!isset($_POST['favourites']))
            $image_ids = [];
        else
            $image_ids = $_POST['favourites'];

        $page = $_SESSION['img_page'];
        $_SESSION['page_fav'][$page] = $image_ids;
        $_SESSION['favourites'] = [];
        foreach ($_SESSION['page_fav'] as $page_key => $ids) {
            $_SESSION['favourites'] = array_merge($_SESSION['favourites'], $ids);
        }

        $this->redirect('/images/' . $page);
    }

    public function forget()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
            $this->redirect('/images/');

        if (!isset($_POST['favourites']))
            $image_ids = [];
        else
            $image_ids = $_POST['favourites'];

        foreach ($_SESSION['page_fav'] as $page_key => $ids) {
            $_SESSION['page_fav'][$page_key] = array_diff($ids, $image_ids);
        }

        $_SESSION['favourites'] = array_values(array_diff($_SESSION['favourites'], $image_ids));
        // var_dump($_SESSION['favourites']);
        $this->redirect('/images/favourites');
    }

    public function favourites()
    {
        $image_ids = isset($_SESSION['favourites']) ? $_SESSION['favourites'] : [];
        $data = [
            'images' => $this->imageModel->getByIds($this->is_auth() ? $_SESSION['name'] : '', $image_ids),
            'favourites' => $image_ids
        ];
        $this->view('favourites', $data);
    }

    public function search()
    {
        $this->view('search');
    }

    public function find($query = '')
    {
        $data = [
            'images' => $query != '' ? $this->imageModel->search($this->is_auth() ? $_SESSION['name'] : '', $query) : []
        ];
        $this->view('found', $data);
    }
}
