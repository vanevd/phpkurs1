var app = {};

$(function() {
    socketConnect();
    $('#login_btn').click(login);
    $('#logout_btn').click(logout);
});    

function socketConnect() {
    if (typeof app.socket === 'undefined') {
        app.socket = io.connect('localhost:8500');
        app.socket.on('disconnect', function (data) {
            console.log('disconnected');
        });

        app.socket.on('login', function (data) {
            if (data.status == 'ok') {
                console.log('User logged successfully.');
                var i;
                for (i in data.data.logged_users) {
                    $('#users').append('<div id="username_' + data.data.logged_users[i] + '" class="user"><a href="#">' + data.data.logged_users[i] + '</a></div>');
                    $('#username_' + data.data.logged_users[i]).click(select_user);
                    $('#messages').append('<div id="messages_' + data.data.logged_users[i] + '" class="messages" style="display:none"><div class="user_title">'+data.data.logged_users[i]+'</div></div>');
                }
            }
            if (data.status == 'error') {
                console.log(data.error);
                $.notify(data.error, 'error')
            }
        });
        app.socket.on('user_connected', function (data) {
            if (data.status == 'ok') {
                $('#users').append('<div id="username_' + data.data.username + '" class="user"><a href="#">' + data.data.username + '</a></div>');
                $('#username_' + data.data.username).click(select_user);
                $('#messages').append('<div id="messages_' + data.data.username + '" class="messages" style="display:none"><div class="user_title">'+data.data.username+'</div></div>');
                console.log('User ' + data.data.username  + ' connected.');
                $.notify('User ' + data.data.username  + ' connected.', 'info')
            }
        });
        app.socket.on('user_disconnected', function (data) {
            if (data.status == 'ok') {
                $('#username_' + data.data.username).remove();
                $('#messages_' + data.data.username).remove();
                console.log('User ' + data.data.username  + ' disconnected.');
                $.notify('User ' + data.data.username  + ' disconnected.', 'info')
            }
        });

        app.socket.on('unregistered', function (data) {
            console.log('unregistered');
        });
        app.socket.on('receive_app_msg', function (data) {
            console.log(data);
            if (data.message_type == 'test_msg') {
                $.notify('Test message', 'success');
            }
        });
        app.socket.on('read_connections', function (data) {
            console.log(data);
        });
        app.socket.on('read_all', function (data) {
            console.log(data);
            $('#messages').append(data.msg + '<br><br>');
        });
    } else {
        if (app.socket.disconnected) {
            app.socket.connect();
        } else {
            app.socket.emit('register', {token:Cookies.get('laravel_session')});
        }
    }

}

function login() {
    app.socket.emit('login', {username: $('#username').val()});
}

function logout() {
    app.socket.emit('logout', {});
    $('#users').html('');
    $('#messages').html('');
    //$('#username').val('');
}

function select_user() {
    console.log('User ' + $(this).text() + ' selected.');
    $('.messages').hide();
    $('#messages_' + $(this).text()).show();

}