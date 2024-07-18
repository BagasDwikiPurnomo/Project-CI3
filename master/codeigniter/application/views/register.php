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
            padding-top: 15px;
        }

        form .paspor {
            width: 330px;
            height: 600px;
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
            padding-inline: 117px;
            padding-left: 80px;
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
    <title>Register Page</title>
</head>
<body>
    <form method="post" action="<?php echo base_url('Auth/login'); ?>">
        <div>
            <h3 style="margin-bottom:-18px; font-size: 27px;">Create Account</h3>
            <p style="color: grey;">Welcome please insert your details.</p>
            <label for="username">Email</label>
            <input type="text" name="username" required class="forms" placeholder="you@example.com" style="padding-left: 15px;">
            
            <label for="number">Phone Number <a style="color: grey;">(recommended)</a> </label>
            <input type="text" name="username" required class="forms" placeholder="0812-3456-7890" style="padding-left: 15px;">

            <label for="password">Password</label>
            <input type="password" name="password" required class="forms" placeholder="************" style="padding-left: 15px;">
            
            <b>           
            <div class="button-container">
            <button type="submit" class="submit"><label style="text-align: center; margin: 0 auto;">Sign up</label></button>
            <div class="social-buttons">
                <button href="" class="google">
                    <img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-512.png" alt="Google Logo" width="35px;">
                    <center>Sign up with Google</center>
                </button>
                <button href="" class="twitter">
                    <img src="https://cdn.icon-icons.com/icons2/2972/PNG/512/twitter_logo_icon_186891.png" alt="Twitter Logo">
                    Sign up with Twitter
                </button>
            </b>

            </div>
            </div>

            <div class="regist" style="margin-top: 15px;">
                <div class="regst">
                    <div>
                        <label>Already have account?</label>
                    </div>
                    <div>
                        <a href="#">Login</a>
                    </div>
                </div>
            </div>
        </div>
        <img src="..\assets\image\paspor.png" alt="Register Image" class="paspor">
    </form>
</body>
</html>
