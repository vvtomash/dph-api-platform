<?php
namespace App\Entity\Query;

class UserQuery
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
