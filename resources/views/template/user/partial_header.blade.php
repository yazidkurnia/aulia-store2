<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Shayna Template" />
    <meta name="keywords" content="Shayna, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Aulia | @yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <!-- Css Styles -->
    @yield('custom-style')
    <style>
        .profile-border-rounded {
            border-radius: 50%;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('template/css/themify-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('template/css/elegant-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('template/css/nice-select.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('template/css/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('template/css/slicknav.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}" type="text/css" />

    <script type="text/javascript">
        // NOTE:: logout scrypt
        document.addEventListener('DOMContentLoaded', function() {
            var logoutLink = document.getElementById('logout-link');

            logoutLink.addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('logout-form').submit();
            });
        });
    </script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- 1 -->
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 mx-0 px-3 d-flex justify-content-end">
                        <div class="">
                            <div class="mail-service">
                                @if (Auth::user())
                                    <div class="button-group mx-5 px-5 py-2" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <div class="row d-flex d-block rounded-full justify-content-center">
                                            <span class="mt-2">{{ Auth::user()->name }}</span>
                                            <img src="{{ asset('assets/productimages/myprofile.jpeg') }}"
                                                class="rounded-full profile-border-rounded ml-2" width="42px"
                                                height="42px" alt="" srcset="">
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <a href="#">My Profile</a>
                                                    <form action="{{ route('logout') }}" method="post"
                                                        id='logout-form'>
                                                        @csrf
                                                        <button id='logout-link' type="submit">Logout</>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <a class="btn btn-warning my-2" href="{{ url('/login') }}">Login</a>
                                    <a class="btn btn-secondary my-2" href="{{ url('/register') }}">Registerasi</a>
                                @endif
                                <!--- NOTE:: Ubah menjadi katalog setelah login --->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="{{ asset('template/img/logo_website_shayna.png') }}" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7"></div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                Keranjang Belanja &nbsp;
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>3</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @if (Auth::user())
                                                    @forelse ($activeCart as $v)
                                                        <tr>
                                                            <td class="si-pic">
                                                                <img src="{{ asset('template/img/select-product-1.jpg') }}"
                                                                    alt="" />
                                                            </td>
                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    <p>$60.00 x 1</p>
                                                                    <h6>Kabino Bedside Table</h6>
                                                                </div>
                                                            </td>
                                                            <td class="si-close">
                                                                <i class="ti-close"></i>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <span>No cart found</span>
                                                    @endforelse
                                                @else
                                                    <span>No data found</span>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    @if (Auth::user())
                                        <div class="select-total">
                                            <span>total:</span>
                                            <h5>$120.00</h5>
                                        </div>
                                        <div class="select-button">
                                            <a href="{{ route('dashboard.user.cart.list') }}"
                                                class="primary-btn view-card">VIEW
                                                CARD</a>
                                            <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                        </div>
                                    @else
                                        <div class="container">
                                            <span>-</span>
                                        </div>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
