const  pswrdField = document.querySelector(".form input[type='password']"),
toggleBtn = document.querySelector(".form .field i");
// toggleBtn2 = document.querySelector("header nav .user p");
toggleBtn.onclick=()=>{
    if(pswrdField.type == "password"){
        pswrdField.type = "text";
        toggleBtn.classList.add("active");
    }else{
        pswrdField.type = "password"
        toggleBtn.classList.remove("active");
    }
}
// let n=0;
// toggleBtn2.onclick=()=>{
//     if(n==0){
//         toggleBtn2.classList.add("active");
//         n=1;
//     }else{
//         toggleBtn2.classList.remove("active");
//         n=0;
//     }
// }

