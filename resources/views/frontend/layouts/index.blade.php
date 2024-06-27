<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="../front/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../front/css/bootstrap.min.css">
    <link rel="stylesheet" href="../front/css/magnific-popup.css">
    <link rel="stylesheet" href="../front/css/jquery-ui.css">
    <link rel="stylesheet" href="../front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../front/css/aos.css">
    <link rel="stylesheet" href="../front/css/style.css">

</head>

<body>

    <div class="site-wrap">
        @include('frontend.layouts._header')
        @yield('contents')
        @include('frontend.layouts._footer')
    </div>

    <script src="../front/js/jquery-3.3.1.min.js"></script>
    <script src="../front/js/jquery-ui.js"></script>
    <script src="../front/js/popper.min.js"></script>
    <script src="../front/js/bootstrap.min.js"></script>
    <script src="../front/js/owl.carousel.min.js"></script>
    <script src="../front/js/jquery.magnific-popup.min.js"></script>
    <script src="../front/js/aos.js"></script>
    @yield('customjs')
    <script src="../front/js/main.js"></script>

</body>

</html>
