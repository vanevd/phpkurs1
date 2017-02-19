<?php
namespace Models;
require_once "Models/BaseModel.php";

class Client extends BaseModel
{
    public function index($request, $apply_search = false, $search_fields = [])
    {
        $sql="select * from clients\n";
        $sql.="where (1=1)\n";
        if ($apply_search) {
            $s_first_name=$search_fields["first_name"] ?? "";
            $s_last_name=$search_fields["last_name"] ?? "";
            $s_phone=$search_fields["phone"] ?? "";
            $s_email=$search_fields["email"] ?? "";
            if (strlen($s_first_name)>0) {
                $sql.="and(first_name like '%".$s_first_name."%')\n";
            }
            if (strlen($s_last_name)>0) {
                $sql.="and(last_name like '%".$s_last_name."%')\n";
            }
            if (strlen($s_phone)>0) {
                $sql.="and(phone like '%".$s_phone."%')\n";
            }
            if (strlen($s_email)>0) {
                $sql.="and(email like '%".$s_email."%')\n";
            }
        }    
        $result = $this->getDb()->query($sql);

        $clients = [];
        while ($client = $result->fetch_assoc()) {
            $clients[] = $client;
        } 
        return $clients;
    }
    
    public function show($id)
    {
        $sql="select * from clients\n";
        $sql.="where id=%d";
        $query=sprintf($sql,$id);
        $result = $this->getDb()->query($query);
        return $result->fetch_assoc();
    }
    
    public function store($request)
    {
        $sql="insert into clients (first_name, last_name, phone, email)\n";
        $sql.="values('%s','%s','%s','%s')";
        $query=sprintf($sql,$request["first_name"],$request["last_name"],$request["phone"],$request["email"]);
        $this->getDb()->query($query);
    }
    
    public function update($id, $request)
    {
        $sql="update clients set\n";
        $sql.="first_name='%s',\n";
        $sql.="last_name='%s',\n";
        $sql.="phone='%s',\n";
        $sql.="email='%s'\n";
        $sql.="where id=%d";
        $query=sprintf($sql,$request["first_name"],$request["last_name"],$request["phone"],$request["email"],$id);
        $result = $this->getDb()->query($query);
    }
    
    public function destroy($id) 
    {
        $sql="delete from clients\n";
        $sql.="where id=%d";
        $query=sprintf($sql,$id);
        $result = $this->getDb()->query($query);
    }
    
}