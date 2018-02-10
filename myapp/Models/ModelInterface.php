<?php
namespace Models;

interface ModelInterface
{
    public function list($filter);

    public function add($row);

    public function update($id, $row);

    public function delete($id);

}