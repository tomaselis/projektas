<?php


namespace App\Controller;

use Core\Controller;
use \App\Helper\Helper;

class PostController extends Controller
{

    //echo 'Content from PostController';

    public function index()
    {
        $this->view->posts = \App\Model\PostModel::getPosts();
        $this->view->render('posts/posts');
//      $postsObject = new \App\Model\PostModel();
//        $this->view->posts = $postsObject->getPosts();


        //$this->view->render('page/header');

        //$this->view->render('page/footer');
    }

    public function show($id)
    {
        //echo 'Vienas postas';

        $postsObject = new \App\Model\PostModel();
        $postsObject->load($id);
        $this->view->post = $postsObject;

        $this->view->render('posts/post');
    }

    public function create()
    {
        $this->view->render('posts/admin/create');

        //atvaizduoti create forma
    }

    public function store()
    {
        $data = $_POST;
        //print_r($_POST);
        //die();
        $postModelObject = new \App\Model\PostModel();
        $postModelObject->setTitle($_POST['title']);
        $postModelObject->setContent($_POST['content']);
        $postModelObject->setImage($_POST['img']);
        $postModelObject->setAuthorId(1);
        $postModelObject->save();
        $helper = new Helper();
        $helper->redirect('http://194.5.157.92/phpObjektinis/index.php');


        //redirectas
        //kviesime postmodel klase ir create post metoda
        //redirect i index metoda
    }

    public function edit($id)
    {
//        $id = (int)$_GET['id'];
        $postModelObject = new \App\Model\PostModel();
        $postModelObject->load($id);
        $this->view->post = $postModelObject;
        $this->view->render('posts/admin/edit');
//        echo '<pre>';
//        print_r($postModelObject);
//        die();
//        $id = (int)$_GET['id'];
//        $postObject = new \App\Model\PostModel();
//        $postObject->load($id);
//        $this->view->post = $postObject;
//
    }

    public function update()
    {
        $data = $_POST;
        //print_r($_POST);
        //die();
        $postModelObject = new \App\Model\PostModel();
        $postModelObject->setTitle($_POST['title']);
        $postModelObject->setContent($_POST['content']);
        $postModelObject->setImage($_POST['img']);
        $postModelObject->setAuthorId(1);
        $postModelObject->save($data['id']);
        $helper = new Helper();
        $helper->redirect('http://194.5.157.92/phpObjektinis/index.php');
    }


    public function delete($id)
    {
//    $id = (int)$_GET['id'];
        $postModelObject = new \App\Model\PostModel();
        $postModelObject->delete($id);
        $helper = new Helper();
        $helper->redirect('http://194.5.157.92/phpObjektinis/index.php');
    }
}
//      $postMOdelObject->redirect('http://194.5.157.92/phpObjektinis/index.php/post');
