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

    public function list()
    {
        return $this->provider->list();
    }

    public function add(){
        return $this->provider->add();
    }

    public function update()
    {
        return $this->provider->update();
    }

    public function delete()
    {
        return $this->provider->delete();
    }
    
}

