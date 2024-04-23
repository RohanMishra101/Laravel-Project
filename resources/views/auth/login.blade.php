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
    <main>
        <section title="auth-section">
            <div class="cont">
                <form method="post" action="{{ route('e_store-signIn') }}">
                    @csrf
                    <div class="form sign-in">
                        <h2>Sign In</h2>
                        <label>
                            {{-- <span>Email Address</span> --}}
                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror
                        </label>
                        <label>
                            {{-- <span>Password</span> --}}
                            <input type="password" name="password" placeholder="Password">
                            @error('password')
                                <span>{{ $message }}</span>
                            @enderror
                            @if (session('error'))
                                <div style="color: red;">{{ session('error') }}</div>
                            @endif
                        </label>
                        <button class="submit" type="submit">Sign In</button>
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



                    <div class="form sign-up">
                        <form method="post" action="{{ route('e_store-signUp') }}">
                            @csrf
                            <h2>Sign Up</h2>
                            <label>
                                {{-- <span>Name</span> --}}
                                <input type="text" placeholder="Username" name="username">
                                @error('username')
                                    <span>{{ $message }}</span>
                                @enderror
                            </label>
                            <label>
                                {{-- <span>Email</span> --}}
                                <input type="email" placeholder="Email" name="email">
                                @error('email')
                                    <span>{{ $message }}</span>
                                @enderror
                            </label>
                            <label>
                                {{-- <span>Password</span> --}}
                                <input type="password" placeholder="Password"name="password">
                                @error('password')
                                    <span>{{ $message }}</span>
                                @enderror
                            </label>
                            <label>
                                {{-- <span>Confirm Password</span> --}}
                                <input type="password" placeholder="Confirm Password" name="confirmPassword">
                                @error('confirmPassword')
                                    <span>{{ $message }}</span>
                                @enderror
                            </label>
                            {{-- <input type="hidden" name="isMerchant" value="false"> --}}
                            <button type="submit" class="submit">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- background: -webkit-linear-gradient(left, #7579ff, #b224ef); -->
    <script>
        document.querySelector('.img-btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s-signup')
        });
        let signUpForm = document.querySelector('.sign-up-form');
        let selectResponse = document.querySelector('.selectRole');

        function select() {
            signUpForm.style.display = "block";
            selectResponse.style.display = "none";
        }
    </script>
</body>

</html>
