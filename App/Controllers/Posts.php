<?php
namespace App\Controllers;
use App\Models\Post;
use Core\Controller;
use Core\View;

/**
 * Created by PhpStorm.
 * User: Huu Ty
 * Date: 17/09/2017
 * Time: 4:50 PM
 */
class Posts extends Controller
{
    public function indexAction(){
        $posts = Post::getAll();
        View::renderTemplate('Posts/index.html',['posts' => $posts]);
    }
    public function addNewAction(){
        echo "Hello from add New";
    }
    public function editAction(){
        echo "<pre>";
        print_r($this->routeParams);
        echo "</pre>";
    }
    public static function getAll(){
        print_r(Post::getAll());
    }
}