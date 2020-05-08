// // LOGIN
// var close= document.getElementById("close");
// var formLogin =document.getElementById("formLogin");
// close.addEventListener("click", function () {
//     document.getElementById("formLogin").style.display="none";
// });
// window.onclick = function (event) {
//     if(event.target == formLogin){
//         formLogin.style.display ="none";
//     }
// };
// function LoginFunction(){
//     var uname =document.getElementById("uname");
//     var pwd = document.getElementById("pwd");
//     var invalidFeedback = document.getElementsByClassName("invalid-feedback");
//     if(uname.value == ""){
//         invalidFeedback[0].style.display ="block";
//         uname.focus();
//         return false;
//     } else{
//         invalidFeedback[0].style.display ="none";
//     }
//     if(pwd.value ==''){
//         invalidFeedback[1].style.display="block";
//         pwd.focus();
//         return false;
//     }else{
//         invalidFeedback[1].style.display ="none";
//     }
//     return false;
// }