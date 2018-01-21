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

    public function list()
    {
        $query =  "select * from {$this->table}";
        $items = $this->mysqli->query($query);
        while ($item = $items->fetch_assoc()) {
            foreach ($this->fields as $field) {
                echo "$field" . ": " . $item[$field] . "\n";
            }
            echo "\n";
        }
    }

}

