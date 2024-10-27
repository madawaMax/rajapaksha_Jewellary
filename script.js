function changeView() {
    var signUpBox = document.getElementById("signup");
    var signInBox = document.getElementById("signin");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");

}



function signup(){
    var u = document.getElementById("username");
    var e = document.getElementById("address");
    var p = document.getElementById("pass");
    var c = document.getElementById("confirm-password");

    

    var form = new FormData();
    form.append("u", u.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("c", c.value);

  

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
          //  alert(response);
            if (response == "success") {
                document.getElementById("msg1").innerHTML = "Registration Successfull";
                 document.getElementById("msg1").className = "alert alert-success";
                 document.getElementById("msgdiv1").className = "d-block";

            }else{

                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgdiv1").className = "d-block";
            }

        }

    }
    request.open("POST", "signUpProcess.php", true);
    request.send(form);

}

function signin(){
   var e = document.getElementById("email");
   var p = document.getElementById("password");
   var r = document.getElementById("remember");

   var form = new FormData();
   form.append("e", e.value);
   form.append("p", p.value);
   form.append("r", r.value);

//    alert(e.value);
//    alert(p.value);
//    alert(r.value);

   var request = new XMLHttpRequest();

   request.onreadystatechange = function(){
    if (request.readyState == 4 & request.status == 200) {
        var response = request.responseText;

       //alert(response);

       if(response=="success"){

       window.location="home.php";

       }else{
        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgdiv2").className = "d-black";
       } 
    }
   }

   request.open("POST", "signinprocess.php", true);
   request.send(form);

}

