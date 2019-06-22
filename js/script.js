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
        alert("Sikeresen regiszráltál,mostmár betudsz jelentkezni");


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
    if(fname=='' ){
        document.getElementById("fname").placeholder='A mező nem maradhat üres,és csak betüket tartalmazhat';
        document.getElementById("fname").style.borderColor='red';
        return false;
    }

    if(lname==''){
        document.getElementById("lname").placeholder='A mező nem maradhat üres!';
        document.getElementById("lname").style.borderColor='red';
        return false;
    }
    if(username==''){
        document.getElementById("username").placeholder='A mező nem maradhat üres!';
        document.getElementById("username").style.borderColor='red';
        return false;
    }
    if(email==''){
        document.getElementById("email").placeholder='A mező nem maradhat üres!';
        document.getElementById("email").style.borderColor='red';
        return false;
    }
    if(password=='' || password<minChar){
        document.getElementById("password").placeholder='A mező nem maradhat üres!';
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

