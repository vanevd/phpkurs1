<?php
    $name1 = "Стефан";
?>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style1.css">
    </head>
    <body>
        <h1><font color="red" size="6"><i>TODO write content</i></font></h1>
        <h2>TODO write content</h2>
        <h3>TODO write content</h3>
        <h4>TODO write content</h4>
        <br />
        TODO write content<br />
        <b>TODO write content</b><br />
        <i>TODO write content</i><br />
        <b><i>TODO write content</i></b><br />
        TODO write content<br />
        TODO write content<br />
        TODO write content<br />
<?php
    $name2 = "Иван";
    $name3 = "Георги";
    $row4 = "<tr><td>Николай</td><td>Петров</td></tr>";
?>        
        <table class="myTable">
            <tr>
                <th>Име</th>
                <th>Фамилия</th>
            </tr>    
            <tr>
                <td><?php echo $name1 ?></td>
                <td>Петров</td>
            </tr>    
            <tr>
                <td><?= $name2 ?></td>
                <td>Иванов</td>
            </tr>
            <tr>
                <td><?= $name3 ?></td>
                <td>Стоянов</td>
            </tr>
            <?= $row4 ?>
        </table>    
        
        <?php echo "Hello" ?>
    </body>
</html>


<table class="myTable1">
    <br>
  <tr>
     <th>Firstname</th>
     <th>Lastname</th>
     <th>Age</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td> 
    <td>50</td>
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td> 
    <td>94</td>
  </tr>
</table>    
