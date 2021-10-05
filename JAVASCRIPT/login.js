const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault();// preventing form from submitting
}

continueBtn.onclick = ()=>{
    //let's start Ajax
    let xhr = new XMLHttpRequest();//creating XML object
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              console.log(data);
              if(data == "user"){
                location.href = "main.php";
              }else if(data == "admin"){
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