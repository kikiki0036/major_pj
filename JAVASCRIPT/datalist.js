const movList = document.querySelector(".table .table-list"),
searchBar = document.querySelector(".form input"),
searchGenre = document.querySelector(".form .input-select-genre select"),
searchIcon = document.querySelector(".form button");

searchIcon.onclick = ()=>{
  let searchTerm = searchBar.value;
  let searchgenre =  searchGenre.value; 
  if(searchGenre.value  != "" ){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
           movList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm+"|"+searchgenre);

//   if(searchBar.classList.contains("active")){
//     console.log("ddd");
//     searchBar.value = searchBar.value+"";
// //     // searchBar.classList.remove("active");
//   }
}

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  let searchgenre =  searchGenre.value; 
  // console.log(searchTerm+searchgenre+" M");
  if(searchTerm != "" || searchgenre  != "" ){

    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
           movList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm+"|"+searchgenre);


}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/datalist.php", true);
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
