<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gym Booking Uitm Puncak Perdana</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css'>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container vh-100 mt-5">
        <div class="rounded d-flex justify-content-center pt-5">
            <div class="col-12 col-sm-12 col-lg-6  col-md-6 shadow-lg pt-5 bg-light">
                <div class="text-center">
                    <a href="/" class="navbar-brand d-flex align-items-center px-5 px-lg-5">
                        <img style="width:auto; height: 60px;" src="/public/assets/img/uitm_logo.png" alt="Image">
                    </a>
                </div>
                <form method="post" action="{{ route('login.perform') }}">
                    @csrf
                    <div class="p-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                                placeholder="Username" required="required" autofocus>
                            <label for="floatingInput">Student ID /Staff ID</label>
                            @if ($errors->has('username'))
                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                placeholder="Password" required="required">
                            <label for="floatingPassword">Password</label>
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-primary text-center mt-2 btn-full"
                                style="background-color: #61116a;"type="submit">
                                Login
                            </button>
                        </div>
                        <p class="text-center mt-5">
                            <a href="/register">Create Account</a> |
                            <a href="/forget-password">Forgot your password?</a>
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js'></script>
</body>

</html>
