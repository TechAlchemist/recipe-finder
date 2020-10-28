// I don't want to display on page load to help save alloted API calls. 
const $displayFavBtn = $('#displayFavorites');

// $($displayFavBtn).on('click', apiRequestById);
$($displayFavBtn).on('click', apiRequestById);

function apiRequestById(id) {
    $.ajax({
      url: `https://api.spoonacular.com/recipes/${id}/information?includeNutrition=false&apiKey=${API_KEY}`,
    }).then(
      (recipeData) => {
        let recipeResults = recipeData;
        console.log(recipeResults);
        // renderSearchResults(recipeResults.results);
      },
      (error) => {
        console.log("bad request", error);
      }
    );
}



//   function renderFavoriteResults(resultsArray) {
//     let recipe;
//     $('.card-deck').empty();
//     resultsArray.forEach(element => {
  

//     });
//   }