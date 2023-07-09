@extends('index')

@section('content')
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th class="p-name text-center">Product Name</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="cart-pic first-row">
                                                <img src="{{ asset('template/img/cart-page/product-1.jpg') }}" />
                                            </td>
                                            <td class="cart-title first-row text-center">
                                                <h5>Pure Pineapple</h5>
                                            </td>
                                            <td class="p-price first-row">$60.00</td>
                                            <td class="delete-item"><a href="#"><i class="material-icons">
                                                        close
                                                    </i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="cart-pic first-row">
                                                <img src="{{ asset('template/img/cart-page/product-1.jpg') }}" />
                                            </td>
                                            <td class="cart-title first-row text-center">
                                                <h5>Pure Pineapple</h5>
                                            </td>
                                            <td class="p-price first-row">$60.00</td>
                                            <td class="delete-item"><a href="#"><i class="material-icons">
                                                        close
                                                    </i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">ID Transaction <span>#SH12000</span></li>
                                    <li class="subtotal mt-3">Subtotal <span>$240.00</span></li>
                                    <li class="subtotal mt-3">Pajak <span>10%</span></li>
                                    <li class="subtotal mt-3">Total Biaya <span>$440.00</span></li>
                                    <li class="subtotal mt-3">Bank Transfer <span>Mandiri</span></li>
                                    <li class="subtotal mt-3">No. Rekening <span>2208 1996 1403</span></li>
                                    <li class="subtotal mt-3">Nama Penerima <span>Shayna</span></li>
                                </ul>
                                <a href="success.html" class="proceed-btn">I ALREADY PAID</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
