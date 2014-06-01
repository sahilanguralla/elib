var request=createRequest();

function createRequest(){
    var request;
    if(window.ActiveXObject){
        try{
            request=new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch(e){
            request=false;
        }
    }
    else{
        try{
            request=new XMLHttpRequest();
        }
        catch(e){
            request=false;
        }
    }
    
    return request;
}

function sendRequest(id,par,file,response){
    if(request.readyState===0 || request.readyState===4){
        request.open("POST",file,true);
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        request.onreadystatechange=function(){
            if(request.readyState===4){
                if(request.status===200){
                    response(request.responseText.trim());
                }
                else
                    notify(id,"Something went wrong!","warning");
            }
        };
        request.send(par);
    }
    else
        setTimeout("sendRequest("+par+","+file+","+response+");",1000);
}