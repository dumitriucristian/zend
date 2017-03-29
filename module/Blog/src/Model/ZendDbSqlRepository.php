<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28.03.2017
 * Time: 18:46
 */

namespace Blog\Model;

use InvalidArgumentException;
use RuntimeException;
use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Driver\ResultInterface;
//use Zend\Db\ResultSet\ResultSet;
use Zend\Hydrator\Reflection as ReflectionHydrator;
use Zend\Db\ResultSet\HydratingResultSet;

class ZendDbSqlRepository implements PostRepositoryInterface
{

    private $db;

    public function __construct(AdapterInterface $db)
    {
        $this->db = $db;
    }
    
    public function findAllPosts()
    {
        $sql    = new Sql($this->db);
        $select = $sql->select('posts');
        $statement   = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if ( ! $result instanceof ResultInterface && ! $result->isQueryResult() ) {
           return [];
        }

        $resultSet = new HydratingResultSet(
            new ReflectionHydrator(),
            new Post('','')
        );

          $resultSet->initialize($result);
          return $resultSet;
            die('no data');
    }

    public function findPost($id)
    {

    }

}