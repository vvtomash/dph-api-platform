<?php
namespace App\CommandFactory;

interface CommandFactory
{
    public function createCommand($data);
    public function updateCommand($data);
    public function deleteCommand($data);
}
