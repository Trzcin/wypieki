<?php
class Users extends Controller
{
    /** 
     * @var User
     */
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST' || $this->is_auth()) $this->redirect('/');
        if (empty($_POST['name']) || empty($_POST['password'])) {
            http_response_code(422);
            exit();
        }
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $name = rtrim($_POST['name']);
        $password = $_POST['password'];
        $user = $this->userModel->findOne($name);
        if (!$user || !password_verify($password, $user['password_hash'])) {
            http_response_code(401);
            exit();
        }

        $_SESSION['name'] = $name;
        $this->redirect('/');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST' || $this->is_auth()) $this->redirect('/');
        if (
            empty($_POST['name']) ||
            empty($_POST['password']) ||
            empty($_POST['confirm_password'])
        ) {
            http_response_code(422);
            exit();
        }
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $name = rtrim($_POST['name']);

        if ($_POST['password'] != $_POST['confirm_password']) {
            http_response_code(422);
            exit();
        }
        # check if name is already taken
        if ($this->userModel->findOne($name)) {
            http_response_code(409);
            exit();
        }

        $user_data = [
            'name' => $name,
            'password_hash' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];
        $this->userModel->create($user_data);

        $_SESSION['name'] = $name;
        $this->redirect('/');
    }

    public function logout()
    {
        if ($this->is_auth()) {
            session_destroy();
            session_unset();
            $_SESSION = [];
        }
        $this->redirect('/');
    }
}
