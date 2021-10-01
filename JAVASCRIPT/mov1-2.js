const usersList12 = document.querySelector(".container .mov1-list");
setInterval(() =>{
      //let's start Ajax
    let xhr = new XMLHttpRequest();//creating XML object
    xhr.open("GET", "php/mov1-2.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;   
            usersList12.innerHTML = data;

          }
      }
    }
    xhr.send();
  }, 500);//this function will run frequently after 500ms