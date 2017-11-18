var config = require('nconf').file({
    file: __dirname + '/config.json'
});
var io = require('socket.io')(config.get('system:client_port'));
var users = {};
var phpSerialization = require("php-serialization");

io.on('connection', function (socket) {
    console.log('client connected');
    console.log(socket.id)
  
    socket.on('register', function (data) {
        if ( typeof users[socket.username] !== 'undefined') {
            delete users[socket.username][socket.id];  
            if (Object.keys(users[socket.username]).length == 0) {
                delete users[socket.username];
            }
        }
        socket.username = data.username;  
        if ( typeof users[data.username] === 'undefined') {
            users[data.username]= {};
        }
        users[data.username][socket.id] = socket.id;
        socket.emit('registered');
    
    });

    socket.on('disconnect', function () {
        console.log('client disconnected');
        if ( typeof users[socket.username] !== 'undefined') {
            delete users[socket.username][socket.id];
            if (Object.keys(users[socket.username]).length == 0) {
                delete users[socket.username];
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

