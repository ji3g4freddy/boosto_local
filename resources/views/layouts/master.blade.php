<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BoostO音樂共享平台| @yield('title')</title>
	<meta name="description" content="BoostO致力於創造一個「無阻力的音樂環境」。透過一個音樂人共享的平台，分享資源與能力，讓玩音樂更容易">
    <meta name="keywords" content="音樂、錄音、錄音室、音樂比賽">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.bxslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}"></link>

    <!--360 photo-->
    <link rel="stylesheet" href="https://cdn.pannellum.org/2.2/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.pannellum.org/2.2/pannellum.js"></script>

    <!-- WhatsHelp.io widget -->
    <script type="text/javascript">
    (function () {
        var options = {
            facebook: "http://m.me/boosto", // Facebook page ID
            company_logo_url: "//static.whatshelp.io/img/flag.png", // URL of company logo (png, jpg, gif)
            greeting_message: "Hello, how may we help you? Just send us a message now to get assistance.", // Text of greeting message
            call_to_action: "Message us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
    </script>
    <!-- /WhatsHelp.io widget -->
    <style>
    #panorama {
        width: 330px;
        height: 230px;
        margin-left:auto; 
        margin-right:auto;
    }
    table{

        margin-left:auto; 
        margin-right:auto;
    }

    p{
        font-size: 18px;
        white-space:pre-wrap;
    }

    .pnlm-title-box {
    position: relative;
    font-size: 40px;
    display: table;
    padding-left: 5px;
    margin-bottom: 3px;
    
    }
    @media (min-width: 768px) {
        #panorama {
        width: 1000px;
        height: 500px;
    }
    }

  }
    </style>

   </head>
	<body>
    <div class="loader"></div> 
    <div id="myDiv">
	@include('layouts.partials2.navbar')
	@yield('content')
	@include('layouts.partials2.footer')
    </div>
	</body>
</html>