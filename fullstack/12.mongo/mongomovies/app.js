var express = require('express');
var bodyParser = require('body-parser');

var mongoose = require('mongoose');
mongoose.connect('mongodb://localhost/mongomovies');
var db = mongoose.connection;
db.on('error', console.error.bind(console, 'Connection Error:'));
db.once('open', function(){
  console.log('MongoDB Connected');
})

var routes = require('./routes/index');
var movies = require('./routes/movie');

var app = express();

app.use(bodyParser.json());

app.use('/', routes);
app.use('/api/v1/movies', movies);

app.listen(3000, function(){
  console.log('Server running on Port 3000...');
});


