<?php
namespace Models;

class Hotel extends BaseModel implements ModelInterface
{
    protected $table = 'hotels';
    protected $fields = ['name', 'city_id', 'email', 'url', 'category', 'client_group_id' ];

}