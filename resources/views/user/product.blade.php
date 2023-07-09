@extends('index')

@section('title')
    {{ $page_title }}
@endsection

@section('content')
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{ asset('template/img/mickey1.jpg') }}" alt="" />
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="{{ asset('template/img/mickey1.jpg') }}">
                                        <img src="{{ asset('template/img/mickey1.jpg') }}" alt="" />
                                    </div>

                                    <div class="pt" data-imgbigurl="{{ asset('template/img/mickey2.jpg') }}">
                                        <img src="{{ asset('template/img/mickey2.jpg') }}" alt="" />
                                    </div>

                                    <div class="pt" data-imgbigurl="{{ asset('template/img/mickey3.jpg') }}">
                                        <img src="{{ asset('template/img/mickey3.jpg') }}" alt="" />
                                    </div>

                                    <div class="pt" data-imgbigurl="{{ asset('template/img/mickey4.jpg') }}">
                                        <img src="{{ asset('template/img/mickey4.jpg') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $data->merk != null ? $data->merk : 'none' }}</span>
                                    <h3>{{ $data->productname != null ? $data->productname : 'none' }}</h3>
                                </div>
                                <div class="pd-desc">
                                    <p>

                                    </p>
                                    <h4>{{ $data->productdetail->prise != null ? $data->productdetail->prise : 'none' }}
                                    </h4>
                                </div>
                                <div class="quantity">
                                    <form action="" method="POST" id="cart-form">
                                        @csrf
                                        <input type="hidden" name="productid" id="productid"
                                            value="{{ encrypt($data->productdetail->product_id) }}">
                                        <button type="submit" name="btn-save-to-cart"
                                            class="primary-btn pd-cart border-0">Add To
                                            Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($related_product->isEmpty())
                    <div class="row">
                        <div class="col d-flex justify-content-center align-items-center center-message">
                            <center>
                                <span class="">No product found</span>
                            </center>
                        </div>
                    </div>
                @else
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ asset('template/img/products/women-1.jpg') }}" alt="" />
                                <ul>
                                    <li class="w-icon active">
                                        <a href="#"><i class="icon_bag_alt"></i></a>
                                    </li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Coat</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $14.00
                                    <span>$35.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->
@endsection

@push('js')
    <script>
        $('#cart-form').submit(function(e) {
            e.preventDefault();

            var data = $('#cart-form').serialize();
            var url = '{{ route('dashboard.add.to.cart') }}'
        });
    </script>
@endpush
