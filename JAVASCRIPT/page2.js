const movList = document.querySelector(".container .mov-list");
// setInterval(() =>{
      //let's start Ajax
    let xhr = new XMLHttpRequest();//creating XML object
    xhr.open("GET", "php/page2.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;   
            movList.innerHTML = data;
          }
      }
    }
    xhr.send();
  // }, 500);//this function will run frequently after 500ms