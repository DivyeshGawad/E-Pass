<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php'; ?>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
</head>
<body class="form">

    <div class="form-container">
        
        <div class="form-form">
            <div class="form-form-wrap">
                
                <div class="form-container">
                    <div class="form-content">
                    <center><img class="my-3" src="img/logo.png" alt=""></center>
                        <h1 class="">Log In to <a href="index.html"><span class="brand-name">ADMIN</span></a></h1>
                        <!--<p class="signup-link">New Here? <a href="auth_register.html">Create an account</a></p>-->
                        <form class="text-left" method="POST" action="login_proc.php">
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="username" name="uname" type="email" class="form-control" placeholder="E-mail" required>
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <!--<div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Show Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>-->
                                    <div class="field-wrapper mx-auto">
                                        <button type="submit" class="btn btn-primary" value="" name="submit_btn">Log In</button>
                                    </div>
                                </div>
                                <div class="field-wrapper">
                                    <a href="auth_pass_recovery.html" class="forgot-pass-link">Forgot Password?</a>
                                </div>
                            </div>
                        </form>                        
                        <p class="terms-conditions">© 2022 All Rights Reserved. This <a href="index.php">Project</a>  is owned by of Vaibhav & Yuvraj, TransCity InfoTech.</p>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>

    
    <?php include 'script.php'; ?>

</body>
</html>



