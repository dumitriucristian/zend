<?php

namespace Album\Form;

use Zend\Form\Form;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 23.03.2017
 * Time: 17:14
 */
class AlbumForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('album');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'title',
            'type' => 'text',
            'options' => [
                'label' => 'Title',
            ],
        ]);
        $this->add([
            'name' => 'artist',
            'type' => 'text',
            'options' => [
                'label' => 'Artist',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}