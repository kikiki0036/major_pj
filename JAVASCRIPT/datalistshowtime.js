const movList = document.querySelector(".table .showtime-list"),
searchBar = document.querySelector(".form #searchbranch"),
searchDate = document.querySelector(".form #searchdate"),
searchGenre = document.querySelector(".form .input-select-genre select"),
searchIcon = document.querySelector(".form button");

searchIcon.onclick = ()=>{
  let searchTerm = searchBar.value;
  let searchgenre =  searchGenre.value; 
  let searchdate =  searchDate.value; 
  if(searchGenre.value  != "" || searchDate.value  != ""  ){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/searchbranch.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
           movList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm+"|"+searchgenre+"|"+searchdate);
}

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  let searchgenre =  searchGenre.value; 
  let searchdate =  searchDate.value; 
  // console.log(searchTerm+searchgenre+" M");
  if(searchTerm != "" || searchgenre  != "" || searchdate  != ""){

    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/searchbranch.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
           movList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm+"|"+searchgenre+"|"+searchdate);


}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/datalistshowtime.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;   
            if(!searchBar.classList.contains("active")){
              movList.innerHTML = data;
            }
          }
      }
    }
    xhr.send();
}, 800);
// btnsearch.onclick = ()=>{

// }
