<html>
    
    <head>
        
    </head>
    
    <body>
        <form method="POST" action='edit-save.php'>   
            <input type="hidden" name="edit_id" value="{{ edit_id }}">
            First Name<br/>
            <input type="text" name="first_name" value="{{first_name}}"><br/>
            <br/>
            Last Name<br/>
            <input type="text" name="last_name" value="{{last_name}}"><br/>
            <br/>
            Phone<br/>
            <input type="text" name="phone" value="{{phone}}"><br/>
            <br/>            
            Email<br/>
            <input type="text" name="email" value="{{email}}"><br/>
            <br/>            
            <input type="submit" name='save_btn' value="Update">
            
        </form>

    </body>
</html>
