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
        <form method="POST" action='products.php'>
        <div class="container">
            <h3>Online shop</h3>
            <ul class="nav nav-tabs">
                <li><a href="clients.php">Clients</a></li>
                <li class="active"><a href="products.php">Products</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="order-details.php">Order detail</a></li>
            </ul>
            <div class="panel panel-default">
            <div class="panel-body">
            {% for error in errors %} 
                <font color="red">{{ error }}</font><br>
            {% endfor %}
            <div class="row">    
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="s_product_name">Product Name:</label>
                  <input class="form-control" id="s_product_name" type="text" name="s_product_name" value="{{ s_product_name }}">
                </div>  
              </div>    
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="s_product_code">Product Code:</label>
                  <input class="form-control" id="s_product_code" type="text" name="s_product_code" value="{{ s_product_code }}">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="s_price">Price:</label>
                  <input class="form-control" id="s_price" type="text" name="s_price" value="{{ s_price }}">
                </div>
              </div>
            </div>    
            <div class="row">    
              <div class="col-sm-3">
                <input class="btn btn-primary" type="submit" name='search_btn' value="Search">
                <input class="btn btn-primary" type="submit" name='clear_btn' value="Clear">
              </div>
            </div> 
            </div> 
            </div>
            <div class="panel panel-default">
            <div class="panel-body">

            <table class="myTable" border='1' cellpadding="10">

                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product Code </th>
                    <th>Price</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                {% for product in products %} 
                <tr>
                    <td>{{ product['id'] }}</td>
                    <td>{{ product['product_name'] }}</td>
                    <td>{{ product['product_code'] }}</td>
                    <td>{{ product['price'] }}</td>
                    <td><a class="btn btn-primary btn-xs" href='products.php?operation=delete&id={{ product['id'] }}'>delete</a></td>
                    <td><a class="btn btn-primary btn-xs" href='products.php?operation=edit&id={{ product['id'] }}'>edit</a></td>
                </tr>
                {% endfor %}
            </table>
            </div>
            </div>
            <div class="panel panel-default">
            <div class="panel-body">
            <input type="hidden" name="edit_id" value="{{ edit_id }}">
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input class="form-control" id="product_name" type="text" name="product_name" value="{{ product_name }}">
                    </div>
                </div>
            </div>    
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="product_code">Product Code:</label>
                        <input class="form-control" id="product_code" type="text" name="product_code" value="{{ product_code }}">
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
        </div>    
        </form>

    </body>
</html>
