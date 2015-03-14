
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->

    {{ HTML::style('css/bootstrap.min.css') }}
   

    <!-- Custom styles for this template -->
    {{ HTML::style('css/jumbotron.css') }}

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    {{ HTML::script('js/ie-emulation-modes-warning_jumbotron.js') }}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @section('cabecera')

    @show



  </head>

  <body>

    
    @section('intro')

    @show


    @section('contenido')

    @show


    @section('footer')

    @show



    <!-- Bootstrap core JavaScript
    ================================================== -->

    {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/ie10-viewport-bug-workaround.js_jumbotron') }}
    
  </body>
</html>