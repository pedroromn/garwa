@extends('layouts.base')

@section('cabecera')
    <title>Inicio</title>

    <!-- Bootstrap Core CSS -->


    <!-- Fonts -->


    <!-- Squad theme CSS -->



    {{ HTML::style('css/bootstrap.min.css') }}

    {{ HTML::style('font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('css/animate.css') }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('color/default.css') }}




@stop


@section('intro')

<!-- Preloader -->
    <div id="preloader">
      <div id="load"></div>
    </div>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">


            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
                    <h1>GARWA</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
              <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('login') }}">Login</a></li>
                <li><a href="{{ URL::to('registro') }}">Registro</a></li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <section id="intro" class="intro">

        <div class="slogan">
            <h2>BIENVENIDO A <span class="text_color">GARWA</span></h2>
            <h4>AMBIENTE VIRTUAL ADAPTATIVO SOBRE TURISMO CULTURAL E HISTÓRICO EN SANTA MARTA</h4>
        </div>
        {{-- <div class="page-scroll">
            <a href="#" class="btn btn-circle">
                <i class="fa fa-angle-double-down animated"></i>
            </a>
        </div> --}}
    </section>

@stop






@section('contenido')


@stop








@section('footer')



@stop
