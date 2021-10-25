<!DOCTYPE html>
<html lang="en" style="height: 100%" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="./template/style/style.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <meta name="viewport" content="width=device_width, initial_scale=1">

    <title>Welcome to Tan dep trai</title>
</head>

<body style="height: 100%; width: 100%">
    <!-- <script>
    // Y axis scroll speed
var velocity = 0.1;

function update(){
    var pos = $(window).scrollTop();
    $('.background_repeat').each(function() {
        var $element = $(this);
        // subtract some from the height b/c of the padding
        var height = $element.height()-18;
        $(this).css('backgroundPosition', '50%' + Math.round((height - pos) * velocity) + '%');
    });
}

$(window).bind('scroll', update);
</script> -->
    <?php
       include 'action.php';
    ?>

    <div class="container-fluid font-weight-normal h-100 background_repeat" style="font-family: Helvetica, serif;
        background-image: url('img/top_view_fast_food.jpg')">
        <div class="row h-100">
            <div class="col-sm-12">
                <div class="row" style="margin-top: 5%">
                    <div class="col-sm-12 text-center">
                        <h1 class="font-weight-bold" style="color: #c1f585">Welcome to Restaurant POS 3.0</h1>
                    </div>
                </div>
                <div class="row align-content-center" style="margin-top: 3%">
                    <div class="col-sm-6 border-right d-flex align-self-start justify-content-center">
                        <div class="card" style="width: 60%">
                            <div class="card-header text-center">
                                <h3>Login</h3>
                            </div>
                            <div class="card-body" style="padding-right: 10%; padding-left: 10%">
                                <form>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
                                        </div>
                                        <label for="emailLogin"></label><input type="email" class="form-control" placeholder="Email" id="emailLogin">
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <label for="passwordLogin"></label><input type="password" class="form-control" placeholder="Password" id="passwordLogin">
                                    </div>
                                    <div class="row align-items-center remember">
                                        <label>
                                            <input type="checkbox">
                                        </label>Remember me
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn float-right login_btn">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <div class="justify-content-center d-flex social_icon">
                                    <span><i class="fab fa-facebook-square"></i></span>
                                    <span><i class="fab fa-google-plus-square"></i></span>
                                    <span><i class="fab fa-twitter-square"></i></span>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="text-white">Forgot password?</a>
                                </div>
                            </div>
                            <div class="card-footer" style="padding-right: 10%; padding-left: 10%">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-warning">
                                            <a href="?action=order" class="text-white">Access without login</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 border-right d-flex align-content-start justify-content-center">
                        <div class="card" style="width: 60%">
                            <div class="card-header text-center">
                                <h3>Sign in</h3>
                            </div>
                            <div class="card-body" style="padding-right: 10%; padding-left: 10%">
                                <form>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <label for="firstNameSignIn"></label><input type="text" class="form-control" style="margin-right: 2px" placeholder="First name" id="firstNameSignIn">
                                        <label for="lastNameSignIn"></label><input type="text" class="form-control" style="margin-left: 2px" placeholder="Last name" id="lastNameSignIn">
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                        </div>
                                        <label for="addressSignIn"></label><input type="text" class="form-control" placeholder="Address" id="addressSignIn">
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
                                        </div>
                                        <label for="emailSignIn"></label><input type="email" class="form-control" placeholder="Email" id="emailSignIn">
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <label for="passwordSignIn"></label><input type="password" class="form-control" placeholder="Password" id="passwordSignIn">
                                    </div>
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <label for="confirmPasswordSignIn"></label><input type="password" class="form-control" placeholder="Confirm password" id="confirmPasswordSignIn">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Sign in" class="btn float-right login_btn">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer" style="padding-right: 10%; padding-left: 10%">
                                <div class="d-flex justify-content-center">
                                    <p class="text-white text-wrap text-center">By clicking "Sign in" button, you agree to our Terms of use and Licenses</p>
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