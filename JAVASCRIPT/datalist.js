const movList = document.querySelector(".table .table-list");
setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/datalist.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;   
            movList.innerHTML = data;
          }
      }
    }
    xhr.send();
  }, 100);
