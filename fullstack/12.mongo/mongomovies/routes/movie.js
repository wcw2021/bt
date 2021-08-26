var express = require('express');
var router = express.Router();

var Movie = require('../models/Movie');

//list movies
router.get('/', function(req, res, next){
  Movie.getMovies(function(err, movies){
    if(err){
      res.send(err);
    }
    res.json(movies);
  }, 10);

});

//single movie
router.get('/:id', function(req, res, next){
  Movie.getMovieById([req.params.id], function(err, movie){
    if(err){
      res.send(err);
    }
    res.json(movie);
  });

});

//add movie
router.post('/', function(req, res, next){
  // var movie = req.body;
  var newMovie = new Movie({
    title: 'The Accountant',
    description: 'As a math savant uncooks the books for a new client, the Treasury Department closes in on his activities, and the body count starts to rise.',
    cover: 'https://www.imdb.com/title/tt2140479/mediaviewer/rm3642036224/',
    genre: 'Drama',
    actors: ['Ben Affleck'],
    releaseDate: new Date('2016-12-01')
  });

  newMovie.save(function(err, movie){
    if(err){
      res.send(err);
    }
    res.json(movie);
  });

});

//update movie
router.put('/:id', function(req, res, next){
  var query = {_id: [req.params.id]};
  var body = req.body;
  Movie.update(query, {$set:body}, {}, function(err, movie){
    if(err){
      res.send(err);
    }
    res.json(movie);
  });

});

//delete movie
router.delete('/:id', function(req, res, next){
  var query = {_id: [req.params.id]};
  Movie.remove(query, function(err){
    if(err){
      res.send(err);
    }
    res.json({
      msg: "Success"
    });
  });

});

module.exports= router;


