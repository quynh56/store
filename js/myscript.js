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
// var formLogin =document.getElementById("formLogin");
// var login =document.getElementsByClassName("Login");
// for(i=0;i<login.length;i++){
//     login[i].addEventListener("click", function () {
//         formLogin.style.display = "block";
//     });
// }
// close.addEventListener("click", function () {
//     document.getElementById("formLogin").style.display="none";
// });
// window.onclick = function (event) {
//     if(event.target == formLogin){
//         formLogin.style.display ="none";
//     }
// };
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
(function ($){
    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });
    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
    /*------------------
    Product Slider
--------------------*/

    $(".product-slider").owlCarousel({
        loop: true,
        margin: 25,
        nav: true,
        items: 4,
        dots: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });
    /*------------------
       CountDown
   --------------------*/
// For demo preview
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if(mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
// For demo preview end

    console.log(timerdate);


// Use this for real timer date
    /* var timerdate = "2020/01/01"; */

    $("#countdown").countdown(timerdate, function(event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hrs</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Mins</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Secs</p> </div>"));
    });
})(jQuery);




