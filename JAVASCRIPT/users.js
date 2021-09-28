const usersList = document.querySelector(".users .users-list");
setInterval(() =>{
      //let's start Ajax
    let xhr = new XMLHttpRequest();//creating XML object
    xhr.open("GET", "php/users.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;   
            usersList.innerHTML = data;
          }
      }
    }
    xhr.send();
  }, 500);//this function will run frequently after 500ms