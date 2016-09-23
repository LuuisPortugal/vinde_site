<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Controle</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/controle/bootstrap.min.css" rel="stylesheet">
    <link href="/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/controle/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="/css/controle/custom.css" rel="stylesheet">
    <link href="/css/controle/icheck/flat/green.css" rel="stylesheet">
    <script src="/library/jquery.min.js"></script>

    <!--[if lt IE 9]>
    <script src="../assets/library/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body style="background:#F7F7F7;">
<a class="hiddenanchor" id="toregister"></a>
<a class="hiddenanchor" id="tologin"></a>

<div id="wrapper">
    <div id="login" class="animate form">
        <section class="login_content">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="clearfix"></div>
                    <img src="/images/icon_vinde.png" width="150"/>
                </div>
            </div>
            {!! Form::open(['route' => 'auth.login']) !!}
            <h1>Área Restrita</h1>
            @if(session()->has('error'))
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Login e/ou Senha estão incorretos.
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail', 'required']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha', 'required']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    {!! Form::submit('Login', ['class' => 'pull-right btn btn-default']) !!}
                </div>
            </div>
            {!! Form::close() !!}
                    <!-- form -->
        </section>
        <!-- content -->
    </div>
</div>

<!-- bootstrap js -->
<script src="/library/bootstrap.min.js"></script>
</body>
</html>