const movList2 = document.querySelector(".container .mov2-list");
// setInterval(() =>{
      //let's start Ajax
    let xhr2 = new XMLHttpRequest();//creating XML object
    xhr2.open("GET", "php/mov2.php", true);
    xhr2.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr2.status === 200){
            let data2 = xhr2.response;   
            movList2.innerHTML = data2;
          }
      }
    }
    xhr2.send();
  // }, 500);//this function will run frequently after 500ms