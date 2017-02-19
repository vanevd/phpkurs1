<?php
namespace Models;
require_once "Models/BaseModel.php";

class Product extends BaseModel
{
   public function index($request, $apply_search = false, $search_fields = [])
    {
        $sql="select * from products\n";
        $sql.="where (1=1)\n";
        if ($apply_search) {
            $s_product_name=$search_fields["product_name"] ?? "";
            $s_product_code=$search_fields["product_code"] ?? "";
            $s_price=$search_fields["price"] ?? "";
            if (strlen($s_product_name)>0) {
                $sql.="and(product_name like '%".$s_product_name."%')\n";
            }
            if (strlen($s_product_code)>0) {
                $sql.="and(product_code like '%".$s_product_code."%')\n";
            }
            if (strlen($s_price)>0) {
                $sql.="and(price like '%".$s_price."%')\n";
            }
        }    
        $result = $this->getDb()->query($sql);

        $products = [];
        while ($product = $result->fetch_assoc()) {
            $products[] = $product;
        } 
        return $products;
    }
    
    public function show($id)
    {
        $sql="select * from products\n";
        $sql.="where id=%d";
        $query=sprintf($sql,$id);
        $result = $this->getDb()->query($query);
        return $result->fetch_assoc();
    }
    
    public function update($id, $request)
    {
        $sql="update products set\n";
        $sql.="product_name='%s',\n";
        $sql.="product_code='%s',\n";
        $sql.="price='%s'\n";
        $sql.="where id=%d";
        $query=sprintf($sql,$request["product_name"],$request["product_code"],$request["price"],$id);
        $result = $this->getDb()->query($query);
    }
    
    public function store($request)
    {
        $sql="insert into products (product_name, product_code, price)\n";
        $sql.="values('%s','%s','%s')";
        $query=sprintf($sql,$request["product_name"],$request["product_code"],$request["price"]);
        $this->getDb()->query($query);
    }
    
    public function destroy($id) 
    {
        $sql="delete from products\n";
        $sql.="where id=%d";
        $query=sprintf($sql,$id);
        $result = $this->getDb()->query($query);
    }
    
}