<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Styles hack to fix broen datatables select pager dropdown -->
        <!-- // this hack needed for select dropbox box not to get squished -->
        <!-- and this commend can't be inside the <style>...</style> tags -->
        <!--
        <style>
            .dataTables_length select{
                width: 60px !important; 
            }
        </style>
        -->

        <!-- Scripts -->
        @routes




        <script src="{{ mix('js/app.js') }}" defer onError="alert('don\'t forget to turn on \'npm run hot\' :-D')"></script>
    </head>
    <body class="font-sans antialiased">

        @inertia



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">



<!-- JQuery must be defined first, because datatables depends on it. -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/1.10.24/dataRender/datetime.js"></script>


<!--
<script type="text/javascript">
//$(document).ready( function () {
//$(window).load( function () {
//    console.log('going to load a datatable...');
//    console.log(new Date());
//    $('#myTable').DataTable();
//    console.log('presumably we got a ref to the datatable...now what?');
//} );
</script>
-->

    </body>
</html>

