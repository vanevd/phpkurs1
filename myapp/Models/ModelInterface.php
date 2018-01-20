<?php
namespace Models;

interface ModelInterface
{
    public function list();

    public function add();

    public function update();

    public function delete();

}