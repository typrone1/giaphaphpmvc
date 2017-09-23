<?php
/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 20/09/2017
 * Time: 11:24 PM
 */
namespace Core;
use App\Auth;
use App\Flash;

class View
{
    public static function render($view, $args =[]){
        $file = "../App/Views/$view";
        extract($args, EXTR_SKIP);
        if (is_readable($file)){
            require $file;
        }
        else {
            echo "$file not found";
        }
    }
    public static function renderTemplate($template, $args = []){
        static $twig = null;
        if ($twig === null){
            $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig_Environment($loader);
//            $twig->addGlobal('session', $_SESSION);
//            $twig->addGlobal('is_logged_in', Auth::isLoggedIn());
            $twig->addGlobal('current_user', Auth::getUser());
            $twig->addGlobal('flash_messages', Flash::getMessages());

        }
        echo $twig->render($template, $args);
    }
}