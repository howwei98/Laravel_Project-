<!DOCTYPE html>
<html>

<head>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  background: #007bff;
  background: linear-gradient(to right, #004d00, #009900);
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}

#progress{
  height:1em;
  width: 100%;
  margin-top:0.2em;
}

#progress-bar{
  width:0%;
  height:100%;
  transition:width 500ms linear;
}

.progress-bar-danger{
  background: red;
}

.progress-bar-warning{
  background: orange;
}

.progress-bar-success{
  background:#080;
}

</style>
</head>
<body>
     <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
            
        <div class="mt-5 ml-5">
            <img src="https://upload.wikimedia.org/wikipedia/commons/e/e1/Shopify_Logo.png" class="img-fluid w-25 h-auto" alt="Responsive image">
        </div>

          <div class="card-body p-4 p-sm-5">
            <h4 class="card-title text-left mb-5 fw-light fs-5">Create an Account</h4>
			<h6 class="text-left text-muted">The ecommerce platform made for you</h6>
            <form>
              <div class="form-floating mb-3">
				<label for="floatingInput">Email</label>
                <input type="email" class="form-control" required>
              </div>

            <div class="row">
            <div class="col-md-6 mb-3">
              <div class="form-floating mb-3">
				<label for="floatingInput">First name</label>
                <input type="text" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-floating mb-3">
				<label for="floatingInput">Last name</label>
                <input type="text" class="form-control" required>
              </div>
            </div> 
            </div>


              <div id="app" class="form-floating mb-3">
				<label for="floatingPassword">Password</label>
        <div class="input-group">
                <input id="password" :type="fieldType" class="form-control" autocomplete="off" required>
                <span class="input-group-append">
                  <div class="input-group-text bg-transparent">
                    <i class="fa fa-eye" @click.prevent="switchField" id="togglePwd"></i>
                  </div>
                </span>
                <div id="progress">
                  <div id="progress-bar"></div>
                </div>
</div>
        </div>

            
              <div class="form-floating mb-3" >
				        <label for="floatingPassword">Comfirm new password</label>
                <input id="passwrd2" type="password" class="form-control" onkeyup='check();' required>
                <span id="message" class="badge badge-light"></span>
			        </div>

              <div>
                <p style="font-size: 1rem;" class="text-left text-muted mb-0">By proceeding, you agree to the <a href="#!" class="fw-bold text-success">Term and Conditions</a></p>
              </div>

              <div class="d-grid mt-3">
                <button class="btn btn-success btn-login text-uppercase fw-bold" type="submit" id="submit" disabled>Create Account</button>
              </div>
          

              <div>
                <p class="text-left text-muted mt-5 mb-0">Already have an account? <a href="main" class="fw-bold text-success">Log In</a></p>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    var app = new Vue({
      el:'#app',

      data:{
        fieldType: "password"
      },

      methods:{
        switchField(){
          this.fieldType = this.fieldType === 'password' ? 'text' : 'password';
        }
      }
    });

    $(function(){
      $("#togglePwd").click(function(){
        $(this).toggleClass("fa-eye fa-eye-slash");
      });
    }); 

    function check(){
      if (document.getElementById('password').value ===
      document.getElementById('passwrd2').value){
        document.getElementById('submit').disabled = false;
        document.getElementById('message').style.color = "green"
        document.getElementById('message').innerHTML = "Password Match";
        console.log('pass');
      }else{
        document.getElementById('submit').disabled = true;
        console.log('not');
        document.getElementById('message').innerHTML = "Password Not Match";
        document.getElementById('message').style.color = "red";
      }
    }

    $.strength = function(element, password){
      var desc = [{
        'width': '0px'
      }, {
        'width' : '20%'
      }, {
        'width': '40%'
      }, {
        'width': '60%'
      },{
        'width': '80%'
      }, {
        'width': '100%'
      }];

      var descClass= ['', 'progress-bar-danger', 'progress-bar-danger', 'progress-bar-warning', 'progress-bar-success', 'progress-bar-success'];
      var score = 0;

      if(password.length > 6){
        score++;
      }

      if((password.match(/[a-z]/)) && (password.match(/[A-Z]/))){
        score++;
      }

      if(password.match(/\d+/)){
        score++;
      }

      if(password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)){
        score++;
      }

      if(password.length > 10){
        score++;
      }

      if(password.length == 0){
        element.removeClass().addClass('');
      }

      element.removeClass(descClass[score - 1]).addClass(descClass[score]).css(desc[score]);
    };

    $(function(){
      $("#password").keyup(function(){
        $.strength($("#progress-bar"), $(this).val());
      });
    });
   
  </script>

</body>
</html>