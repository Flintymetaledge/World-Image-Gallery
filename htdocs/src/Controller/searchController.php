<?php
class SearchController extends Controller
{
    public function index()
    {
        //set @query to url query value
        $query = $_GET['query'];
        $this->model('Image');
        //get all images that match query
        $data['images'] = $this->model->getAllImages($query);
        //render search template to browser
        $this->renderTemplate('search', $data);
    }
    //render template to browser
    public function renderTemplate($template, $data = [])
    {
        $view = $this->view('Search/' . $template, ['data' => $data]);
        $view->render();
    }
}
?>
