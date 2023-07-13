@extends('index')

@section('title')
    {{ $page_title }}
@endsection

@section('custom-style')
    <style>
        .border-rounded-pill {
            border-radius: 12px;
        }
    </style>
@endsection

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
                                            <th>Ordered Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cartList as $v)
                                            <tr>
                                                <td class="cart-pic first-row">
                                                    <img src="{{ asset('assets/productimages/' . $v->filename) }}" />
                                                </td>
                                                <td class="cart-title first-row text-center">
                                                    <h5>{{ $v->productname == null ? '-' : $v->productname }}</h5>
                                                </td>
                                                <td class="p-price first-row">{{ $v->prise == null ? '-' : $v->prise }}</td>
                                                <td class="p-price first-row">
                                                    @if ($v->order_status == 1)
                                                        <span class="badge badge-success">Ordered</span>
                                                    @else
                                                        <span class="badge badge-danger">Unordered</span>
                                                    @endif
                                                </td>
                                                <td class="delete-item">
                                                    <button type="button" class="btn btn-warning dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <iconify-icon icon="ph:gear-six-duotone"></iconify-icon>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item item-status"
                                                            data-id="{{ encrypt($v->cart_id) }}"
                                                            data-status="{{ encrypt('1') }}" type="button">Order</a>
                                                        <a class="dropdown-item item-status"
                                                            data-id="{{ encrypt($v->cart_id) }}"
                                                            data-status="{{ encrypt('0') }}" type="button">Un Order</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="cart-pic first-row" rowspan="4">
                                                    <span>You dont have any product in your cart</span>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <h4 class="mb-4">
                                Informasi Pembeli:
                            </h4>
                            <div class="user-checkout">
                                <form>
                                    <div class="form-group">
                                        <label for="namaLengkap">Nama lengkap</label>
                                        <input type="text" class="form-control" id="namaLengkap"
                                            aria-describedby="namaHelp" placeholder="Masukan Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="namaLengkap">Email Address</label>
                                        <input type="email" class="form-control" id="emailAddress"
                                            aria-describedby="emailHelp" placeholder="Masukan Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="namaLengkap">No. HP</label>
                                        <input type="text" class="form-control" id="noHP"
                                            aria-describedby="noHPHelp" placeholder="Masukan No. HP">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamatLengkap">Alamat Lengkap</label>
                                        <textarea class="form-control" id="alamatLengkap" rows="3"></textarea>
                                    </div>
                                </form>
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

@push('js')
    <script type="text/javascript">
        $('.dropdown-toggle').dropdown();

        $(document).ready(function() {
            $('.item-status').click(function(e) {
                e.preventDefault();


                var id = $(this).data('id');
                var status = $(this).data('status');
                // console.log(status);

                $.ajax({
                    url: '/dashboard/update-cart-status-order',
                    method: 'POST',
                    data: {
                        id: id,
                        status: status,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data)
                    }
                });
            });
        });
    </script>
@endpush
