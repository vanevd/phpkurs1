<?php
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>

    <form method="post" action="test6.php">
    Name<br>
    <input type="text" name="name" value="Ivan"><br><br>
    Address<br>
    <input type="text" name="address" value=""><br><br>
    Phone<br>
    <input type="text" name="phone" value="" style="width:200px"><br><br>
    Email<br>
    <input type="text" name="email" value="" style="width:200px"><br><br>
    Description<br>
    <textarea name="description" rows="5" style="width:200px">
      
    </textarea>
    <br><br>
    Confirm<br>
    <input type="hidden" name="confirm" value="0">
    <input type="checkbox" name="confirm" value="1"><br><br>
    Type<br>
    <input type="hidden" name="type" value="None">
    <input type="radio" name="type" value="Person">Person
    <input type="radio" name="type" value="Firm">Firm
    <input type="radio" name="type" value="Bank">Bank<br><br>

    <input type="submit" value="Send">
    </form>    

<?php
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_REQUEST);

    echo "Name: " . $_REQUEST['name'] . "<br>";
    echo "Address: " . $_REQUEST['address'] . "<br>";
    echo "Phone: " . $_REQUEST['phone'] . "<br>";
    echo "Email: ". $_REQUEST['email'] . "<br>";  
    if ($_REQUEST['confirm']) {
      echo "Confirmed<br>";    
    } else {
      echo "Not Confirmed<br>";    
    }
    if ($_REQUEST['type'] == 'Person') {
      echo "This is Person<br>";    
    } elseif ($_REQUEST['type'] == 'Firm') {
      echo "This is Firm<br>";    
    } elseif ($_REQUEST['type'] == 'Bank') {
      echo "This is Bank<br>";    
    } else {
      echo "Nothing selected<br>";    
    }
  }
?>

