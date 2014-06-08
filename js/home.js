var notify=function(id,note,color,dismiss){
    if(dismiss == undefined || dismiss)
        document.getElementById(id).innerHTML="<div class=\"alert margin-bottom0 alert-"+color+" alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+note+"</div>";
    else
        document.getElementById(id).innerHTML="<div class=\"alert margin-bottom0 alert-"+color+"\">"+note+"</div>";
};

var reloadCaptcha=function(){
    document.getElementById("captchaImage").src=document.getElementById("captchaImage").src+"#1";
}

window.onload=function(){
    document.getElementById("vdos_link").onclick=function(){
        window.location="vdos.php";
    };
    document.getElementsByName("loginForm")[0].onsubmit=function(){
        notify("loginNote",'<div id="circleG"><div id="circleG_1" class="circleG"></div><div id="circleG_2" class="circleG"></div><div id="circleG_3" class="circleG"></div></div>&nbsp; Authenticating...','warning',false);
        login(this);
        return false;
    };
    document.getElementsByName("registerForm")[0].onsubmit=function(){
        register(this);
        return false;
    };
    document.getElementById("reloadCaptcha").onclick=function(){
        reloadCaptcha();
    };
    $(document).ready(function(){
        $('#registerConfEmail').bind("paste",function(e) {
            e.preventDefault();
        });
    });
    $('#registerModal').on('show.bs.modal', function (e) {
        document.getElementsByName("registerForm")[0].reset();
    });
    $('#loginModal').on('show.bs.modal', function (e) {
        document.getElementsByName("loginForm")[0].reset();
    });
};