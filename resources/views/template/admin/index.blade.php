@include('template/admin/header')

@include('template.admin.sidebar')
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.html">
                        <img class="main-logo" src="{{ asset('template/admin/img/logo/logo.png') }}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    @include('template.admin.nav')
    <div class="product-sales-area mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-sales-chart">
                        <div class="portlet-title">
                            <div class="row">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('js')

    <!-- NOTE:: for general line -->
    @section('js')
      <script type="text/javascript">
          // NOTE:: logout scrypt
          $(document).ready(function() {
            $('#logout-link').click(function(event) {
                event.preventDefault();
                $('#logout-form').submit();
              });
          });
      </script>
    @endsection
@include('template.admin.footer')
