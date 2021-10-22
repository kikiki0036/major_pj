const form = document.querySelector(".create-set-showtime form"),
continueBtn = form.querySelector(".button input");

form.onsubmit = (e)=>{
    e.preventDefault();
}
continueBtn.onclick = ()=>{
    //let's start Ajax
    let xhr = new XMLHttpRequest();//creating XML object
    xhr.open("POST", "php/addshowtime.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data == "success"){
                location.href = "showtime.php";
              }
          }
      }
    }
    // we have to send the data through ajax to php
    let formData = new FormData(form);//creating new formData Object
    xhr.send(formData);//sending the form data to php
}