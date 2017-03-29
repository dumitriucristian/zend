<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28.03.2017
 * Time: 18:39
 */

namespace Blog\Model;


interface PostCommandInterface
{
    public function insertPost(Post $post);

    public function updatePost(Post $post);

    public function deletePost(Post $post);
    

}