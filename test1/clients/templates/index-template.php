<html>
    <head>
    </head>
    <body>
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name </th>
                <th>Phone</th>
                <th>Email</th> 
                <th>Edit</th>
            </tr>
            {% for client in clients %} 
            <tr>
                <td>{{ client['id'] }}</td>
                <td>{{ client['first_name'] }}</td>
                <td>{{ client['last_name'] }}</td>
                <td>{{ client['phone'] }}</td>
                <td>{{ client['email'] }}</td>
                <td><a href="/test1/clients/edit.php?edit_id={{ client['id'] }}" target="_blank">Edit</a></td>
            </tr>
            {% endfor %}
        </table>
    </body>
</html>
