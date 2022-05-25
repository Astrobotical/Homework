<?php
class config
{
    function setusername()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode('/', $uri);
        if (($uri[1]) == 'localhost' && ($uri[2]) == 'Homework') {
            return "root";
        } else {
            return "u695548073_Bigdaddy";
        }
    }

    function setpassword()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode('/', $uri);
        if (($uri[1]) == 'localhost' && ($uri[2]) == 'Homework') {
            return "";
        } else {
            return "Mishaivey11";
        }
    }

    function sethostname()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode('/', $uri);
        if (($uri[1]) == 'localhost' && ($uri[2]) == 'Homework') {
            return 'localhost';
        } else {
            return "localhost";
        }
    }

}