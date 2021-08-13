<!DOCTYPE html>
<html>

<head>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
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
            <h4 class="card-title text-left mb-5 fw-light fs-5">Log In</h4>
			<h6 class="text-left text-muted">Continue to Shopify</h6>
            <form action="">
              <div class="form-floating mb-3">
				<label for="floatingInput">Email address</label>
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
              </div>
              <div id="app" class="form-floating mb-3">
				        <label for="floatingPassword">Password</label>
                <div class="input-group">
                <input :type="fieldType" class="form-control" id="floatingPassword" placeholder="Password" required>
                <span class="input-group-append">
                  <div class="input-group-text bg-transparent">
                    <i class="fa fa-eye" @click.prevent="switchField" id="togglePwd"></i>
                  </div>
                </span>
              </div>
			  </div>
              <div class="d-grid">
                <button class="btn btn-success btn-login text-uppercase fw-bold" type="submit">Log In</button>
              </div>

              <div>
                <p class="text-left text-muted mt-5 mb-0">New to Shopify? <a href="register" class="fw-bold text-success">Get started</a></p>
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
  </script>

</body>
</html>