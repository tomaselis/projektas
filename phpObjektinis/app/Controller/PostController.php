<?php


namespace App\Controller;

use Core\Controller;
class PostController extends Controller
{

        //echo 'Content from PostController';

    public function index(){
        $postsObject = new \App\Model\PostModel();
        $this->view->posts = $postsObject->getPosts();


        //$this->view->render('page/header');
        $this->view->render('posts/posts');
        //$this->view->render('page/footer');
    }
    public function show()
    {
        //echo 'Vienas postas';
        $id = (int)$_GET['id'];
        $postsObject = new \App\Model\PostModel();
        $postsObject->load($id);
        $this->view->post = $postsObject;
        $this->view->render('posts/post');
    }
    public function create(){
        $this->view->render('posts/admin/create');

        //atvaizduoti create forma
    }
    public function store(){
        $data = $_POST;
        //print_r($_POST);
        //die();
        $postModelObject = new \App\Model\PostModel();
        $postModelObject->setTitle($_POST['title']);
        $postModelObject->setContent($_POST['content']);
        $postModelObject->setImage($_POST['img']);
        $postModelObject->setAuthorId(1);
        $postModelObject->save();
        $postModelObject->redirect('http://194.5.157.92/phpObjektinis/index.php');


        //redirectas
        //kviesime postmodel klase ir create post metoda
        //redirect i index metoda
    }
}