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
        <form method="POST" action='clients.php'>
        <div class="container">
            <h3>Online shop</h3>
            <ul class="nav nav-tabs">
                <li><a href="clients.php">Clients</a></li>
                <li class="active"><a href="products.php">Products</a></li>
                <li><a href="orders.php">Orders</a></li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-body">
        {% for error in errors %} 
            <font color="red">{{ error }}</font><br>
        {% endfor %}
        Product Name <input type="text" name="s_product_name" value="{{ s_product_name }}">
        Product Code <input type="text" name="s_product_code" value="{{ s_product_code }}">
        Price <input type="text" name="s_price" value="{{ s_price }}">
        <br>
        <input type="submit" name='search_btn' value="Search">
        <input type="submit" name='clear_btn' value="Clear">
        <br><br>
                </div>
            </div>    
        <table border='1'>
            
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
                <td><a href='products.php?operation=delete&id={{ product['id'] }}'>delete</a></td>
                <td><a href='products.php?operation=edit&id={{ product['id'] }}'>edit</a></td>
            </tr>
            {% endfor %}
        </table>
        
            <input type="hidden" name="edit_id" value="{{ edit_id }}">
            Product Name<br/>
            <input type="text" name="product_name" value="{{ product_name }}"><br/>
            <br/>
            Product Code<br/>
            <input type="text" name="product_code" value="{{ product_code }}"><br/>
            <br/>
            Price<br/>
            <input type="text" name="price" value="{{ price }}"><br/>          
            <br/>            
            <input type="submit" name='save_btn' value="{{ btn_value }}">
            </div>
        </form>

    </body>
</html>
