<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/forgot-password.css">
    <title>Quên mật khẩu</title>
</head>

<body>
    <div class="col-md-4 m-auto">
        <div class="card">
            <div class="card-header bg-info"> QUÊN MẬT KHẨU</div>
            <div class="card-body">
                <form class="form-horizontal" action="{{route("gui_mail")}}">
                    <!-- @csrf
                    @if(session('error'))
                    <div>
                        {{session('error')}}
                    </div>

                    @endif

                    @if(session('success'))
                    <div>
                        {{session('success')}}
                    </div>

                    @endif -->
                    <p> <label class="control-label ">Email:</label>
                        <input class="form-control" name="email" type="email">
                    </p>
                    <p><button type="submit" class="btn btn-warning">Gửi mail</button></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>