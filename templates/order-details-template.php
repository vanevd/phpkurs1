<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/shop.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>    
    <body>
        <form method="POST" action='order-details.php'>
        <div class="container">
            <h3>Online shop</h3>
            <ul class="nav nav-tabs">
                <li><a href="clients.php">Clients</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li class="active"><a href="order-details.php">Order detail</a></li>
            </ul>
            {% if order_id > 0 %}
            
            <div class="panel panel-default">
                <div class="panel-body">
        {% for error in errors %} 
            <font color="red">{{ error }}</font><br>
        {% endfor %}
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="myTable" border='1' cellpadding="10">
            
                    <tr>
                        <th>ID</th>
                        <th>Number</th>
                        <th>Date</th>
                        <th>Sum</th>
                        <th>Client</th>
                    </tr>
                    <tr>
                        <td>{{ order_id }}</td>
                        <td>{{ order_number }}</td>
                        <td>{{ order_date }}</td>
                        <td>{{ order_sum }}</td>
                        <td>{{ order_client_name }}</td>
                </table>
            </div>
        </div>
            <div class="panel panel-default">
                <div class="panel-body">
               
        <table class="myTable" border='1' cellpadding="10">
            
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Sum</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            {% for order_detail in order_details %} 
            <tr>
                <td>{{ order_detail['product_name'] }}</td>
                <td>{{ order_detail['quantity'] }}</td>
                <td>{{ order_detail['price'] }}</td>
                <td>{{ order_detail['product_sum'] }}</td>
                <td><a  class="btn btn-primary btn-xs" href='order-details.php?order_id={{ order_id }}&operation=delete&id={{ order_detail['id'] }}'>delete</a></td>
                <td><a class="btn btn-primary btn-xs" href='order-details.php?order_id={{ order_id }}&operation=edit&id={{ order_detail['id'] }}'>edit</a></td>
            </tr>
            {% endfor %}
        </table>
        </div>
        </div>
            <div class="panel panel-default">
                <div class="panel-body">
            <input type="hidden" name="edit_id" value="{{ edit_id }}">
            <input type="hidden" name="order_id" value="{{ order_id }}">
             <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="product_id">Product:</label>
                        <select class="form-control" name="product_id" id="product_id">
                            <option value=""></option>
                            {% for product in products %} 
                            <option value="{{ product['id'] }}">{{ product['product_name'] }}</option>
                            {% endfor %}
                        </select>
                        <script>$("#product_id").val({{ product_id }})</script>
                    </div>
                </div>
            </div>          
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input class="form-control" id="quantity" type="text" name="quantity" value="{{ quantity }}">
                    </div>
                </div>
            </div>    
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input class="form-control" id="price" type="text" name="price" value="{{ price }}">
                    </div>
                </div>
            </div>    
            <div class="row">    
                <div class="col-sm-3">         
                    <input class="btn btn-primary" type="submit" name='save_btn' value="{{ btn_value }}">
                </div>
            </div>    
            </div>
            </div>    
        {% else %}
        <h3>
        Order not selected
        </h3>
        {% endif %}
        
        </form>
    </body>
</html>
