var notify=function(id,note,color){
    document.getElementById(id).innerHTML="<p class=\"alert margin-bottom0 alert-"+color+" alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"+note+"</div>";
};

window.onload=function(){
	document.getElementById("vdos_link").onclick=function(){
		window.location="vdos.php";
	};
    document.getElementsByName("loginForm")[0].onsubmit=function(){
        login(this);
        return false;
    };
    document.getElementsByName("registerForm")[0].onsubmit=function(){
        register(this);
        return false;
    };
};