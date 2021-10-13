const form = document.querySelector(".editform form"),
continueBtn = form.querySelector(".button input");

form.onsubmit = (e)=>{
    e.preventDefault();
}
continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/editmovie.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data == "success"){
                location.href = "mainadmin.php";
              }else{
                errorText.textContent = data;
                errorText.style.display = "block";
              }
          }
      }
    }
    // we have to send the data through ajax to php
    let formData = new FormData(form);//creating new formData Object
    xhr.send(formData);//sending the form data to php
}