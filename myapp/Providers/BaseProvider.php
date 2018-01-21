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
    
    public function list()
    {

    }

    public function add()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

