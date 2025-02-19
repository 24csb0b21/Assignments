
let movieArray = [];

function addMovie() {
    const movieInput = document.getElementById('movieInput');
    const movieName = movieInput.value.trim();

    if (movieName === "") {
        alert("Please enter a movie name.");
        return;
    }

    movieArray.push(movieName);
    movieInput.value = "";

    updateMovieList();
}

function updateMovieList() {
    const movieList = document.getElementById('movieList');
    movieList.innerHTML = ""; 

    movieArray.forEach((movie, index) => {
        const li = document.createElement('li');
        li.textContent = movie;

       
        li.onclick = function() {
            removeMovie(index);
        };

        movieList.appendChild(li);
    });
}

function removeMovie(index) {
  
    movieArray.splice(index, 1);

    
    updateMovieList();
}

function clearList() {
    movieArray = []; 
    updateMovieList();  
}
