<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="utf-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>App Name - @yield('title') </title>

    <!-- Styles -->
    <!-- <link href="/css/app.css" rel="stylesheet"> -->

    <!-- Gentelella -->
    <!-- Bootstrap -->
    <link href="../vendors_gentelella/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors_gentelella/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors_gentelella/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors_gentelella/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors_gentelella/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors_gentelella/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Gentelella -->

    {{-- jquery-3.1.1.min --}}
     <script src="../public/js/jquery-3.1.1.min.js"></script>
    {{-- /jquery-3.1.1.min --}}

    {{-- select2 --}}
    <script src="../public/select2/js/select2.min.js"></script>
    <link href="../public/select2/css/select2.min.css" rel="stylesheet">
    {{-- select2 --}}

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @yield('content_form')
</body>
</html>