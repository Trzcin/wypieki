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

    public function account()
    {
        if ($this->is_auth())
            $this->redirect('/');
        else {
            $data = [
                'login_error' => isset($_SESSION['errors']['login']) ? $_SESSION['errors']['login'] : null,
                'register_error' => isset($_SESSION['errors']['register']) ? $_SESSION['errors']['register'] : null
            ];
            $_SESSION['errors'] = [];
            $this->view('account', $data);
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST' || $this->is_auth()) $this->redirect('/');
        if (empty($_POST['name']) || empty($_POST['password'])) {
            $_SESSION['errors']['login'] = 'Wypełnij wszystkie wymagane pola.';
            http_response_code(422);
            $this->redirect('/users/account');
        }

        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
        $password = $_POST['password'];

        $user = $this->userModel->findOne($name);
        if (!$user || !password_verify($password, $user['password_hash'])) {
            $_SESSION['errors']['login'] = 'Nazwa użytkownika lub hasło są niepoprawne.';
            http_response_code(401);
            $this->redirect('/users/account');
        }

        session_regenerate_id();
        $_SESSION = [];
        $_SESSION['name'] = $name;
        $this->redirect('/');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST' || $this->is_auth()) $this->redirect('/');
        if (
            empty($_POST['email']) ||
            empty($_POST['name']) ||
            empty($_POST['password']) ||
            empty($_POST['confirm_password'])
        ) {
            $_SESSION['errors']['register'] = 'Wypełnij wszystkie wymagane pola.';
            http_response_code(422);
            $this->redirect('/users/account');
        }

        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password != $confirm_password) {
            $_SESSION['errors']['register'] = 'Hasła muszą być identyczne.';
            http_response_code(422);
            $this->redirect('/users/account');
        }
        # check if name is already taken
        if ($this->userModel->findOne($name)) {
            $_SESSION['errors']['register'] = 'Nazwa użytkownika jest już zajęta.';
            http_response_code(409);
            $this->redirect('/users/account');
        }

        $this->userModel->create($name, $email, password_hash($password, PASSWORD_DEFAULT));

        session_regenerate_id();
        $_SESSION = [];
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
