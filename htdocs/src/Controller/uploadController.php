<?php
class uploadController extends Controller
{
    public function index()
    {
        //render upload form to browser
        $data = [''];
        $this->renderTemplate('index', $data);
    }
    //render template to browser
    public function renderTemplate($template, $data = [])
    {
        $view = $this->view('upload/' . $template, ['data' => $data]);
        $view->render();
    }

    //function that uploads image to database
    public function upload()
    {
        //set values from form post
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $userId = $_SESSION['userId'];
        //check if file upload type is local or online from form post
        $file =
            $_POST['upload-type'] == 'online-file'
                ? $_POST['image-url']
                : $_FILES['file'];
        // load values into image object
        $this->model('Image');
        $this->model->setTitle($title);
        $this->model->setDescription($description);
        $this->model->setCategory($category);
        $this->model->setUser($userId);
        //checks if file type is local or online
        if ($_POST['upload-type'] == 'online-file') {
            //set path to image url if online
            $this->model->setPath($file);
        } else {
            //set @dir to file location on server
            $dir = '/uploads/' . $userId . '/';
            //set path to image to @dir + name of file
            $this->model->setPath($dir . $file['name']);
            $this->uploadImage($file, PUBLIC_DIR . $dir, $userId);
        }
        //save image to data base
        $this->model->saveImage();
        //return to previous page
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}
?>
