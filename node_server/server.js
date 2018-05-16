var io=require('socket.io')(3000);
console.log('Kết nối tới port 3000');
io.on('connection',function(socket){
    socket.on('send_chat',function(data){
        io.sockets.emit('get_chat_server',data);
    })
    console.log('Kết nối thành công');
})
io.on('error',function(err){
    console.log('Có lỗi xảy ra');
})