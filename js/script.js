function LoginRegister(k){

    var login=document.getElementsByClassName("login");
    var register=document.getElementsByClassName("register");

 if (k==1){
     login[0].style.display='block';
     register[0].style.display='none';

 }else{
    register[0].style.display='block';
    login[0].style.display='none';
 }

}
function ajaxSend() {
    var xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function () {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        alert(xmlHttp.responseText);


        }

    };
    xmlHttp.open('POST','php/insert_user.php',true);
    xmlHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    var fname=document.getElementById("fname").value;
    var lname=document.getElementById("lname").value;
    var username=document.getElementById("username").value;
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
    var e = document.getElementById("szak");
    var select = e.options[e.selectedIndex].value;
    xmlHttp.send('fname='+fname+'&lname='+lname+'&username='+username+'&email='+email+'&password='+password+ '&select='+select);
}

function formValidation(){

    var fname=document.getElementById("fname").value;
    var lname=document.getElementById("lname").value;
    var username=document.getElementById("username").value;
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
    var e = document.getElementById("szak");
    var select = e.options[e.selectedIndex].value;
    var minChar=9;
    var maxChar=100;
    if(fname=='' || fname.length <2  || fname.length >20){
        document.getElementById("fname").placeholder='Minimum 2, maximum 30 karakter';
        document.getElementById("fname").style.borderColor='red';
        return false;
    }

    if(lname==''  || lname.length <2  || lname.length >20){
        document.getElementById("lname").placeholder='A mező nem maradhat üres!';
        document.getElementById("lname").style.borderColor='red';
        return false;
    }
    if(username=='' || username.length <6 || username.length >20 ){
        document.getElementById("username").placeholder='Minimum 6, maximum 20 karakter!';
        document.getElementById("username").style.borderColor='red';
        return false;
    }
    if(email==''){
        document.getElementById("email").placeholder='A mező nem maradhat üres!';
        document.getElementById("email").style.borderColor='red';
        return false;
    }
    if(password=='' || password.length <9 || password.length >30){
        document.getElementById("password").placeholder='Minimum 9 maximum 30 karakter';
        document.getElementById("password").style.borderColor='red';
        return false;
    }
    if(select=='0'){
        document.getElementById("szak").placeholder='A mező nem maradhat üres!';
        document.getElementById("szak").style.borderColor='red';
        return false;
    }

    else{
        ajaxSend();
        return true;

    }



}

function SettingPop(x){
    var div=document.getElementById("mainrowcol");

      if (x==1){
          div.style.display='block';
      }else{
          div.style.display='none';
      }
}

/*function SettingPopAjax(){

    var xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function () {
        if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            alert(xmlHttp.responseText);


        }

    };
    var form=document.querySelector('form');

    var formData=new formData(form);

    xmlHttp.open('POST','../php/functions.php',true);
    /*xmlHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xmlHttp.send(formData);
}*/



