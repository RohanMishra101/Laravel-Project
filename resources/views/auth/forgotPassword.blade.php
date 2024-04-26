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
                <form method="post" action="{{ route('e_store-updatePassword') }}">
                    @csrf
                    <div class="form sign-in">
                        <h2>Forgot Password</h2>
                        <label>
                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            @if(session('emailMessage'))
                                <span>{{ session('emailMessage') }}</span>
                            @endif
                        </label>
                        <label>
                            <input type="password" name="password" placeholder="Password">
                            <input type="password" name="forgotPassword" placeholder="Confirm Password">
                            @if(session('message'))
                                <span>{{ session('message') }}</span>
                            @endif
                        </label>
                        <button class="submit" type="submit">Update Password</button>
                    </div>
                </form>
                
            </div>
        </section>
    </main>
</body>

</html>
