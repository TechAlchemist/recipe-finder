const API_KEY = "a9e9d829481440938e0dd11ad5ac58a0";

// apiRequest();
$("#explore-jumbotron").on("click", apiRequest);

function apiRequest() {
  let url = `https://api.spoonacular.com/recipes/random?number=19&apiKey=${API_KEY}`;
  $.ajax({
    url: url,
  }).then(
    (recipeData) => {
      let recipeResults = recipeData;
      console.log(recipeResults);
      renderSearchResults(recipeResults.recipes);
    },
    (error) => {
      console.log("bad request", error);
    }
  );
}

function renderSearchResults(resultsArray) {
  $(".card-deck").empty();
  resultsArray.forEach((element) => {
    if (element)
      $(".card-deck").append(`
    <div class="card">
      <img class="card-img-top" src="${element.image}" alt="Picture of food. " onError="this.onerror=null;this.src='favicon.png'";>
      <div class="card-body">
        <h5 class="card-title">${element.title}</h5>
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
            ${element.instructions} 
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary">Favorite</button>
            <button type="button" class="btn btn-primary"><a href="${element.sourceUrl}">Recipe Origin</a></button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
         </div>
     </div>
     </div>

   
    `);
  });
}

