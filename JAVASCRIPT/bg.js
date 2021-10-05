const bg = document.querySelector(".back");
setInterval(() =>{
      //let's start Ajax
    let xhr1 = new XMLHttpRequest();//creating XML object
    xhr1.open("GET", "php/bg.php", true);
    xhr1.onload = ()=>{
      if(xhr1.readyState === XMLHttpRequest.DONE){
          if(xhr1.status === 200){
            let data1 = xhr1.response;   
            bg.innerHTML = data1;
          }
      }
    }
    xhr1.send();
  }, 400);//this function will run frequently after 500ms