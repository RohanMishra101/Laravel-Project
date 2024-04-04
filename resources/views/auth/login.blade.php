<!DOCTYPE html>
<html>

<head>
    <title>Login & Signup Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>


<body>
    <div class="cont">
        <form action="">
            <div class="form sign-in">
                <h2>Sign In</h2>
                <label>
                    <span>Email Address</span>
                    <input type="email" name="email">
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password">
                </label>
                <button class="submit" type="button">Sign In</button>
                <p class="forgot-pass">Forgot Password ?</p>
            </div>
        </form>

        <div class="sub-cont">
            <div class="img">
                <div class="img-text m-up">
                    <h2>Haven't created Account<br>Yet?</h2>
                    <p>Create one for free</p>
                </div>
                <div class="img-text m-in">
                    <h2>Already have an Account?</h2>
                </div>
                <div class="img-btn">
                    <span class="m-up">Sign Up</span>
                    <span class="m-in">Sign In</span>
                </div>
            </div>
            <form action="">
                <div class="form sign-up">
                    <h2>Sign Up</h2>
                    <label>
                        <span>Name</span>
                        <input type="text">
                    </label>
                    <label>
                        <span>Email</span>
                        <input type="email">
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password">
                    </label>
                    <label>
                        <span>Confirm Password</span>
                        <input type="password">
                    </label>
                    <button type="button" class="submit">Sign Up Now</button>
                </div>
            </form>
        </div>

<body>
    <div class="cont">
        <div class="form sign-in">
            <h2>Sign In</h2>
            <label>
                <span>Email Address</span>
                <input type="email" name="email">
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="password">
            </label>
            <button class="submit" type="button">Sign In</button>
            <p class="forgot-pass">Forgot Password ?</p>
        </div>

        <div class="sub-cont">
            <div class="img">
                <div class="img-text m-up">
                    <h2>Haven't created Account<br>Yet?</h2>
                    <p>Create one for free</p>
                </div>
                <div class="img-text m-in">
                    <h2>Already have an Account?</h2>
                </div>
                <div class="img-btn">
                    <span class="m-up">Sign Up</span>
                    <span class="m-in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Sign Up</h2>
                <label>
                    <span>Name</span>
                    <input type="text">
                </label>
                <label>
                    <span>Email</span>
                    <input type="email">
                </label>
                <label>
                    <span>Password</span>
                    <input type="password">
                </label>
                <label>
                    <span>Confirm Password</span>
                    <input type="password">
                </label>
                <button type="button" class="submit">Sign Up Now</button>
            </div>
        </div>

    </div>
    <!-- background: -webkit-linear-gradient(left, #7579ff, #b224ef); -->
    <script>
        document.querySelector('.img-btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s-signup')
        });
    </script>
</body>

</html>
