window.onload=function(){
	document.getElementById("vdos_link").onclick=function(){
		window.location="vdos.php";
	};
    document.getElementsByName("loginForm").onsubmit=function(){
        login(this);
        return false;
    };
    document.getElementsByName("registerForm").onsubmit=function(){
        register(this);
        return false;
    };
};