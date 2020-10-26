<?php
  require './php-scripts/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <head>
    <link rel="icon" type="image/png" href="favicon.png" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
      crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="./js/search-recipes.js"></script>
    <link rel="stylesheet" href="./css/home.css" />

  </head>
  <title>recipe finder</title>
</head>

<body>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: rgba(0,0,0,0.0) !important">
  <a class="navbar-brand" href="index.php">Recipe Finder</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="explore-recipes.php">Explore Recipes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> - </a>
      </li>
    </ul>
    <ul id="nav-login">
      <li class="nav-item">
        <a class="nav-link" href="#"> Login </a>
      </li>
    </ul>

    
  </div>
</nav>
<div class="container">


  <div class="container" id="main-content">
    <div class="jumbotron" id="main-content-jumbotron">
      <p>Welcome! Recipe Finder is the quick solution for adventurous chefs to look for and discover new recipes. Search for recipes using keywords and start cooking or save the recipe for later.  </p>
    </div>
    <div class="input-group">
      <div class="input-group-prepend">
        <span id="search-prompt-on-bar" class="input-group-text"><i class="fas fa-search" style="padding: 6px"></i>
          Search for a
          recipe
        </span>
      </div>

      <input type="text" class="form-control" id="recipe-search-bar" />
      <div class="input-group-append">
        <button class="btn btn-outline" type="button" id="search-submit">
          Search
        </button>
      </div>
    </div>
    <br />
    <br />
    <!-- Group Boxes for each recipe -->
  </div>
  <br />
  <div class="container" id="recipeGallery">
    <div class="card-deck"></div>

  </div>
</div> 




</body>

</html>