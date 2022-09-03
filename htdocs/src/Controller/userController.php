<?php
class UserController extends Controller
{
    public function index()
    {
        //set @template to user
        $template = 'user';
        $this->model('User');
        $data = [];
        //check if @SESSION data for user Id is set
        if (isset($_SESSION['userId'])) {
            //Get user by id from database
            $data['user'] = $this->model->getUserById($_SESSION['userId']);
            $this->model('Image');
            //get all images uploaded by user
            $data['images'] = $this->model->getAllImagesByUser(
                $_SESSION['userId']
            );
        }
        //render user template to browser
        $this->renderTemplate($template, $data);
    }

    //render template to database
    public function renderTemplate($template, $data = [])
    {
        $view = $this->view('user/' . $template, ['data' => $data]);
        $view->render();
    }

    //register new user to database
    public function register()
    {
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeatPassword'];

        //check if passwords don't match echo warning and die
        if ($password != $repeatPassword) {
            echo 'passwords do not match!';
            die();
        }
        //check if email is alreay registered
        $this->model('User');
        $user = $this->model->getUserByEmail($email);

        //check if user is already in exists if ture echo warning and die
        if ($user) {
            echo 'User already exists! Please Choose a new one!';
            die();
        }

        //encrpyt password
        $password = $this->encryptPassword($password);
        //save user
        $this->model->setUserName($userName);
        $this->model->setEmail($email);
        $this->model->setPassword($password);
        $this->model->saveUser();
        //log in new user
        $this->login($email, $password);
    }

    // log user in
    public function login($email = '', $password = '')
    {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
        }

        //load the user from the data base
        $this->model('user');
        $user = $this->model->getUserByEmail($email);
        //check if user does not exist if true echo warning
        if (!$user) {
            echo 'Wrong email/password combination';
            die();
        }
        //check if email and password match in database 
        if (
            $user->getEmail() == $email &&
            $this->passwordMatch($password, $user->getPassword())
        ) {
            //set Session data
            $_SESSION['user'] = $user->getEmail();
            $_SESSION['userId'] = $user->getId();
            //return to previous page
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }

    //log user out
    public function logout()
    {
        //destroy current session
        session_destroy();
        //return to previous page
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }

    // encrpts password before saving to db
    private function encryptPassword($password)
    {
        return crypt($password, '$2y$14$WHhBmAgOMZEld9iJtv./aq');
    }

    // matches password with encrypted password and returns; true if they match; false if they don't match
    private function passwordMatch($password, $hashedPassword)
    {
        return crypt($password, '$2y$14$WHhBmAgOMZEld9iJtv./aq') ==
            $hashedPassword;
    }
}
?>
