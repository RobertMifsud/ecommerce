<?php
namespace App\Controller;


interface ControllerInterface
{
    public function create();
    public function read();
    public function update($_id);
    public function delete();
}