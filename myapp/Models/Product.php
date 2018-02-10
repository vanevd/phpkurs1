<?php
namespace Models;

class Product extends BaseModel implements ModelInterface
{
    protected $table = 'products';
    protected $fields = ['id', 'product_name', 'product_code', 'price'];
}