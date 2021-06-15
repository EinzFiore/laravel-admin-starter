<!-- latest jquery-->
<script src="{{ asset('js/app.js') }}"></script>
<script src="<?= url('assets/js/jquery-3.5.1.min.js') ?>"></script>
<script src="<?= url('assets/js/jquery-3.5.1.min.js') ?>"></script>
<!-- Bootstrap js-->
<script src="<?= url('assets/js/bootstrap/popper.min.js') ?>"></script>
<script src="<?= url('assets/js/bootstrap/bootstrap.js') ?>"></script>
<!-- feather icon js-->
<script src="<?= url('assets/js/icons/feather-icon/feather.min.js') ?>"></script>
<script src="<?= url('assets/js/icons/feather-icon/feather-icon.js') ?>"></script>
<!-- Sidebar jquery-->
<script src="<?= url('assets/js/config.js') ?>"></script>
<!-- Plugins JS start-->
<script src="<?= url('assets/js/sidebar-menu.js') ?>"></script>
<script src="<?= url('assets/js/chart/chartist/chartist.js') ?>"></script>
<script src="<?= url('assets/js/chart/chartist/chartist-plugin-tooltip.js') ?>"></script>
<script src="<?= url('assets/js/chart/apex-chart/apex-chart.js') ?>"></script>
<script src="<?= url('assets/js/chart/apex-chart/stock-prices.js') ?>"></script>
<script src="<?= url('assets/js/prism/prism.min.js') ?>"></script>
<script src="<?= url('assets/js/clipboard/clipboard.min.js') ?>"></script>
<script src="<?= url('assets/js/counter/jquery.waypoints.min.js') ?>"></script>
<script src="<?= url('assets/js/counter/jquery.counterup.min.js') ?>"></script>
<script src="<?= url('assets/js/counter/counter-custom.js') ?>"></script>
<script src="<?= url('assets/js/custom-card/custom-card.js') ?>"></script>
<script src="<?= url('assets/js/owlcarousel/owl.carousel.js') ?>"></script>
<script src="<?= url('assets/js/dashboard/dashboard_2.js') ?>"></script>
<script src="<?= url('assets/js/tooltip-init.js') ?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?= url('assets/js/datatable/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= url('assets/js/datatable/datatables/datatable.custom.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="<?= url('assets/js/script.js') ?>"></script>
<script src="<?= url('assets/js/theme-customizer/customizer.js') ?>"></script>
<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw&amp;callback=initMap"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- login js-->
<!-- Plugin used-->
{{-- others --}}
<script>
  var map;
  function initMap() {
    map = new google.maps.Map(
      document.getElementById('map'),
      {center: new google.maps.LatLng(-33.91700, 151.233), zoom: 18});
  
    var iconBase =
      'assets/images/dashboard-2/';
  
    var icons = {
      userbig: {
        icon: iconBase + '1.png'
      },
      library: {
        icon: iconBase + '3.png'
      },
      info: {
        icon: iconBase + '2.png'
      }
    };
  
    var features = [
      {
        position: new google.maps.LatLng(-33.91752, 151.23270),
        type: 'info'
      }, {
        position: new google.maps.LatLng(-33.91700, 151.23280),
        type: 'userbig'
      },  {
        position: new google.maps.LatLng(-33.91727341958453, 151.23348314155578),
        type: 'library'
      }
    ];
  
    // Create markers.
    for (var i = 0; i < features.length; i++) {
      var marker = new google.maps.Marker({
        position: features[i].position,
        icon: icons[features[i].type].icon,
        map: map
      });
    };
  }
</script>
<script>
  (function() {
  'use strict';
  window.addEventListener('load', function() {
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.getElementsByClassName('needs-validation');
  // Loop over them and prevent submission
  var validation = Array.prototype.filter.call(forms, function(form) {
  form.addEventListener('submit', function(event) {
  if (form.checkValidity() === false) {
  event.preventDefault();
  event.stopPropagation();
  }
  form.classList.add('was-validated');
  }, false);
  });
  }, false);
  })();
  
</script>
<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>
<script>
  document.getElementById("logout").onclick = function() {
    document.getElementById("logoutForm").submit();
}
</script>
@stack('script.custom')