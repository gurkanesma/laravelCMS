<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel CMS | </title>

    <!-- Bootstrap -->
    <link href="{{asset('CMS/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('CMS/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('CMS/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('CMS/vendors/animate.css/animate.min.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('CMS/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
<div>

    <div class="login_wrapper">
        <div id="register" class="animate form login_form">
            <section class="login_content">
                <div >{{ __('Dashboard') }}</div>

                <div >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        Oturumun açık. Kapatmak için <a href="/logout">tıklayınız.</a>
                </div>
            </section>
        </div>
    </div>
</div>
</body>
</html>
