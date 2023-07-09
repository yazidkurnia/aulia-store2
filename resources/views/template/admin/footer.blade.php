    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights
                            reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jquery
  ============================================ -->
<script src="{{ asset('template/admin/js/vendor/jquery-1.12.4.min.js') }}"></script>
<!-- bootstrap JS
  ============================================ -->
<script src="{{ asset('template/admin/js/bootstrap.min.js') }}"></script>
<!-- wow JS
  ============================================ -->
<script src="{{ asset('template/admin/js/wow.min.js') }}"></script>
<!-- price-slider JS
  ============================================ -->
<script src="{{ asset('template/admin/js/jquery-price-slider.js') }}"></script>
<!-- meanmenu JS
  ============================================ -->
<script src="{{ asset('template/admin/js/jquery.meanmenu.js') }}"></script>
<!-- owl.carousel JS
  ============================================ -->
<script src="{{ asset('template/admin/js/owl.carousel.min.js') }}"></script>
<!-- sticky JS
  ============================================ -->
<script src="{{ asset('template/admin/js/jquery.sticky.js') }}"></script>
<!-- scrollUp JS
  ============================================ -->
<script src="{{ asset('template/admin/js/jquery.scrollUp.min.js') }}"></script>
<!-- mCustomScrollbar JS
  ============================================ -->
<script src="{{ asset('template/admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('template/admin/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
<!-- metisMenu JS
  ============================================ -->
<script src="{{ asset('template/admin/js/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('template/admin/js/metisMenu/metisMenu-active.js') }}"></script>
<!-- sparkline JS
  ============================================ -->
<script src="{{ asset('template/admin/js/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('template/admin/js/sparkline/jquery.charts-sparkline.js') }}"></script>
<!-- calendar JS
  ============================================ -->
<script src="{{ asset('template/admin/js/calendar/moment.min.js') }}"></script>
<script src="{{ asset('template/admin/js/calendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('template/admin/js/calendar/fullcalendar-active.js') }}"></script>
<!-- float JS
  ============================================ -->
<script src="{{ asset('template/admin/js/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('template/admin/js/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('template/admin/js/flot/curvedLines.js') }}"></script>
<script src="{{ asset('template/admin/js/flot/flot-active.js') }}"></script>
<!-- plugins JS
  ============================================ -->
<script src="{{ asset('template/admin/js/plugins.js') }}"></script>
<!-- main JS
  ============================================ -->
<script src="{{ asset('template/admin/js/main.js') }}"></script>
  
<!-- NOTE:: for spesificly page -->
  @yield('js')
     
<!-- NOTE:: general js -->
  @section('js')

  @endsection
</body>

</html>