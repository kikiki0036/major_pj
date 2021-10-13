const branchList = document.querySelector(".containerpage3 .area-branch");
// setInterval(() =>{
      //let's start Ajax
    let xhr = new XMLHttpRequest();//creating XML object
    xhr.open("GET", "php/page3-7.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;   
            branchList.innerHTML = data;
          }
      }
    }
    xhr.send();
  // }, 500);//this function will run frequently after 500ms