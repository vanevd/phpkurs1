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
                <li class="active"><a href="clients.php">Clients</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="order-details.php">Order detail</a></li>
            </ul>
            <div class="panel panel-default top-panel" style="margin-top: 20px;">
                <div class="panel-body">
        {% for error in errors %} 
            <font color="red">{{ error }}</font><br>
        {% endfor %}
        <div class="row">    
          <div class="col-sm-3">
            <div class="form-group">
              <label for="s_first_name">First Name:</label>
              <input class="form-control" id="s_first_name" type="text" name="s_first_name" value="{{ s_first_name }}">
            </div>
          </div>    
          <div class="col-sm-3">
            <div class="form-group">
              <label for="s_last_name">Last Name:</label>
              <input class="form-control" id="s_last_name" type="text" name="s_last_name" value="{{ s_last_name }}">
            </div>
          </div>    
          <div class="col-sm-3">
            <div class="form-group">
              <label for="s_phone">Phone:</label>
              <input class="form-control" id="s_phone" type="text" name="s_phone" value="{{ s_phone }}">
            </div>
          </div> 
          <div class="col-sm-3">
            <div class="form-group">
              <label for="s_email">Email:</label>
              <input class="form-control" id="s_email" type="text" name="s_email" value="{{ s_email }}">
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
                <th>First Name</th>
                <th>Last Name </th>
                <th>Phone</th>
                <th>Email</th> 
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            {% for client in clients %} 
            <tr>
                <td>{{ client['id'] }}</td>
                <td>{{ client['first_name'] }}</td>
                <td>{{ client['last_name'] }}</td>
                <td>{{ client['phone'] }}</td>
                <td>{{ client['email'] }}</td>
                <td><a  class="btn btn-primary btn-xs" href='clients.php?operation=delete&id={{ client['id'] }}'>delete</a></td>
                <td><a class="btn btn-primary btn-xs" href='clients.php?operation=edit&id={{ client['id'] }}'>edit</a></td>
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
                        <label for="first_name">First Name:</label>
                        <input class="form-control" id="first_name" type="text" name="first_name" value="{{ first_name }}">
                    </div>
                </div>
            </div>    
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input class="form-control" id="last_name" type="text" name="last_name" value="{{ last_name }}">
                    </div>
                </div>
            </div>    
             <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input class="form-control" id="phone" type="text" name="phone" value="{{ phone }}">
                    </div>
                </div>
            </div>          
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" id="email" type="text" name="email" value="{{ email }}">
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
