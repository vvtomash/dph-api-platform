<?php
namespace App\Command;

interface Command
{
    public function getEntity();
    public function getApiResource();
}
