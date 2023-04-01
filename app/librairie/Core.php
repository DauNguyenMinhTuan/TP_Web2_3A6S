<?php

class Core
{
    protected $CurrentController = "Pages";
    protected $CurrentMethod = "index";
    protected $params = [];

    public function __construct()
    {
        $params = $this->geturl();
        if (!$params || $params[0] == "") {
            $controller = $this->CurrentController;
            $action = $this->CurrentMethod;
        } else {
            $controller = ucfirst($params[0]);
            $action = isset($params[1]) ? $params[1] : 'index';
        }
        if (!file_exists(APPROOT . 'controller/' . $controller . '.php')) {
            http_response_code(404);
            echo "La page recherchée n'existe pas";
        } else {
            require_once(APPROOT . 'controller/' . $controller . '.php');
            $controller = new $controller();
        }
        if (method_exists($controller, $action)) {
            unset($params[0]);
            unset($params[1]);
            call_user_func_array([$controller, $action], $params);
        } else {
            http_response_code(404);
            echo "La page recherchée n'existe pas";
        }
    }

    public function geturl()
    {
        $params = [];
        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']
            === 'on' ? "https" : "http") .
            "://" . $_SERVER['HTTP_HOST'] .
            $_SERVER['REQUEST_URI'];

        if (!isset(parse_url($link)['query'])) {
            return $params;
        }
        $query = parse_url($link)['query'];

        parse_str($query, $params);
        $params = explode("/", $params['url']);
        return $params;
    }
}

?>