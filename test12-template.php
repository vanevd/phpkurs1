<html>
    
    <head>
        
    </head>
    
    <body>
        <form method="POST" action='test12.php'>
        First Name <input type="text" name="s_first_name" value="">
        Last Name <input type="text" name="s_last_name" value="">
        Phone <input type="text" name="s_phone" value="">
        Email <input type="text" name="s_email" value="">
        <br>
        <input type="submit" name='search_btn' value="Search"><br><br>
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
            {table clients}
            <tr>
                <td>{client_id}</td>
                <td>{client_first_name}</td>
                <td>{client_last_name}</td>
                <td>{client_phone}</td>
                <td>{client_email}</td>
                <td><a href='test12.php?operation=delete&id={client_id}'>delete</a></td>
                <td><a href='test12.php?operation=edit&id={client_id}'>edit</a></td>
            </tr>
            {/table clients}
        </table>
        
            <input type="hidden" name="edit_id" value="{edit_id}">
            First Name<br/>
            <input type="text" name="first_name" value="{first_name}"><br/>
            <br/>
            Last Name<br/>
            <input type="text" name="last_name" value="{last_name}"><br/>
            <br/>
            Phone<br/>
            <input type="text" name="phone" value="{phone}"><br/>
            <br/>            
            Email<br/>
            <input type="text" name="email" value="{email}"><br/>
            <br/>            
            <input type="submit" name='save_btn' value="{btn_value}">
            
        </form>

    </body>
</html>
