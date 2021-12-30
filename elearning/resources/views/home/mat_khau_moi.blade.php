<html>

<head>
    <title>Mật khẩu</title>
    <link rel="stylesheet" href="{{asset("css/register.css")}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i|Noto+Sans:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('tao_mat_khau_moi', ['id' => $user->id])}}" method="post">
                @csrf
                @if(session('thongbao'))
                <div class="alert alert-success" style="font-size: 14px;color:grey">
                    {{session('thongbao')}}
                </div>
                @endif
                <h2>Mật khẩu mới</h2>
                <input type="password" placeholder="Mật khẩu" name="password" />
                @error('password')
                <div style="color: red;font-size:12px;margin-right:38px;">{{ $message }}</div>
                @enderror
                <input type="password" placeholder="Nhập lại password" name="passwordagain" />
                @error('passwordagain')
                <div style="color: red;font-size:12px;margin-right:38px;">{{ $message }}</div>
                @enderror

                <button type=" submit" style="cursor:pointer;">Hoàn thành</button>
                @if(session('title'))
                <div class="alert alert-success" style="font-size: 14px;color:grey">
                    {{session('title')}}
                </div>
                @endif

                <p class="p-bottom-w3ls" style="padding-top:12px">Login <a class href="{{route("dang_nhap")}}" style="text-decoration: none">Click here</a></p>
            </form>
        </div>
    </div>
</body>

</html>