<?php
class ImageController extends Controller
{
    //index to page
    public function index()
    {
        $template = 'index';
        $data = [];
        //Check if values @id/@vote/@userId are set in url
        if (
            isset($_GET['id']) &&
            isset($_GET['vote']) &&
            isset($_SESSION['userId'])
        ) {
            //if values are set call voteOnImage function parsing values into function parameter
            $this->voteOnImage($_SESSION['userId'], $_GET['id'], $_GET['vote']);
        }
        $this->model('Image');
        //Check if values @id is set and @vote is not set in url
        if (isset($_GET['id']) && !isset($_GET['vote'])) {
            //set template to image view
            $template = 'image';
            //retrieve image from database where id is a match and load into @data
            $data = $this->model->getImageById($_GET['id']);
            //add a view to image and update views in database
            $data->incrementImageViews();
            //check if @catagory is set in url
        } elseif (isset($_GET['category'])) {
            //set template to category
            $template = 'category';
            //load images by category into @data from database
            $data['images'] = $this->model->getImagesByCategories(
                $_GET['category']
            );
        } else {
            //set template into index
            $template = 'index';
            //load all images into @data
            $data['images'] = $this->model->getAllImages();
            //load all catagories into @data
            $data['categories'] = $this->model->getAllCategories();
        }
        //render template in browser
        $this->renderTemplate($template, $data);
    }

    //renders template into browser
    public function renderTemplate($template, $data = [])
    {
        $view = $this->view('image/' . $template, ['data' => $data]);
        $view->render();
    }

    //load file into server from local files
    private function uploadImage($file, $dir, $userId)
    {
        $name = $file['name'];

        //check if directory exists
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        //check if file already exists
        if (file_exists("$dir/$name")) {
            //throw err/message
            echo '<h4>file already exsists</h4>';
            die();
        }
        //upload file
        move_uploaded_file($file['tmp_name'], "$dir/$name");
    }

    //function that checks if user has voted ,if they have checks if they are changing their vote and updates vote in database, else create new user vote in database and increment image vote
    public function voteOnImage($userId, $imageId, $vote)
    {
        $this->model('image');
        $image = $this->model->getImageByID($imageId);

        //check if user has voted in database
        $this->model('UserVotes');
        $userVote = $this->model->checkUserVote($userId, $image->getId());
        if ($userVote) {
            //if user has voted check if they are changing their vote else do nothing
            if ($userVote->getVote() != $_GET['vote']) {
                if ($_GET['vote'] == 'up') {
                    $userVote->setVote($_GET['vote']);
                    $userVote->changeUserVote();
                    $image->incrementImageVotes();
                }
                if ($_GET['vote'] == 'down') {
                    $userVote->setVote($_GET['vote']);
                    $userVote->changeUserVote();
                    $image->decrementImageVotes();
                }
            }
            //esle if ther is no user vote in database create new user vote and update vote on image
        } else {
            // create new user vote to insert into database
            $this->model->setUserId($userId);
            $this->model->setImageId($imageId);
            $this->model->setVote($vote);
            $this->model->saveUserVote();
            //update vote on image
            if ($vote == 'up') {
                $image->incrementImageVotes();
            }
            if ($vote == 'down') {
                $image->decrementImageVotes();
            }
        }
        //return to previous page
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}
?>