function signout(){

   // alert("ok");

    var request = new XMLHttpRequest();
  
    request.onreadystatechange = function(){
      if(request.readyState == 4){
        var response = request.responseText;
       // alert(response);
       if(response == "sign out success fully"){
     alert(response);
        window.location=("index.php");
        
       }else{
        alert(response);
       }
       
  
      }
    }
  
    request.open("POST","signoutprocess.php",true);
    request.send();
  
  }

  function updateprofilepic(){

   // alert("ok");
     var iid = document.getElementById("profileimg");

     var f = new FormData();

  f.append("i",iid.files[0]);

   //alert(iid.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function(){

    if(request.readyState == 4 & request.status == 200){
         var response = request.responseText;

        if(response == "success"){
            alert("success");
            window.location.reload();

           
          
           }else{

            alert("please select profile image");
           }
     }

  }

  request.open("POST","profileimgupdate.php",true);
  request.send(f);


  }

  var forgotPasswordModal;

  function forgotPassword(){
   // alert("ok");

   var email = document.getElementById("email");

   var request = new XMLHttpRequest();

   request.onreadystatechange = function(){
    if(request.readyState == 4 && request.status == 200){
      var response = request.responseText;

      if(response == "success"){
        alert("verification sending successfully. Please cheack your email");
        var model = document.getElementById("fpModal");
        forgotPasswordModal = new bootstrap.Modal(model);
        forgotPasswordModal.show();
         
      }else{
        alert(response);
      }
    }
    }

   request.open("GET","fogotpasswordprocess.php?e=" + email.value,true);
   request.send();

  }

  function showPassword1(){
    var textfild = document.getElementById("np");
      var button = document.getElementById("npb");
  
      if (textfild.type == "password") {
        textfild.type = "text";
        button.innerHTML = "Hide";
      } else {
        textfild.type = "password";
        button.innerHTML = "show";
      }
  }
  
  
  
  function showPassword2(){
    var textfild = document.getElementById("nnp");
    var button = document.getElementById("nnpb");
  
    if (textfild.type == "password") {
      textfild.type = "text";
      button.innerHTML = "Hide";
    } else {
      textfild.type = "password";
      button.innerHTML = "show";
    }
  }
  

  function resetpw(){

  var emaill = document.getElementById("email");
  var newpassword = document.getElementById("np");
  var retypepassword = document.getElementById("nnp");
  var verificationcode = document.getElementById("vc");

  var f = new FormData();
  f.append("e",emaill.value);
  f.append("n",newpassword.value);
  f.append("r",retypepassword.value);
  f.append("v",verificationcode.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function(){
  if(request.readyState == 4 && request.status == 200){
    var response = request.responseText;
   // alert(response);

   if(response == "success"){
    alert("password reset success");
    forgotPasswordModal.hide();

    window.location.reload();

   }else{
    alert(response);
   }
  }
 }

 request.open("POST","resetpasswordprocess.php",true);
 request.send(f);

}

function updateProfile(){

    var name = document.getElementById("inputName");
    var mobile = document.getElementById("inputPhone");
    var address = document.getElementById("inputAddress");
    var city = document.getElementById("inputCity");
    var zipcode = document.getElementById("inputZip");
    
  
    var f = new FormData();
    f.append("f",name.value);
    f.append("m",mobile.value);
    f.append("a",address.value);
    f.append("c",city.value);
    f.append("z",zipcode.value);
   
  
    var request = new XMLHttpRequest();
  
    request.onreadystatechange = function(){
      if(request.readyState == 4 & request.status == 200){
        var response = request.responseText;
        alert(response);
      }
    }
  
    request.open("POST","profiledetailsupdate.php",true);
    request.send(f);
  
  
  }

  function adminregister(){
    var u = document.getElementById("adminusername");
    var e = document.getElementById("adminemail");
    var p = document.getElementById("adminpassword");
    var c = document.getElementById("adminconfirmPassword");

   

    var f = new FormData();
    f.append("ua",u.value);
    f.append("ea",e.value);
    f.append("pa",p.value);
    f.append("ca",c.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function(){
      if(request.readyState == 4 & request.status == 200){
        var response = request.responseText;
       

       if(response !== "success"){
        alert(response);
       
       }else if(response == "success"){
       // window.location = "adminlogin.php";
        alert("nice");
      
       }


      }

    }

    request.open("POST","adminregisterprocess.php", true);
    request.send(f);
  

   
   
  }

  function adsignin(){
   // alert("ok");

   var n = document.getElementById("adusername");
   var p = document.getElementById("adpassword");
   var r = document.getElementById("adrememberMe");

   var form = new FormData();
   form.append("e", n.value);
   form.append("p", p.value);
   form.append("r", r.value);

   var request = new XMLHttpRequest();

   request.onreadystatechange = function(){
    if (request.readyState == 4 & request.status == 200) {
        var response = request.responseText;

       //alert(response);

       if(response=="success"){

       window.location="admindashbord.php";

       }else{

        alert(response);
        // document.getElementById("msg2").innerHTML = response;
        // document.getElementById("msgdiv2").className = "d-black";
       } 
    }
   }

   request.open("POST", "adsigninprocess.php", true);
   request.send(form);

  }

  function changestatus(){
    var username = document.getElementById("uname");

    var f =new FormData();
    f.append("u",username.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function(){
      if (request.readyState == 4 & request.status == 200) {
        var response = request.responseText;

        if(response== "deactive"){
         
          alert("deactive success");

              window.location.reload();

      }else if(response== "active"){
          
        alert("active success");
        window.location.reload();
      }else{
        alert(response);

      }
      }
    }
    request.open("POST", "changestatusprocess.php", true);
  request.send(f);

}

function usermanage(){

  // alert("ok")

  var request = new XMLHttpRequest();

  request.onreadystatechange = function(){
   if (request.readyState == 4 & request.status == 200) {
       var response = request.responseText;

       document.getElementById("tb").innerHTML.response;
     // alert(response);
   }

  }

  request.open("POST", "loadcustormer.php", true);
  request.send();

}


function adminsignout(){

  // alert("ok");

   var request = new XMLHttpRequest();
 
   request.onreadystatechange = function(){
     if(request.readyState == 4){
       var response = request.responseText;
      // alert(response);
      if(response == "sign out success fully"){
    alert(response);
       window.location=("adminlogin.php");
       
      }else{
       alert(response);
      }
      
 
     }
   }
 
   request.open("POST","adminsignoutprocess.php",true);
   request.send();
 
}


function categoryregister(){

  var category = document.getElementById("category");
  //alert(category.value)

  var f = new FormData();
  f.append("c",category.value);

  var request = new XMLHttpRequest();

       request.onreadystatechange = function(){
        if(request.readyState == 4 & request.status == 200){
          var response = request.responseText;
        //  alert(response)

        if(response=="success"){
          alert("category register is successfull");
          location.reload();
        }else{
          alert("category register is not successfully");
        }
      }
    }
  

  request.open("POST","categoryregisterprocess.php",true);
  request.send(f);
}

function brandregister(){
  var brand = document.getElementById("brand");
  //alert(category.value)

  var f = new FormData();
  f.append("b",brand.value);

  var request = new XMLHttpRequest();

       request.onreadystatechange = function(){
        if(request.readyState == 4 & request.status == 200){
          var response = request.responseText;
        //  alert(response)

        if(response=="success"){
          alert("brand register is successfull");
          location.reload();
        }else{
          alert("brand register is not successfully");
        }
      }
    }
  

  request.open("POST","brandregisterprocess.php",true);
  request.send(f);
}

function sizeregister(){
  var size = document.getElementById("size");
  //alert(category.value)

  var f = new FormData();
  f.append("s",size.value);

  var request = new XMLHttpRequest();

       request.onreadystatechange = function(){
        if(request.readyState == 4 & request.status == 200){
          var response = request.responseText;
        //  alert(response)

        if(response=="success"){
          alert("size register is successfull");
          location.reload();
        }else{
          alert("size register is not successfully");
        }
      }
    }
  

  request.open("POST","sizeregisterprocess.php",true);
  request.send(f);
}

function loadproduct(x){
  var page = x;
 // alert(x)
 
 var form = new FormData();
 form.append("p", page);

 var request = new XMLHttpRequest();

 request.onreadystatechange = function(){
  if(request.readyState == 4 & request.status == 200){
    var response = request.responseText;
    

  document.getElementById("cartid").innerHTML=response;
  // alert(response);
  }

 }

 request.open("POST","pageloadprocess.php",true);
 request.send(form);

}


function productmanage(){

  // alert("ok")

  var request = new XMLHttpRequest();

  request.onreadystatechange = function(){
   if (request.readyState == 4 & request.status == 200) {
       var response = request.responseText;

       document.getElementById("ptb").innerHTML.response;
     // alert(response);
   }

  }

  request.open("POST", "productmanagement.php", true);
  request.send();

}



function addProduct() {
  var name = document.getElementById("productName");
  var category = document.getElementById("productCategory");
  var brand = document.getElementById("productbrand");
  var model = document.getElementById("productmodel");
  var size = document.getElementById("productsize");
  
  var description = document.getElementById("productDescription");
  var image = document.getElementById("image");

  // Creating FormData object
  var f = new FormData();
  f.append("n", name.value);
  f.append("ca", category.value);
  f.append("b", brand.value);
  f.append("m", model.value);
  f.append("s", size.value);
  f.append("d", description.value);
  f.append("i", image.files[0]); // Only single image is being uploaded

  // Creating XMLHttpRequest object
  var r = new XMLHttpRequest();

  // Handling the response
  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;
      if (response == "success") {
        alert("Product saved successfully");
        // Optionally reload the page
        // location.reload();
      } else {
        alert(response);
      }
    }
  };

  // Sending request
  r.open("POST", "addProductProcess.php", true);
  r.send(f);
}


function updatestock(){
  var productname = document.getElementById("productname");
  var qty = document.getElementById("productStock");
  var price = document.getElementById("productPrice");
 
   //alert(productname.value)
 
   var form = new FormData();
     form.append("p", productname.value);
     form.append("q", qty.value);
     form.append("up", price.value);
 
     var request = new XMLHttpRequest();
 
     request.onreadystatechange = function(){
       if(request.readyState == 4 & request.status == 200){
         var response = request.responseText;
         alert(response)
         location.reload();
       }
     }
 
     request.open("POST","stockupdateprocess.php",true);
     request.send(form);
}

function deleteproduc(id){

  var request = new XMLHttpRequest();

  request.onreadystatechange = function(){
    if(request.readyState == 4){
      var txt = request.responseText;
      if(txt == "success"){
        alert("ok");
        window.location.reload();
      }else{
        alert(txt);
        console.log(txt);
      }
    }
  }

  request.open("GET","productdeleteProcess.php?id="+id,true);
    request.send();
}

function updateproduct(pid){

  window.location.href = 'updateproduct.php?product_id=' + pid;



}

