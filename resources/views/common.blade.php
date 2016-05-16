<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>


    <link href="{{asset('public/css/materialize.min.css') }}" rel="stylesheet">
    @yield('header_scripts')
    <!--framework.css-->
    <link href="{!! asset('framework.css') !!}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        @yield('site_content')

    </div>
        <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{!! asset('common/js/vue.js') !!}"></script>
    <script src="{!! asset('admin/bower_components/jquery/dist/jquery.min.js') !!}"></script>
    <script src="{!! asset('public/js/materialize.min.js') !!}"></script>
    @yield('footer_scripts')
    @yield('indi_script')
    <script>
          $(".dropdown-button").dropdown();

          $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
          });

        $('.button-collapse').sideNav('show');
    </script>

    </body>

    </html>