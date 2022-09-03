<?php
class View
{
    protected $file;
    protected $data;

    //view object constructor
    public function __construct($file, $data)
    {
        $this->file = $file;
        $this->data = $data;
    }

    //render view to browser
    public function render()
    {
        //check if view file exists
        if (file_exists(VIEW . $this->file . '.php')) {
            //loads view file into browser
            include VIEW . $this->file . '.php';
        }
    }
}
?>
