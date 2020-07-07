<?php
namespace App\Entity\Query;

abstract class ItemQuery implements ItemQueryInterface
{
    private $id;

    final public function __construct($id)
    {
        $this->id = $id;
    }

    final public function getId()
    {
        return $this->id;
    }
}
