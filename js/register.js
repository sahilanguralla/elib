function register(form){
    var user=form["username"].value;
    var fname=form["fname"].value;
    var pass=form["password"].value;
    var confpass=form["confirmPassword"].value;
    var email=form["email"].value;
    var confemail=form["confirmEmail"].value;
    var rno=form["rno"].value;
    var dept=form["dept"].value;
    var phone=form["phone"].value;
    var terms=form["terms"].checked;
    var par="user="+user+"&fname="+fname+"&pass="+pass+"&confpass="+confpass+"&email="+email+"&confemail="+confemail+"&rno="+rno+"&dept="+dept+"&phone="+phone+"&terms="+terms;
    var dest="includes/register.inc.php";
    sendRequest("registerNote",par,dest,registerResponse);
}

var registerResponse=function(response){
    if(response==="true"){
        notify("registerNote","Registration Successful! Confirmation requires at about 2 non-working days. Please bear with us.","success");
    }
    else
        notify("registerNote",response,"warning");
};