<!-- Footer -->
<footer id="footer">
      <div class="container">
        <div class="row text-center">
          <p>Copyright &copy; BoostO 2017<a href="https://www.facebook.com/boosto/"><i class="fa fa-facebook-square fa-fw fa-2x"></i></a><a href="https://www.youtube.com/channel/UCcN4Xqc_9a5bhsfHRcX0QdQ"><i class="fa fa-youtube-play fa-fw fa-2x"></i></a>
          </p>
        </div>
      </div>
</footer>

<!--Scripts-->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/wow.js') }}"></script>
<script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('contactform/contactform.js') }}"></script>
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