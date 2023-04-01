<?php
// define('ROOT', '/home/tuan9222/TaiLieuINSA/3AS5/IngenerieWeb/TD/TD2/');
// Controller de haut niveau
abstract /**/class Controller
{
    public function loadModel(string $model)
    {
        require_once(APPROOT . 'models/' . $model . '.php');
        $this->$model = new $model();
    }

    public function render($vue, array $data = [])
    {
        // var_dump($data);
        if (!empty($data)) {
            extract($data);
        }
        // echo "<h1> ************ </h1>";
        // var_dump($articles);
        // ob_start();
        // require_once(APPROOT . 'views/' . strtolower(get_class($this)) . '/' . $vue . '.php');
        // $content = ob_get_clean();
        // require_once(APPROOT . 'views/layout/default.php');
        require_once(APPROOT . 'views/inc/header.php');
        require_once(APPROOT . "views" . $vue . '.php');
        require_once(APPROOT . 'views/inc/footer.php');
    }
}

// $control = new Controller();
// $control->loadModel("Article");
?>