<?php
namespace Blog\Controller;

//controller must implement DispatchableInterface in order to be dispatched

use Blog\Model\PostRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; //this permit variable rendiering;

//index.phtml is required
//view/{namespace}/{controller}/{action}.phtml.

/**
 * Created by PhpStorm.
 * User: root
 * Date: 28.03.2017
 * Time: 11:40
 */
class ListController extends AbstractActionController
{

    private $postRepository;

    //constructor injection - dependencies that are required by a class at all time
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }


    public function indexAction()
    {
        return new ViewModel([
            'posts' => $this->postRepository->findAllPosts(),
        ]);
    }


}