var filterTitle,i;
filterTitle=document.getElementsByClassName("filter-title");
for(i=0;i<filterTitle.length;i++){
    filterTitle[i].addEventListener("click",function () {

        this.classList.toggle("active");
        var filterOption = this.nextElementSibling;
        if(filterOption.style.display =="block"){
            filterOption.style.display ="none";
            filterOption.style.opacity ="0";
        }else{
            // filterOption.style.maxHeight += filterOption.scrollHeight+ "px";
            filterOption.style.display ="block";
            filterOption.style.opacity = "1";
        }
    })
}
//Login
var close= document.getElementById("close");
var formLogin =document.getElementById("formLogin");
var login =document.getElementsByClassName("Login");
for(i=0;i<login.length;i++){
    login[i].addEventListener("click", function () {
        formLogin.style.display = "block";
    });
}
close.addEventListener("click", function () {
    document.getElementById("formLogin").style.display="none";
});
window.onclick = function (event) {
    if(event.target == formLogin){
        formLogin.style.display ="none";
    }
};
var array =[];
errorObj={
    emptyAccount: 'Vui lòng nhập email/SĐT !',
    emptyPwd: 'Vui lòng nhập nhập khẩu!'
};
function getElm(elm){
    return document.getElementById(elm);
}
function LoginFunction(){
    var isValid =false;
    var myAccount = getElm('LoginEmail').value;
    if(validateEmpty(myAccount, 'tb-account', errorObj.emptyAccount)){
        isValid =true;
    }
    var myPwd =getElm('LoginPwd').value;
    if(validateEmpty(myPwd, 'tb-pwd', errorObj.emptyPwd)){
        isValid =true;
    }
    return false;

}
function validateEmpty(field, errorId, message){
    if(field.trim().length ===0){
        getElm(errorId).innerHTML = message;
        return true;
    }
    else{
        getElm(errorId).innerHTML = '';
        return false;
    }
}
