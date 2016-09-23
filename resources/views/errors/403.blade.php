<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Acesso Negado</title>

    <!-- Bootstrap -->
    <link href="/css/controle/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/fonts/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/css/controle/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/css/controle/custom.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
            <div class="col-middle">
                <div class="text-center text-center">
                    <h1 class="error-number">403</h1>

                    <h2>Acesso Negado</h2>

                    <p>Você não tem permissão para acessar essa página.</p>

                    <p>Volte para <a href="{{ redirect()->back()->getTargetUrl() }}">página anterior</a>.</p>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>

<!-- jQuery -->
<script src="/library/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/library/bootstrap.min.js"></script>
<!-- NProgress -->
<script src="/library/nprogress.js"></script>
<!-- Custom -->
<script src="/library/nprogress.js"></script>
</body>
</html>