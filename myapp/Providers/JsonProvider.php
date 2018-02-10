<?php
namespace Providers;

use Models\ModelInterface;

class JsonProvider extends BaseProvider implements ModelInterface
{

    public function list($filter)
    {
        $json = file_get_contents("json/" . $this->table . ".json");
        $items = json_decode($json, true);
        foreach ($items as $item) {
            foreach ($this->fields as $field) {
                echo "$field" . ": " . $item[$field] . "\n";
            }
            echo "\n";
        }
    }

}

