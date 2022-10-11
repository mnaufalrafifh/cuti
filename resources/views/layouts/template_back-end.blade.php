<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="{{ asset('') }}back-end/img/favicon.png">

  <title>SI-CULI</title>

  <!-- Bootstrap CSS -->
  <link href="{{ asset('') }}back-end/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{ asset('') }}back-end/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{ asset('') }}back-end/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="{{ asset('') }}back-end/css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="{{ asset('') }}back-end/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="{{ asset('') }}back-end/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="{{ asset('') }}back-end/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="{{ asset('') }}back-end/css/owl.carousel.css" type="text/css">
  <link href="{{ asset('') }}back-end/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{ asset('') }}back-end/css/fullcalendar.css">
  <link href="{{ asset('') }}back-end/css/widgets.css" rel="stylesheet">
  <link href="{{ asset('') }}back-end/css/style.css" rel="stylesheet">
  <link href="{{ asset('') }}back-end/css/style-responsive.css" rel="stylesheet" />
  <link href="{{ asset('') }}back-end/css/xcharts.min.css" rel=" stylesheet">
  <link href="{{ asset('') }}back-end/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    @include('partials.navbar_back-end')
    @include('partials.sidebar_back-end')
    <!--main content start-->
    <section id="main-content">
        @yield('content')
      <div class="text-right">
        <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="{{ asset('') }}back-end/js/jquery.js"></script>
  <script src="{{ asset('') }}back-end/js/jquery-ui-1.10.4.min.js"></script>
  <script src="{{ asset('') }}back-end/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="{{ asset('') }}back-end/js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="{{ asset('') }}back-end/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="{{ asset('') }}back-end/js/jquery.scrollTo.min.js"></script>
  <script src="{{ asset('') }}back-end/js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="{{ asset('') }}back-end/assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="{{ asset('') }}back-end/js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="{{ asset('') }}back-end/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="{{ asset('') }}back-end/js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="{{ asset('') }}back-end/js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="{{ asset('') }}back-end/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="{{ asset('') }}back-end/js/calendar-custom.js"></script>
    <script src="{{ asset('') }}back-end/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="{{ asset('') }}back-end/js/jquery.customSelect.min.js"></script>
    <script src="{{ asset('') }}back-end/assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="{{ asset('') }}back-end/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="{{ asset('') }}back-end/js/sparkline-chart.js"></script>
    <script src="{{ asset('') }}back-end/js/easy-pie-chart.js"></script>
    <script src="{{ asset('') }}back-end/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ asset('') }}back-end/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('') }}back-end/js/xcharts.min.js"></script>
    <script src="{{ asset('') }}back-end/js/jquery.autosize.min.js"></script>
    <script src="{{ asset('') }}back-end/js/jquery.placeholder.min.js"></script>
    <script src="{{ asset('') }}back-end/js/gdp-data.js"></script>
    <script src="{{ asset('') }}back-end/js/morris.min.js"></script>
    <script src="{{ asset('') }}back-end/js/sparklines.js"></script>
    <script src="{{ asset('') }}back-end/js/charts.js"></script>
    <script src="{{ asset('') }}back-end/js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
