<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng kí</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Clean Login Form Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />

    <!-- css files -->
    <link href="{{asset("css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset("css/register.css")}}" rel="stylesheet" type="text/css" media="all" />
    <!-- /css files -->

    <!-- online fonts -->
    <link href="//fonts.googleapis.com/css?family=Sirin+Stencil" rel="stylesheet">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{route("post_dang_ki")}}" method="post">
                @csrf
                <h1>Đăng kí</h1>
                <input type="text" placeholder="Tên" name="username" />
                @error('username')
                <div class="alert alert-danger" style="color: red;font-size:12px;padding-right: 30px;">{{ $message }}</div>
                @enderror
                <input type="email" placeholder="Email" name="email" />
                @error('email')
                <div class="alert alert-danger" style="color: red;font-size:12px;padding-right: 90px;">{{ $message }}</div>
                @enderror
                <input type="password" placeholder="Mật khẩu" name="password" />
                @error('password')
                <div class="alert alert-danger" style="color: red;font-size:12px;padding-right: 60px;">{{ $message }}</div>
                @enderror
                <input type="password" placeholder="Nhập lại password" name="passwordagain" />
                @error('passwordagain')
                <div class="alert alert-danger" style="color: red; font-size:12px;padding-right: 60px;">{{ $message }}</div>
                @enderror
                <button type="submit">Đăng kí</button>
            </form>
        </div>
    </div>
</body>

</html>