var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);

server.listen(8890);
console.log("connected server NodeJS to port 8890");
io.on('connection', function (socket) {

  console.log("->New client connected " + socket.id);

  // socket.on('disconnect', function() {
  //   redisClient.quit();
  // });

});

var Redis = require('ioredis');
var redis = new Redis(8099);

redis.psubscribe("*", function(error, count){
  console.log("Subscribe redis success!!!");
});

redis.on("pmessage", function(parther, channel, message){
  io.emit("message", message);
  console.log("->send message----------------",  message);
});


