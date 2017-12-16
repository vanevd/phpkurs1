var config = require('nconf').file({
    file: __dirname + '/config.json'
});
var io = require('socket.io')(config.get('system:client_port'));
var users = {};
var phpSerialization = require("php-serialization");

io.on('connection', function (socket) {
    console.log('client connected');
    console.log(socket.id)
  
    socket.on('login', function (data) {
        console.log(users)
        if (typeof socket.username !== 'undefined') {
            socket.emit('login', {status: 'error', data: {}, error: 'You are already logged.'});
            return;
        }
        if ( typeof users[data.username] !== 'undefined') {
            socket.emit('login', {status: 'error', data: {}, error: 'User already exists.'});
            return;
        }    

        socket.username = data.username;
        users[data.username] = {id: socket.id};
        var logged_users = [];
        for (c in io.clients().sockets) {
            if ((typeof io.clients().sockets[c].username !== 'undefined')&&(io.clients().sockets[c].username != data.username)) {
                logged_users.push(io.clients().sockets[c].username);
            }
        }        

        socket.emit('login', {status: 'ok', data: {logged_users: logged_users}, error: ''});
        for (c in io.clients().sockets) {
            if ((typeof io.clients().sockets[c].username !== 'undefined')&&(io.clients().sockets[c].username != data.username)) {
                io.clients().sockets[c].emit('user_connected', {status: 'ok', data:{username: data.username, error: ''}});
            }
        }        
    
    });

    socket.on('logout', function (data) {
        if ( typeof socket.username !== 'undefined') {
            delete users[socket.username];
            for (c in io.clients().sockets) {
                if ((typeof io.clients().sockets[c].username !== 'undefined')&&(io.clients().sockets[c].username != socket.username)) {
                    io.clients().sockets[c].emit('user_disconnected', {status: 'ok', data:{username: socket.username, error: ''}});
                }
            } 
            delete(socket.username);
        }
    });        

    socket.on('send_msg', function (data) {
        if (typeof users[data.username] !== 'undefined') {
            io.clients().sockets[users[data.username].id].emit('receive_msg', {status: 'ok', data: {username: socket.username, msg_text: data.msg_text}, error: ''});
        }
    });        

    socket.on('disconnect', function () {
        console.log('client disconnected');
        if ( typeof socket.username !== 'undefined') {
            delete users[socket.username];
            for (c in io.clients().sockets) {
                if ((typeof io.clients().sockets[c].username !== 'undefined')&&(io.clients().sockets[c].username != socket.username)) {
                    io.clients().sockets[c].emit('user_disconnected', {status: 'ok', data:{username: socket.username, error: ''}});
                }
            }        
        }
    });

    socket.on('list_connections', function (data) {
        var clients = {};
        for (c in io.clients().sockets) {
            clients[io.clients().sockets[c].id] = {
                id: io.clients().sockets[c].id,
            };
        }
        socket.emit('read_connections', clients)
    });    

    socket.on('list_users', function (data) {
        console.log(users);
        return;
        var clients = {};
        for (c in users) {
            clients[c] = {
                id: io.clients().sockets[c].id,
            };
        }
        socket.emit('read_connections', clients)
    });    

    socket.on('send_all', function (data) {
        for (c in io.clients().sockets) {
            if (data.recipient == io.clients().sockets[c].id) {
                io.clients().sockets[c].emit('read_all', data);
            }
        }
    });    
});

