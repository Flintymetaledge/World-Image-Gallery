<?php
class Application
{
    protected $controller = 'imageController';
    protected $action = 'index';
    protected $show404 = true;

    function __construct()
    {
        $this->parseURL();

        //check if controller file exists
        if (file_exists(CONTROLLER . $this->controller . '.php')) {
            //check if method exists and controller exists
            if (method_exists($this->controller, $this->action)) {
                //Create new controller object
                $this->controller = new $this->controller();
                //call function from controler object
                call_user_func_array([$this->controller, $this->action], []);
                $this->show404 = false;
            }
        }

        //echo 404 error if no controler or method found
        if ($this->show404) {
            echo '<h4>Error: 404, not found</h4>';
        }
    }

    private function parseURL()
    {
        //remove '/' from start and end of url request
        $request = trim($_SERVER['REQUEST_URI'], '/');
        //check for GET parameter
        if (strpos($request, '?')) {
            //remove GET param from request
            $request = substr($request, 0, strpos($request, '?'));
        }
        //check if requst is empty
        if (!empty($request)) {
            //create string array by separating on '/'
            $url = explode('/', $request);
            if ($url) {
                //update controller to new controller
                $this->controller = $url[0] . 'Controller';
                //check method to be used by controller object
                $this->action = isset($url[1]) ? $url[1] : $this->action;
            }
        }
    }
}
?>
