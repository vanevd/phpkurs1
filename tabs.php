<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h3>Online shop</h3>
  <ul class="nav nav-tabs">
    <li class="active"><a href="#">Clients</a></li>
    <li><a href="#">Products</a></li>
    <li><a href="#">Orders</a></li>
  </ul>
    
<div class="panel panel-default">
  <div class="panel-heading">New Client</div>
  <div class="panel-body">
      <div class="row">    
          <div class="col-sm-3">
            <div class="form-group">
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" id="first_name">
            </div>
          </div>
      </div>    
      <div class="row">    
          <div class="col-sm-3">
            <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" id="last_name">
            </div>
          </div>  
      </div>
      <div class="row">    
          <div class="col-sm-3">
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" class="form-control" id="phone">
            </div>
          </div>  
      </div>    
      <div class="row">    
          <div class="col-sm-3">
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" id="email">
            </div>
          </div>  
      </div>    
      <div class="row">    
          <div class="col-sm-4">
            <div class="form-group">
              <input type="submit" class="btn btn-primary" name='save_btn' value="Save">
            </div>
          </div>    
      </div>
    </div>    
  </div>    
</div>    

</body>
</html>
