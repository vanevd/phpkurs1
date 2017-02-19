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
        <form method="POST" action='orders.php'>
        <div class="container">
            <h3>Online shop</h3>
            <ul class="nav nav-tabs">
                <li><a href="clients.php">Clients</a></li>
                <li><a href="products.php">Products</a></li>
                <li class="active"><a href="orders.php">Orders</a></li>
                <li><a href="order-details.php">Order detail</a></li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-body">
        {% for error in errors %} 
            <font color="red">{{ error }}</font><br>
        {% endfor %}
        <div class="row">    
          <div class="col-sm-2">
            <div class="form-group">
              <label for="s_order_number">Order Number:</label>
              <input class="form-control " id="s_order_number" type="text" name="s_order_number" value="{{ s_order_number }}">
            </div>
          </div>    
          <div class="col-sm-3">
            <div class="form-group">
              <label for="s_order_date">Order Date:</label>
              <input class="form-control" id="s_order_date" type="text" name="s_order_date" value="{{ s_order_date }}">
            </div>
          </div>    
          <div class="col-sm-3">
            <div class="form-group">
                <label for="s_client_id">Client:</label>
                <select class="form-control" name="s_client_id" id="s_client_id">
                    <option value=""></option>
                    {% for client in clients %} 
                    <option value="{{ client['id'] }}">{{ client['first_name'] }} {{ client['last_name'] }}</option>
                    {% endfor %}
                </select>
                <script>$("#s_client_id").val({{ s_client_id }})</script>
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
                <th>Number</th>
                <th>Date</th>
                <th>Client</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Details 2
                </th>
            </tr>
            {% for order in orders %} 
            <tr>
                <td>{{ order['id'] }}</td>
                <td>{{ order['order_number'] }}</td>
                <td>{{ order['order_date'] }}</td>
                <td>{{ order['client_name'] }}</td>
                <td><a  class="btn btn-primary btn-xs" href='orders.php?operation=delete&id={{ order['id'] }}'>delete</a></td>
                <td><a class="btn btn-primary btn-xs" href='orders.php?operation=edit&id={{ order['id'] }}'>edit</a></td>
                <td><a class="btn btn-primary btn-xs" href='order-details.php?order_id={{ order['id'] }}'>details</a></td>
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
                        <label for="order_number">Order Number:</label>
                        <input class="form-control" id="order_number" type="text" name="order_number" value="{{ order_number }}">
                    </div>
                </div>
            </div>    
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="order_date">Order Date:</label>
                        <input class="form-control" id="order_date" type="text" name="order_date" value="{{ order_date }}">
                    </div>
                </div>
            </div>    
             <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="client_id">Client:</label>
                        <select class="form-control" name="client_id" id="client_id">
                            <option value=""></option>
                            {% for client in clients %} 
                            <option value="{{ client['id'] }}">{{ client['first_name'] }} {{ client['last_name'] }}</option>
                            {% endfor %}
                        </select>
                        <script>$("#client_id").val({{ client_id }})</script>
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
        </form>
    </body>
</html>
