<?php
namespace App\CommandFactory;

interface CommandFactory
{
    public function createCommand($apiRecourse);
    public function updateCommand($entity, $apiRecourse);
    public function deleteCommand($entity);

}
