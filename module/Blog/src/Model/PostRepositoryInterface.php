<?php
namespace Blog\Model;
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28.03.2017
 * Time: 11:49
 */
interface PostRepositoryInterface
{
    public function findAllPosts();
    public function findPost($id);

}