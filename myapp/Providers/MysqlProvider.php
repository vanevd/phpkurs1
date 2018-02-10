<?php
namespace Providers;

use Models\ModelInterface;
use App;

class MysqlProvider extends BaseProvider implements ModelInterface
{
    protected $mysqli;

    public function __construct($table, $fields)
    {
        $this->table = $table;
        $this->fields = $fields;
        
        $this->mysqli = App::mysql_connect();
    }

    public function list($filter)
    {
        $query =  "select * from {$this->table} order by id";
        $items = $this->mysqli->query($query);
        while ($item = $items->fetch_assoc()) {
            foreach ($this->fields as $field) {
                echo "$field" . ": " . $item[$field] . "\n";
            }
            echo "\n";
        }
    }

    public function add($row)
    {
        $fields = "";
        $values = "";
        foreach ($row as $key => $value) {
            if (strlen($fields) > 0) {
                $fields = $fields . ",";
                $values = $values . ",";
            }
            $fields = $fields . $key;
            $values = $values . "'".addslashes($value)."'";
        }
        $query = "insert into {$this->table}($fields) values($values)";
        echo $query . "\n";
        $result = $this->mysqli->query($query);
    }    

}

