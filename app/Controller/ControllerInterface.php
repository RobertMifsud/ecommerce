<?php
namespace App\Controller;


interface ControllerInterface
{
    public function create();
    public function read();
    public function update();
    public function delete();
}