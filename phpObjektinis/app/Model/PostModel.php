<?php


namespace App\Model;

use Core\Database;

class PostModel
{
    private $title;
    private $content;
    private $image;
    private $authorId;

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function getPosts()
    {
        $db = new Database();
        $db->select()->from('post');
        return $db->getAll();
    }

    public function load($id)
    {
        $db = new Database();
        $db->select()->from('post')->where('id', $id);
        $post = $db->get();
        $this->title = $post->title;
        $this->content = $post->content;
        $this->authorId = $post->author_id;
        $this->image = $post->img;
    }


    public function save()
    {
        $tableFields = "title, content, img, author_id";
        $values = "'".$this->title."','".$this->content."','".$this->image."','".$this->authorId."'";
        $db = new Database();
        $db->insert('post', $tableFields, $values);
        return $db->get();
    }
        //  $this->title


    public function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }
}

