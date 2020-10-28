<?php
  require './php-scripts/database.php';
  session_start();
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
    <script defer src="./js/favorite-recipes.js"></script>

    <link rel="stylesheet" href="./css/style.css" />

  </head>
  <title>recipe finder | my recipes</title>
</head>

<body>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: rgba(0,0,0,0.0) !important">
  <a class="navbar-brand" href="index.php">Recipe Finder</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="explore-recipes.php">Explore Recipes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="my-recipes.php"> My Recipes </a>
      </li>
    </ul>
    <ul id="nav-login">
      
      <?php
        if (!isset($_SESSION['username'])) {
          echo ' 
          <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal"> Login </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> Sign Up? </a>
          </li>';
        }
        else {
          echo 
          '<li class="nav-item">  
            <a class="nav-link" href="my-recipes.php">' . $_SESSION['username'] . '</a>
          </li>                    
          <li class="nav-item">
            <a class="nav-link" href="./php-scripts/logout.php"> Logout </a>
          </li>'; 
        }
      ?>
       
    </ul>

    
  </div>
</nav>



  <div class="container" >
    <div class="jumbotron">
      <p> My Recipes </p>
      <button class="btn btn-outline" type="button" id="displayFavorites">
        Show Favorites
      </button>
    </div>
  </div>

  <div class="container">
    <div class="card-deck">
      <script>
        function apiRequestById(id) {
          $.ajax({
            url: `https://api.spoonacular.com/recipes/${id}/information?includeNutrition=false&apiKey=a9e9d829481440938e0dd11ad5ac58a0`,
          }).then(
            (recipeData) => {
              let recipeResults = recipeData;
              // return recipeResults;
              // console.log(recipeResults);
              appendRecipe(recipeResults);
            },
            (error) => {
              console.log("bad request", error);
            }
          );
        }
        function appendRecipe(obj) {
          // console.log("TESTING OBJ IN append ", obj.id);
        $('.card-deck').append(`
            <div class="card">
              <img class="card-img-top" src="${obj.image}" alt="Picture of food. " onError="this.onerror=null;this.src='favicon.png'";>
              <div class="card-body">
                <h5 class="card-title">${obj.title}</h5>
                <p class="card-text"><small class="text-muted">Likes: ${obj.aggregateLikes}</small></p>
                <div class="card-footer">     
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#${obj.id}">
                        Show Recipe!
                    </button>
                </div>
              </div>
            </div>
        
            <div class="modal fade" id="${obj.id}" tabindex="-1" role="dialog" aria-labelledby="${obj.id}title" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="${obj.id}title">${obj.title}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body"> 
                  </div>
                  <div class="modal-footer">
                      <i class="fas fa-heart" id="${obj.id}FAV" onclick="favoriteRecipe(${obj.id})"></i>
                      <button type="button" class="btn btn-primary"><a href="${obj.sourceUrl}">Recipe Origin</a></button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  </div>
              </div>
            </div>
            `
            );
        }
        <?php 
          $recipes = getFavoriteRecipes(); 
          echo 'let obj;';
          for ($i = 0; $i < count($recipes); $i++) {
            echo 'obj = apiRequestById(' . $recipes[$i]['recipe_id'] . ');';
            // echo 'appendRecipe(obj);';
            
          }
        ?>
      </script>
    </div>
  </div> 
  <br>


  </body>
</html>

