<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28.03.2017
 * Time: 11:54
 */

namespace Blog\Model;


class Post
{
    private $id;
    private $text;
    private $title;


    public function __construct($title, $text, $id = null)
    {
        $this->title = $title;
        $this->text = $text;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getText()
    {
        return $this->text;
    }


    public function getTitle()
    {
        return $this->title;
    }



}