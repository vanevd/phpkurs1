<?php
namespace Models;
require_once "Models/BaseModel.php";

class Order extends BaseModel
{
    public function index() {
		$sql="select * from orders\n";
		$sql.="where (1=1)\n";
		if (isset($_REQUEST["search_btn"])) {
			$s_order_number = $_REQUEST["s_order_number"];
			$s_order_date = $_REQUEST["s_order_date"];
			$s_client_id = $_REQUEST["s_client_id"];
			if (strlen($s_order_number) > 0) {
				$sql.="and(order_number like '%" . $s_order_number."%')\n";
			}
			if (strlen($s_order_date)>0) {
				$sql.="and(order_date = '".$s_order_date."')\n";
			}
			if (strlen($s_client_id)>0) {
				$sql.="and(client_id = ".$s_client_id.")\n";
			}
		}
		$result = $this->getDb()->query($sql);
		$orders = [];
		while ($order = $result->fetch_assoc()) {
				$orders[] = $order;	
		} 
		return $orders;
		}
			
		public function show ($id) {
			$sql="select * from orders\n";
			$sql.="where id=%d";
			$query=sprintf($sql,$id);
			$result = $this->getDb()->query($query);
			$order = $result->fetch_assoc();
			return $order;
		}
		
		public function store () {
			$sql="insert into orders (order_number, order_date, client_id)\n";
			$sql.="values('%s','%s',%d)";
			$query=sprintf($sql,$_REQUEST["order_number"],$_REQUEST["order_date"],$_REQUEST["client_id"]);
			$this->getDb()->query($query);
		}
		
		public function update($request) {
			$sql="update orders set\n";
			$sql.="order_number='%s',\n";
			$sql.="order_date='%s',\n";
			$sql.="client_id=%d\n";
			$sql.="where id=%d";
			$query=sprintf($sql,$request["order_number"],$request["order_date"],$request["client_id"],$request["edit_id"]);
			$result = $this->getDb()->query($query);
		}
		
		public function destroy($id) {
			$sql="delete from orders\n";
			$sql.="where id=%d";
			$query=sprintf($sql,$id);
			$result = $this->getDb()->query($query);
		}
}