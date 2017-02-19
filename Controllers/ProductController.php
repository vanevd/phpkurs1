<?php
namespace Controllers;
require_once "Controllers/BaseController.php";
require_once "Models/Product.php";

use Models\Product;

class ProductController extends BaseController
{
    public function handle($app)
    {        
        $edit_id=-1;
        $btn_value="Save";
        $errors=[];
        $product_name="";
        $product_code="";
        $price="";
        $s_product_name="";
        $s_product_code="";
        $s_price="";

        if (isset($_REQUEST["save_btn"])){
            $is_valid = true;
            if (strlen($_REQUEST["product_name"]) == 0) {
                $is_valid = false;
                $errors[] = "Field product name must have a value.";
            }
            if (strlen($_REQUEST["product_code"]) == 0) {
                $is_valid = false;
                $errors[] = "Field product code must have a value.";
            }
            if (strlen($_REQUEST["price"]) == 0) {
                $is_valid = false;
                $errors[] = "Field price must have a value.";
            }
            if ($is_valid){
                if ($_REQUEST["save_btn"]=="Save") {
                    $product = new Product($app);
                    $product->store($_REQUEST);
                }
                if ($_REQUEST["save_btn"]=="Update"){
                    $edit_id=$_REQUEST["edit_id"];
                    $product = new Product($app);
                    $product->update($edit_id, $_REQUEST);
                }
            } else {
                $product_name = $_REQUEST["product_name"];
                $product_code = $_REQUEST["product_code"];
                $phone = $_REQUEST["price"];
            }
        }
        $operation="list";
        if (isset($_REQUEST["operation"])) {
            $operation=$_REQUEST["operation"];
        }
        if ($operation=="delete"){
            $id=$_REQUEST["id"];
            $product = new Product($app);
            $product->destroy($id);
        }
        if ($operation=="edit"){
            $id=$_REQUEST["id"];
            $edit_id=$id;
            $product = new Product($app);
            $product_item = $product->show($id);
            $product_name=$product_item["product_name"];
            $product_code=$product_item["product_code"];
            $price=$product_item["price"];
            $btn_value="Update";
        }

        $product = new Product($app);
        if (isset($_REQUEST['search_btn'])) {
            $search_fields = [];
            $search_fields['product_name'] = $_REQUEST['s_product_name'] ?? "";
            $search_fields['product_code'] = $_REQUEST['s_product_code'] ?? "";
            $search_fields['price'] = $_REQUEST['s_price'] ?? "";
            $data['products'] = $product->index($_REQUEST, true, $search_fields);
        } else {
            $data['products'] = $product->index($_REQUEST);
        }
        
        $data['edit_id'] = $edit_id;
        $data['product_name'] = $product_name;
        $data['product_code'] = $product_code;
        $data['price'] = $price;
        if (isset($_REQUEST['search_btn'])) {
            $data['s_product_name'] = $_REQUEST['s_product_name'] ?? "";
            $data['s_product_code'] =  $_REQUEST['s_product_code'] ?? "";
            $data['s_price'] =  $_REQUEST['s_price'] ?? "";
        }    
        $data['btn_value'] = $btn_value;
        $data['errors'] = $errors;

        echo $app->getTemplate()->render('products-template.php', $data);
    }    
}
