<?php
namespace Models;

class BaseModel implements ModelInterface
{
    protected $provider;
    
    public function __construct($params)
    {
        $provider_class = 'Providers\\' . $params['provider'] . 'Provider';
        $this->provider = new $provider_class($this->table, $this->fields);
    }

    public function list($filter)
    {
        return $this->provider->list($filter);
    }

    public function add($row){
        return $this->provider->add($row);
    }

    public function update($id, $row)
    {
        return $this->provider->update($id, $row);
    }

    public function delete($id)
    {
        return $this->provider->delete($id);
    }
    
}

