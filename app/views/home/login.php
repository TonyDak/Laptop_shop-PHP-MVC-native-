<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laptop - Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="assets/img/RC_Collection_1000x1000_1.png"
                                    alt="" style="width:450px; height:450px;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    
                                    <form class="user" method="POST" action="http://localhost/laptop_shop/login/login" onsubmit="return btnlogin()">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                name="email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>

                                        <button class="btn btn-primary btn-user btn-block" type="button" name="login"
                                        onclick="btnlogin()">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="http://localhost/laptop_shop/register">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/check.js"></script>
<script>
    function btnlogin() {
        var emailInput = $('input[name=email]');
        var passwordInput = $('input[name=password]');
        data = {
            'email': emailInput.val(),
            'password': passwordInput.val()
        };
        if(checkEmptyAndHighlight(emailInput) && checkEmptyAndHighlight(passwordInput)){
            swal("Error", "Vui lòng nhập đầy đủ thông tin", "error");
        }else{
            $.ajax({
                url: "http://localhost/laptop_shop/login/login",
                type: "POST",
                data: data,
                success: function (data) { 
                    var data2 = JSON.parse(data);
                    if(data2.check == 'error'){
                        swal("Error", "Email hoặc mật khẩu không đúng", "error");
                    }
                    if(data2.check == 'success'){
                        swal("Success", "Đăng nhập thành công", "success")
                        .then((value) => {
                            window.location.href = "http://localhost/laptop_shop/home";
                        });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        } 
    }
</script>