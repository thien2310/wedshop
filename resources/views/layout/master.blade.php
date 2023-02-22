<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shopping</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="{{asset('acountDetail/css/tylesDetail.css')}}"> -->
    <link rel="apple-touch-icon" href="{{asset('TemplateShop/assets/img/apple-icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('TemplateShop/assets/img/favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('TemplateShop/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('TemplateShop/assets/css/templatemo.css')}}">
    <link rel="stylesheet" href="{{asset('TemplateShop/assets/css/custom.css')}}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{asset('TemplateShop/assets/css/fontawesome.min.css')}}">
    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>

    <!-- Start Top Nav -->
    @include('partials.topnavbar')
    <!-- Close Top Nav -->


    <!-- Header -->
    @include('partials.header')
    <!-- Close Header -->

    @yield('content')


    <!-- Start Footer -->
    @include('partials.footer')
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="{{asset('TemplateShop/assets/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('TemplateShop/assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('TemplateShop/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('TemplateShop/assets/js/templatemo.js')}}"></script>
    <script src="{{asset('TemplateShop/assets/js/custom.js')}}"></script>
    <!-- End Script -->



    <!-- Start Slider Script -->
    @yield('view_card')
    @yield('jsCard')
    @yield('cart')

    <!-- End Slider Script -->
</body>

</html>