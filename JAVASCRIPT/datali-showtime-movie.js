const movList = document.querySelector(".select-movie .movie .movie-box-area"),
searchBar = document.querySelector(".select-movie .search-select-movie .form-search input"),
searchIcon = document.querySelector(".select-movie .search-select-movie .form-search button"),
branchList = document.querySelector(".select-branch .branch .branch-box-area"),
searchBranch = document.querySelector(".select-branch .search-select-branch .form-search input"),
searchIconbranch = document.querySelector(".select-branch .search-select-branch .form-search button"),
form = document.querySelector(".create-set-showtime form"),
continueBtn = form.querySelector(".button input");

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  // console.log(searchTerm+searchgenre+" M");
  if(searchTerm != ""){

    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search_movie_showtime.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
           movList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/datalist-movie-showtime.php", true);
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
}, 1000);


searchBranch.onkeyup = ()=>{
  let searchTerm2 = searchBranch.value;
  // console.log(searchTerm+searchgenre+" M");
  if(searchTerm2 != ""){

    searchBranch.classList.add("active");
  }else{
    searchBranch.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search_branch_showtime.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          branchList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm2);
}
setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/datalist-branch-showtime.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;   
          if(!searchBranch.classList.contains("active")){
            branchList.innerHTML = data;
          }
        }
    }
  }
  
  xhr.send();
}, 1000);
// btnsearch.onclick = ()=>{

// }


form.onsubmit = (e)=>{
    e.preventDefault();
}
continueBtn.onclick = ()=>{
    //let's start Ajax
    let xhrt = new XMLHttpRequest();//creating XML object
    xhrt.open("POST", "php/addshowtime.php", true);
    xhrt.onload = ()=>{
      if(xhrt.readyState === XMLHttpRequest.DONE){
          if(xhrt.status === 200){
              let data = xhrt.response;
              console.log(data);
              if(data == "success"){
                location.href = "add_showtime.php";
              }
          }
      }
    }
    // we have to send the data through ajax to php
    let formData = new FormData(form);//creating new formData Object
    xhrt.send(formData);//sending the form data to php
}