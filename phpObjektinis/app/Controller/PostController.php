<?php


namespace App\Controller;

use App\Model\CategoriesModel;
use App\Model\PostModel;
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
//      $this->view->posts = $postsObject->getPosts();


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
        if (currentUser()) {
//            $this->view->render('posts/admin/create');

        //atvaizduoti create forma

        $form = new \App\Helper\FormHelper(url('post/store'), 'post', 'wrapper');
        $form->addInput([
            'name' =>  'title',
            'type' => 'text',
            'placeholder' => 'Enter your Blog Title',
            ])
            ->addTextarea([
                'name' => 'content',
                'placeholder' => 'Write your blog here',
                'rows'=> '10',
                'cols'=> '50',
            ])
            ->addInput([
                'name' =>  'img',
                'type' => 'text',
                'placeholder' => 'Please insert link for you image here',
            ])
            ->addButton([
                'name' => 'register',
                'type' => 'submit',
                'value' => 'register',
            ], "", "button", "");
        $this->view->form = $form->get();
        $this->view->render('posts/admin/create');

        }else{
            echo 404;
        }
    }

    public function store()
    {
        if (currentUser()) {
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
            $helper->redirect('post/');
        } else {
            echo 404;
        }


        //redirectas
        //kviesime postmodel klase ir create post metoda
        //redirect i index metoda
    }

    public function edit($id)
    {
        if (currentUser()) {
            $postModelObject = new PostModel();
            $postModelObject->load($id);

            //        $this->view->render('posts/admin/edit');

            $selectedCategories = [];
            foreach ($postModelObject->getCategories() as $cat) {
                $selectedCategories[] = $cat->category_id;
            }
            $form = new \App\Helper\FormHelper(url('post/update'), 'post', 'wrapper');
            $form->addInput([
                'name' => 'title',
                'type' => 'text',
                'placeholder' => 'Enter your Blog Title',
                'value' => $postModelObject->getTitle()
            ])
                ->addInput([
                    'name' => 'id',
                    'type' => 'hidden',
                    'value' => $postModelObject->getId()
                ])
                ->addTextarea([
                    'name' => 'content',
                    'placeholder' => 'Write your blog here',
                    'rows' => '10',
                    'cols' => '50',

                ], $postModelObject->getContent())
                ->addInput([
                    'name' => 'img',
                    'type' => 'text',
                    'placeholder' => 'Please insert link for you image here',
                    'value' => $postModelObject->getImage()
                ]);

            $allCategories = CategoriesModel::getCategories();
            foreach ($allCategories as $category) {
                if (in_array($category->id, $selectedCategories)) {
                    $form->addInput([
                        'name' => 'category[]',
                        'type' => 'checkbox',
                        'checked' => 'checked',
                        'value' => $category->id,
                    ], $category->name, 'cat');
                } else {
                    $form->addInput([
                        'name' => 'category[]',
                        'type' => 'checkbox',
                        'value' => $category->id,
                    ], $category->name, 'cat');
                }
            }
            $form->addButton([
                'name' => 'register',
                'type' => 'submit',
                'value' => 'register',
            ], "", "button", "");

            $this->view->form = $form->get();
            $this->view->render('posts/admin/edit');

        } else {
            echo 404;
        }
    }

    public function update()
    {
//        debug($_POST['category']);
        if (currentUser()) {
//
            if (currentUser()) {
                $data = $_POST;
                $postModelObject = new \App\Model\PostModel();
                $postModelObject->load($_POST['id']);
                $postModelObject->setTitle($_POST['title']);
                $postModelObject->setContent($_POST['content']);
                $postModelObject->setAuthorId(1);
                $postModelObject->setImage($_POST['img']);
                $postModelObject->save();
                $postModelObject->setCategories($_POST['category']);
                $helper = new Helper();
                $helper->redirect('post/');
            } else {
                echo 404;
            }
        }
    }
}
//    public function delete($id)
////    {
////        if (currentUser()) {
//////    $id = (int)$_GET['id'];
////            $postModelObject = new \App\Model\PostModel();
////            $postModelObject->delete($id);
////            $helper = new Helper();
////            $helper->redirect('post/');
////        }else {
////            echo 404;
////        }
////    }

//      $postModelObject->redirect('http://194.5.157.92/phpObjektinis/index.php/post');
