<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <link rel="stylesheet" href="css/button_1.css" type="text/css">
    <link rel="stylesheet" href="css/Components_css/product_box.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<!-- Header-->
@include('includes.header');
<!-- end Header -->



<!-- Start login section -->

<div class="container px-15">
    <div class="row justify-content-center m-5 p-0">
        <section class="outline_block col-12 col-lg-6 col-md-12 col-sm-12">
            <form class="details_block" method="POST" action="{{url('login')}}">
                @csrf
                <h3>Login</h3>
                <section class="login_section">
                    <label for="email_login">Email</label>
                    <label class="input_label">
                        <input type="email" placeholder="Email" id="email_login" name="email">
                    </label>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </section>
                <section class="login_section">
                    <label for="password_login">Password</label>
                    <label class="input_label">
                        <input type="password" placeholder="Password" id="password_login" name="password">
                    </label>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </section>
                <section class="login_section">
                    <section class="checkbox_section my-4">
                        <label class="checkbox_label">
                            <input class="checkbox" type="checkbox" id="remember_me">
                        </label>
                        <label for="remember_me">Remember me</label>
                    </section>
                </section>
                <button class="btn_custom mt-5 align-self-center" type="submit">Login</button>
            </form>
        </section>

        <!-- End login section -->

        <!-- Start register section -->
        <section class="outline_block col-12 col-lg-6 col-md-12 col-sm-12">
            <form class="details_block" method="POST" action="{{url('register')}}">
                @csrf
                <h3>Register</h3>
                <section class="register_section">
                    <label for="name_register">First name</label>
                    <label class="input_label">
                        <input type="text" placeholder="First name" id="name_register" name="first_name">
                    </label>
                    @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </section>
                <section class="register_section">
                    <label for="surname_register">Last name</label>
                    <label class="input_label">
                        <input type="text" placeholder="Last name" id="surname_register" name="last_name">
                    </label>
                    @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </section>
                <section class="register_section">
                    <label for="email_register">Email</label>
                    <label class="input_label">
                        <input type="text" placeholder="Email" id="email_register" name="email_register">
                    </label>
                    @error('email_register')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </section>
                <section class="register_section">
                    <label for="password_register">Password</label>
                    <label class="input_label">
                        <input type="password" placeholder="Password" id="password_register" name="password_register">
                    </label>
                    @error('password_register')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </section>
                <section class="register_section">
                    <label for="password_retype">Re-enter password</label>
                    <label class="input_label">
                        <input type="password" placeholder="Password" id="password_retype" name="password_retype">
                    </label>
                    @error('password_retype')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </section>
                <button class="btn_custom mt-5 align-self-center" type="submit">Create Account</button>
            </form>
        </section>
    </div>
</div>
<!-- End register section -->

<!-- Footer -->
@include('includes.footer');
<!-- end Footer -->
</body>
</html>

