<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.0.0-alpha.1
* @link https://coreui.io
* Copyright (c) 2019 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>{{config('app.name')}}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('assets/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('assets/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('assets/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('assets/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('assets/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('assets/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('assets/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('assets/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ url('assets/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('assets/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ url('assets/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ url('css/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ url('css/flag-icon.min.css') }}" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <link href="{{ url('css/pace.min.css') }}" rel="stylesheet">
	<?php $user=Session::get('user'); ?>
	<link href="{{ url('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/libraryStyle.css') }}?v=0" rel="stylesheet">
    <link href="{{ asset('css/admin-custom.css') }}?v=0" rel="stylesheet">
    <link href="{{url('css/toastr.min.css')}}" rel="stylesheet">
	
    @yield('css')

    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
	@php $max_upload_size = '6000000' @endphp
    <script>
	  var $max_upload_size = '6000000';
	  var $max_upload_size_mb = '6';
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>

    <link href="{{ url('css/coreui-chartjs.css') }}" rel="stylesheet">
    <script src="{{ url('js/jquery.min.js') }}"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="//cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="{{url('js/toastr.min.js')}}"></script>

  </head>



  <body class="c-app" onLoad="load()" >
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    
   @include('layouts.menu')

    <div class="c-wrapper">
        @include('layouts.header')

        <div class="c-body">

            <main class="c-main">

                @yield('content') 

            </main>
        

        <footer class="c-footer">
            <!--<div><a href="#">Formee Express</a> &copy; 2020.</div>-->
            <div class="ml-auto"><a href="javascript:;">Formee Express</a> &copy; 2020.</div>
        </footer> 
        
        </div>
    </div>



    <!-- CoreUI and necessary plugins-->
    <script src="{{ url('js/pace.min.js') }}"></script> 
    <script src="{{ url('js/coreui.bundle.min.js') }}"></script>
    <script src="{{ url('js/coreui-utils.js') }}"></script>
    <script>
	
	   var url = '<?php echo $_SERVER['REQUEST_URI'] ?>';
	 
	    var mailurl = url.split("/",2); 
	     //alert(mailurl);
		if(mailurl == ",getStudentstarred" || mailurl == ",getStudentdraft" || mailurl == ",getStudentsent" || mailurl == ",getStudentoutbox" || mailurl == ",inboxreplymessage" || mailurl == ",inboxcreatemessage"){
		$('.showtab').addClass('c-show');	
		 }
		
	    var id = '<?php echo $user->id;  ?>';
	    var type = 'Admin';
	   
	 $.ajax({
		type:'get',
		url: 'get_inboxmail_notification/'+id+'/'+type,
		success:function(data)
		{
			//alert(data);
			var response = JSON.parse(data);
			//console.log(response.count);
			if(response.count >0) {
			$('.notificationcount').html(response.count)
			}
		}
		
	 });

       $(document).ready(function () {
           toastr.options = {
               "timeOut": 10000,
               "positionClass": 'toast-top-right'
           }

           @if(Session::has('success'))
             var msg = "{{ Session::get('success') }}";
             toastr.success(msg, 'Success');
           @endif

           @if(Session::has('failure'))
              var msg = "{{ Session::get('failure') }}";
              toastr.error(msg, 'Failed');
           @endif

           @if(Session::has('errors'))
              var validationError = '{{ config('app.messages.form_errors')  }}';
              toastr.error(validationError, 'Failed');
           @endif

           @if(Session::has('warning'))
              var msg = "{{ Session::get('warning') }}";
              toastr.warning(msg, 'Failed');
           @endif
       });

	</script>
    @yield('javascript')
  </body>
</html>
