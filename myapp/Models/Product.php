<?php
namespace Models;

class Product extends BaseModel implements ModelInterface
{
    protected $table = 'products';
    protected $fields = ['name', 'code'];
}