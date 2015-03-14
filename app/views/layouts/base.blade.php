<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @section('cabecera')

    @show

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    

   
    @section('intro')

    @show


    @section('contenido')


    @show


    @section('footer')

    @show

   

    <!-- Core JavaScript Files -->
    

    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/jquery.easing.min.js') }}
    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/jquery.scrollTo.js') }}
    {{ HTML::script('js/wow.min.js') }}
    {{ HTML::script('js/custom.js') }}


    @section('scripts')

    @show

</body>

</html>