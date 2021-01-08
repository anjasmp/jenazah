<!-- Vendor JS Files -->
<script src="{{ asset ('user/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset ('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset ('user/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset ('user/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset ('user/assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{ asset ('user/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset ('user/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset ('user/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset ('user/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{ asset ('user/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset ('user/assets/js/main.js')}}"></script>

   <!-- Core JavaScript
    ================================================== -->
    <script src="{{ asset('user/forest/js/jquery.min.js')}}"></script>
    <script src="{{ asset('user/forest/js/tether.min.js')}}"></script>
    <script src="{{ asset('user/forest/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('user/forest/js/custom.js')}}"></script>


    <script>
      $(function() {
  $('#WAButton').floatingWhatsApp({
    phone: '6285213274473', //WhatsApp Business phone number International format-
    //Get it with Toky at https://toky.co/en/features/whatsapp.
    headerTitle: 'WhatsApp Center', //Popup Title
    popupMessage: 'Assalamualaikum, ada yang bisa kami bantu?', //Popup Message
    showPopup: true, //Enables popup display
    buttonImage: '<img src="{{ asset('user/assets/img/wacenter.svg')}}" />', //Button Image
    //headerColor: 'crimson', //Custom header color
    //backgroundColor: 'crimson', //Custom background button color
    position: "left"
  });
});
    </script>
    <!--Jquery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!--Floating WhatsApp css-->
<link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
<!--Floating WhatsApp javascript-->
<script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>


@stack('scripts')


