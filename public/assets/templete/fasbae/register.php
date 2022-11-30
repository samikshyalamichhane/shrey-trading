<?php include "./inc/header.php"?>
<link rel="stylesheet" href="css/importR.css">
<section id="register">
    <div class="container">
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 mx-auto p-l-50 p-r-50 p-t-72 p-b-50">
                    <form class="login100-form validate-form">
                        <span class="login100-form-title p-b-59">
                            Register Now
                        </span>
                        <div class="wrap-input100 validate-input" data-validate="Name is required">
                            <span class="label-input100">Full Name</span>
                            <input class="input100" type="text" name="name" placeholder="Name...">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <span class="label-input100">Email</span>
                            <input class="input100" type="email" name="email" placeholder="Email addess...">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Username is required">
                            <span class="label-input100">Username</span>
                            <input class="input100" type="text" name="username" placeholder="Username...">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="pass" placeholder="*************">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Repeat Password is required">
                            <span class="label-input100">Repeat Password</span>
                            <input class="input100" type="password" name="repeat-pass" placeholder="*************">
                            <span class="focus-input100"></span>
                        </div>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn">
                                   Register Now
                                </button>
                            </div>

                            <a href="login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                                Log in
                                <i class="fa fa-long-arrow-right m-l-5"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "./inc/footer.php"?>