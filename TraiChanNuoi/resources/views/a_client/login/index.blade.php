@extends('a_client.layout._layout')

@section('title', 'Đăng nhập')


@section('content')

<!-- <div class="breadcumb-nav">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <div class="popular_program_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center">
                        <h3>Đăng nhập</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                </div>
                <div class="col-lg-4 col-md-6">
                    @if (Session::get('message') != null)
                        <h5 class="alert alert-danger text-center" id="AlertBox">{{ Session::get('message') }}</h5>
                    @endif

                    <form action="/frmLogin.html" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Tài khoản</label>
                            <input type="text" class="form-control" name="TaiKhoan" required>
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" class="form-control" name="MatKhau" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body id="dangnhap">
    <div id="wrapper">
        <div class="col-lg-4 col-md-6">
            @if (Session::get('message') != null)
                <h5 class="alert alert-danger text-center" id="AlertBox">{{ Session::get('message') }}</h5>
            @endif
            <form action="/frmLogin.html" id="form-login" method ="post">
                <h1 class="form-heading">Đăng nhập</h1>
                {{ csrf_field() }}
                <div class="form-group">
                    <i class="far fa-user"></i>
                    <input type="text" class="form-input" placeholder="Tên đăng nhập" name="TaiKhoan" >
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <input type="password" class="form-input" placeholder="Mật khẩu" name="MatKhau">
                    <div id="eye">
                        <i class="far fa-eye"></i>
                    </div>
                </div>
                <input type="submit" value="Đăng nhập" class="form-submit">
            </form>
        </div>
    </div>
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>
</html>

@endsection



@section('jsSection')

    <script type="text/javascript">
        $(function () {


        });
    $(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if($(this).hasClass('open')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');
        }
        });
    });
    </script>
    @endsection
