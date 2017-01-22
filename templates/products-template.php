<html>
    
    <head>
        
    </head>
    
    <body>
        <form method="POST" action='clients.php'>
        {% for error in errors %} 
            <font color="red">{{ error }}</font><br>
        {% endfor %}
        First Name <input type="text" name="s_first_name" value="{{ s_first_name }}">
        Last Name <input type="text" name="s_last_name" value="{{ s_last_name }}">
        Phone <input type="text" name="s_phone" value="{{ s_phone }}">
        Email <input type="text" name="s_email" value="{{ s_email }}">
        <br>
        <input type="submit" name='search_btn' value="Search">
        <input type="submit" name='clear_btn' value="Clear">
        <br><br>
        <table border='1'>
            
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
                <td><a href='clients.php?operation=delete&id={{ client['id'] }}'>delete</a></td>
                <td><a href='clients.php?operation=edit&id={{ client['id'] }}'>edit</a></td>
            </tr>
            {% endfor %}
        </table>
        
            <input type="hidden" name="edit_id" value="{{ edit_id }}">
            First Name<br/>
            <input type="text" name="first_name" value="{{ first_name }}"><br/>
            <br/>
            Last Name<br/>
            <input type="text" name="last_name" value="{{ last_name }}"><br/>
            <br/>
            Phone<br/>
            <input type="text" name="phone" value="{{ phone }}"><br/>
            <br/>            
            Email<br/>
            <input type="text" name="email" value="{{ email }}"><br/>
            <br/>            
            <input type="submit" name='save_btn' value="{{ btn_value }}">
            
        </form>

    </body>
</html>