var app = {};

$(function() {
    socketConnect();
});    


function socketConnect() {
    if (typeof app.socket === 'undefined') {
        app.socket = io.connect('localhost:8500');
        app.socket.on('disconnect', function (data) {
            console.log('disconnected');
        });
        app.socket.on('registered', function (data) {
            console.log('registered');
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
            //app.socket.emit('register', {token:Cookies.get('laravel_session')});
        }
    }

}