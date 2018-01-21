<?php
namespace Providers;

use Models\ModelInterface;

class JsonProvider extends BaseProvider implements ModelInterface
{

    public function list()
    {
        $json = file_get_contents("json/" . $this->table . ".json");
    }

}

