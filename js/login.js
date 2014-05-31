function login(form){
    var user=form["username"].value;
    var pass=form["password"].value;
    var rem=form["remember"].checked;
    var par="user="+user+"&pass="+pass+"&rem="+rem;
    var dest="includes/register.inc.php";
    sendRequest("loginNote",par,dest,loginResponse);
}

var loginResponse=function(response){
    if(response==="true"){
        notify("loginNote","Login Successful!","success");
        window.reload();
    }
    else
        notify("registerNote",response,"warning");
};