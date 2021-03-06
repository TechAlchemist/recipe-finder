const API_KEY = 'a9e9d829481440938e0dd11ad5ac58a0';
const $searchBtn = $('#search-submit');
const $userInput = $('#recipe-search-bar');

$($searchBtn).on('click', apiRequest);

function apiRequest() {
  let userInput = $userInput.val();
  $.ajax({
    url: `https://api.spoonacular.com/recipes/complexSearch?query=${userInput}&addRecipeInformation=True&instructionsRequired=True&instructionsRequired=True&apiKey=${API_KEY}`,
  }).then(
    (recipeData) => {
      let recipeResults = recipeData;
      console.log(recipeResults);
      renderSearchResults(recipeResults.results);
    },
    (error) => {
      console.log("bad request", error);
    }
  );
}

function renderSearchResults(resultsArray) {
  let recipe;
  $('.card-deck').empty();
  resultsArray.forEach(element => {

    $('.card-deck').append(`
    <div class="card">
      <img class="card-img-top" src="${element.image}" alt="Picture of food. " onError="this.onerror=null;this.src='favicon.png'";>
      <div class="card-body">
        <h5 class="card-title">${element.title}</h5>
        <p class="card-text"><small class="text-muted">Likes: ${element.aggregateLikes}</small></p>
        <div class="card-footer">     
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#${element.id}">
                Show Recipe!
            </button>
        </div>
      </div>
     </div>

     <div class="modal fade" id="${element.id}" tabindex="-1" role="dialog" aria-labelledby="${element.id}title" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="${element.id}title">${element.title}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body"> 
              <img src="${element.image}" class="img-fluid" alt="Picture of food. "> 
              <br>
              ${getRecipeInformation(element.analyzedInstructions)} 
              
          </div>
          <div class="modal-footer">
              <i class="fas fa-heart" id="${element.id}FAV" onclick="favoriteRecipe(${element.id})"></i>
              <button type="button" class="btn btn-primary"><a href="${element.sourceUrl}">Recipe Origin</a></button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </div>
      </div>
     </div>
    `
    );
    $(`${element.id}FAV`).css('color', 'crimson');
  });
  $userInput.focus();
  $userInput.val('');
}

function getRecipeInformation(instructions) {
  let recipeSteps = [];
  // console.log(instructions[0].steps[0].step);
  for (let i = 0; i < instructions[0].steps.length; i++) {
    recipeSteps.push(instructions[0].steps[i].step)
  }
  return recipeSteps.join(' ');
}

function favoriteRecipe(id) {
  let data = '';
  data = id.toString();
  console.log('recipeId = ', data)
  console.log('Favoriting recipe. ');
  $.ajax({
    type: 'POST',
    url: './php-scripts/insertFavorite.php',
    data: { data: data },
    success: function (response) {
      console.log(response);
    },
    error: function () {
      console.log('Error calling php insert favorite script. ');
    }
  });
}