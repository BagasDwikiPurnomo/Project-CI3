<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            display: flex;
            gap: 40px;
            background-color: white;
            padding-bottom: 0px;
            padding-right: 0px;
            padding-left: 50px;
            padding: 55px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        h3 {
            padding-top: 20px;
        }

        form .paspor {
            width: 300px;
            height: 540px;
            object-fit: cover;
        }

        form div {
            justify-content: space-between;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        .forms {
            width: 400px;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        
        .login-box {
            display: flex;
            gap: 20px;
        }

        .regst {
            display: flex;
            padding-inline: 78px;
        }

        button {
            display: flex;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            align-items: center;
            margin: 15px auto;
            font-family: 'Times New Roman';
            font-size: 16px;
        }

        .submit{
            width: 100%;
            background-color: #87A0F7;
            color: white;
        }

        .submit:hover {
            background-color: white;
            border: 2px solid #87A0F7;
            color: black;
            font-weight: bold;
            height: calc(7%);
        }

        .google, .twitter{
            background-color: white;
            border: 1px solid black;
            text-align: center;
        }

        .social-buttons img {
            width: 25px; /* Adjust the size as needed */
            margin: 0 8px;
            padding-left: 93px;
        }


    </style>
    <title>Login Page</title>
</head>
<body>
    <form method="post" action="<?php echo base_url('Auth/login'); ?>">
        <div>
            <h3 style="margin-bottom:-18px;">Welcome</h3>
            <p style="color: grey;">Welcome please enter your details.</p>
            <label for="username">Email</label>
            <input type="text" name="username" required class="forms" placeholder="you@example.com" style="padding-left: 15px;">

            <label for="password">Password</label>
            <input type="password" name="password" required class="forms" placeholder="************" style="padding-left: 15px;">
            <div class="remember-forgot">
                <div class="login-box">
                    <div>
                        <input type="radio" id="remember" name="remember">
                    </div>
                    <div>
                        <label style="margin-left:-133px;">Remember me</label>
                    </div>
                    <div>
                        <a href="#">Forgot Password?</a>
                    </div>
                </div>
            </div>
            
            <b>           
            <div class="button-container">
            <button type="submit" class="submit"><label style="text-align: center; margin: 0 auto;">Sign in</label></button>
            <div class="social-buttons">
                <button href="" class="google">
                    <img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-512.png" alt="Google Logo" width="35px;">
                    <center>Sign in with Google</center>
                </button>
                <button href="" class="twitter">
                    <img src="https://cdn.icon-icons.com/icons2/2972/PNG/512/twitter_logo_icon_186891.png" alt="Twitter Logo">
                    Sign in with Twitter
                </button>
            </b>

            </div>
            </div>

            <div class="regist" style="margin-top: 15px;">
                <div class="regst">
                    <div>
                        <label>Don't have account?</label>
                    </div>
                    <div>
                        <a href="#">Sign up for free</a>
                    </div>
                </div>
            </div>
        </div>
        <img src="..\assets\image\paspor-pesawat.png" alt="Login Image" class="paspor">
    </form>
</body>
</html>
