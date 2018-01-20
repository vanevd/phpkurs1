<?php
namespace Models;

class Hotel extends BaseModel implements ModelInterface
{

    public function list($params)
    {
        return $this->provider->list($params);
    }

    public function add($params){
        return $this->provider->add($params);
    }

    public function update($params)
    {
        return $this->provider->update($params);
    }

    public function delete($params)
    {
        return $this->provider->delete($params);
    }


}