var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('test-channel');

redis.on('message', function(channel, message) {
  message = JSON.parse(message);
  console.log('host is:', redis.options.host);
  console.log('Message received:');
  console.log('channel:', channel);
  console.log('message:', message);
  console.log('full channel name:', channel + ':' + message.event);
  io.emit(channel + ':' + message.event, message.data);
});

server.listen(3000);


