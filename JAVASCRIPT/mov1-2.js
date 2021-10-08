const movList1 = document.querySelector(".container .mov1-list");
// setInterval(() =>{
      //let's start Ajax
    let xhr1 = new XMLHttpRequest();//creating XML object
    xhr1.open("GET", "php/mov1-2.php", true);
    xhr1.onload = ()=>{
      if(xhr1.readyState === XMLHttpRequest.DONE){
          if(xhr1.status === 200){
            let data1 = xhr1.response;   
            movList1.innerHTML = data1;

          }
      }
    }
    xhr1.send();
  // }, 4000);//this function will run frequently after 500ms