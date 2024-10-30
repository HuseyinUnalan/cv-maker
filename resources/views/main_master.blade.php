<!doctype html>
<html lang="tr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Title -->
    <title>CV-MAKER</title>


    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/index.css') }}">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">




</head>

<body>


    @include('body.header')

    @yield('content')

</body>

<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<script src="{{ asset('frontend/js/index.js') }}"></script>

<script src="https://kit.fontawesome.com/0109620449.js" crossorigin="anonymous"></script>


<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>




</body>

</html>
