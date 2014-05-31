function register(form){
    var user=form["username"].value;
    var pass=form["password"].value;
    var confpass=form["confirmPassword"].value;
    var email=form["email"].value;
    var confemail=form["confirmEmail"].value;
    var terms=form["terms"].checked;
    sendRequest(par,dest,registerResponse);
}

var registerResponse=function(response){
    if(response="true"){
        notify("Registration Successful! Confirmation requires at about 2 non-working days. Please bear with us.");
    }
    else
        notify(response);
};