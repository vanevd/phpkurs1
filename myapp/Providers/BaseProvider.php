<?php
namespace Providers;

use Models\ModelInterface;

class BaseProvider implements ModelInterface
{
    protected $fields;
    protected $table;

    public function __construct($table, $fields)
    {
        $this->table = $table;
        $this->fields = $fields;
    }
    
    public function list($filter)
    {

    }

    public function add($row)
    {

    }

    public function update($id, $row)
    {

    }

    public function delete($id)
    {

    }
}

