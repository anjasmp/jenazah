<!DOCTYPE html>
<html lang="en">

@include('user.partials.head')

<body>

  <!-- ======= Intro Section ======= -->
  @yield('intro')
  <!-- End Intro Section -->

  @yield('content')
  <!-- End #main -->

  <div id="WAButton" style="font-family: Arial, Helvetica, sans-serif;"></div>
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  @include('user.partials.scripts')

  {{-- <script src="//code.tidio.co/txn78439zclkxyo8jpn1xmd9a20cnbzy.js" async></script>
<!-- Swap your javascript code above -->

<!-- Chat live Tidio -->
<script>
   (function() {
    function onTidioChatApiReady() {
      (function() {
          window.tidioChatApi.open();
      })();
    }
    if (window.tidioChatApi) {
      window.tidioChatApi.on("ready", onTidioChatApiReady);
    } else {
      document.addEventListener("tidioChat-ready", onTidioChatApiReady);
    }
  })();
</script> --}}

</body>

</html>