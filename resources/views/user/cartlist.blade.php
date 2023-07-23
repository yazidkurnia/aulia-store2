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
                                <div class="card-body bg-light" style="border-radius: 24px;">
                                    <h3 class="px-1 py-1">Your Cart</h3>
                                    <table class="table table-responsive px-3 py-3 rounded">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th class="p-name text-center">Product Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Ordered Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form id="form-cart">
                                        @csrf
                                        <input type="hidden" id="total-data" name="csrf" value="{{ csrf_token() }}">
                                        @forelse ($cartList as $v)
                                            <!-- <input type="text" value="{{ $loop->iteration }}" id="iteration"> -->
                                            <tr>
                                                <td class="cart-pic first-row">
                                                    <img src="{{ asset('assets/productimages/' . $v->filename) }}" />
                                                </td>
                                                <td class="cart-title first-row text-center">
                                                    <h5>{{ $v->productname == null ? '-' : $v->productname }}</h5>
                                                </td>
                                                <td class="p-price first-row">{{ $v->subtotal == null ? '-' : $v->subtotal }}</td>
                                                <td> 
                                                    <div class="row">
                                                        <div class="col-lg-4 px-0 mx-0">
                                                            <button type="button" class="btn btn-primary btn-sm btn-add" data-item-id="{{ $v->cart_id }}" data-item-price = "{{ $v->price }}" onclick="qty_add('{{ $v->cart_id }}', 'add')">
                                                                +
                                                            </button>

                                                        </div>
                                                        <div class="col-lg-4 px-0 mx-0">
                                                            <input id="qty_input_{{ $v->cart_id }}" name="qty_input_{{ $v->cart_id }}" class="form-control form-control-sm qty-input" value="{{ $v->totalqty }}" type="number" placeholder="">
                                                        </div>
                                                        <div class="col-lg-4 px-0 mx-0">
                                                            <button type="button" class="btn btn-danger btn-sm btn-min" data-item-id="{{ $v->cart_id }}" data-item-price = "{{ $v->price }}" onclick="qty_min('{{ $v->cart_id }}')">-</button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-price first-row order-status">
                                                    @if ($v->order_status == 1)
                                                        <span class="badge badge-success order-status">Ordered</span>
                                                    @else
                                                        <span class="badge badge-danger order-status">Unordered</span>
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
                                                            data-status="1" type="button">Order</a>
                                                        <a class="dropdown-item item-status"
                                                            data-id="{{ encrypt($v->cart_id) }}"
                                                            data-status="0" type="button">Un Order</a>
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
                                        </form>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 bg-light" style="border-radius: 24px;">
                    <div class="row py-3">
                        <div class="col-lg-12">
                            <div class="proceed-checkout">
                                
                                    <form id='form-bill'>
                                        @csrf
                                        <div class="form-group">
                                            <label for="transaction-code">ID Transaksi</label>
                                            <input type="text" class="form-control" id="transaction-code" value="{{ '#CHK' . strtoupper(Str::random(8)) }}" name="transaction_code" readonly>
                                        </div> 
                                        <div class="form-group">
                                            <label for="tax">Pajak</label>
                                            <input type="text" class="form-control" id="tax" value="{{ '10%' }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="total-biaya">Total Biaya</label>
                                            <input type="text" class="form-control" id="total-biaya" name="total_biaya" value="" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="total-biaya">Total Barang</label>
                                            <input type="text" class="form-control" id="total-biaya" name="total_item" value="" readonly>
                                        </div>   
                                        <div class="form-group">
                                            <label for="bank">Bank Transfer</label>
                                            <input type="text" class="form-control"  id="bank" value="Mandiri" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="rekening">No. Rekening</label>
                                            <input type="text" class="form-control" id="rekening" name="rekening" value="{{ '2208 1996 1403' }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="penerima">Nama Penerima</label>
                                            <input type="text" class="form-control" id="penerima" name="penerima" value="{{ 'Shayna' }}" readonly>
                                        </div>   
                                        <div class="form-group">
                                            <button type="button" onclick="doCheckout()" class="proceed-btn btn btn-md rounded" style="width: 100%">I ALREADY PAID</button>
                                        </div>      
                                    </form>
                                    <button class="btn btn-primary" style="width: 100%; height: 50px;">
                                    Or Pay Here</button>
                                <!-- <a href="success.html" class="proceed-btn">I ALREADY PAID</a> -->
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

        function qty_add(id)
        {
            var itemId = id;

            var inputQuantity = $('#qty_input_' + id);
            var cartId        = $(this).data('item-id');
            var currentValue  = parseInt(inputQuantity.val());
            var token         = $('input[name="csrf"]').val();

            var qty = inputQuantity.val(currentValue + 1);
            getQty = qty.val();
            console.log(getQty);

            $.ajax({
                url: '/dashboard/add-qty-cart',
                method: 'POST',
                data: {
                    _token:token,
                    id:id,
                    qty:getQty
                },
                success: function(result)
                {
                    console.log(result);
                }, error: function(xhr, textStatus, errorThrown)
                {
                    console.log($(this).data('item-id'));
                }
            });
            // console.log($(this).data('item-id');
        }

        function qty_min(id)
        {
            var itemId = id;
            var inputQuantity = $('#qty_input_' + id);
            var currentValue = parseInt(inputQuantity.val());
            var token         = $('input[name="csrf"]').val();
                if (currentValue > 0) 
                {
                    inputQuantity.val(currentValue - 1);
                }

            $.ajax({
                url: '/dashboard/add-qty-cart',
                method: 'POST',
                data: {
                    _token:token,
                    id:id,
                    qty:getQty
                },
                success: function(result)
                {
                    console.log(result);
                }, error: function(xhr, textStatus, errorThrown)
                {
                    console.log($(this).data('item-id'));
                }
            });
        }

        function calculateTotal() {
            var iteration = parseInt($('#total-data').val());
            console.log(iteration);
            var arrayId = [];
            for (var i = 0; i < iteration; i++) {
                var id = $('#qty_input_' + i).val();
                arrayId.push({ 'id': id });
            }
            console.log(arrayId);
        }

        function getBill()
        {
            var token = $('input[name="csrf"]').val();
            var totalItem = $('input[name="total_item"]');
        
            $.ajax({
                url: '/dashboard/get-user-bill',
                method: 'POST',
                data: {
                    _token: token,
                    id: {!! Auth::user()->id !!}
                }, success: function (result) {
                    if (result.data.subtotal)
                    {
                        $('#total-biaya').val('Rp. ' + result.data.subtotal);
                        totalItem.val(result.data.totalqty);
                    }else{
                        $('#total-biaya').val('Rp. ' + 0);
                    }
                    console.log(result);
                }, error: function(xhr, textStatus, errorThrown)
                {
                    console.log($(this).data('item-id'));
                }
            });
        }

        function doCheckout()
        {
            $.ajax({
                url: '/dashboard/user/checkout',
                method: 'POST',
                data: $('#form-bill').serialize(),
                success: function(data){
                    console.log(data);
                }, error: function(xhr, textStatus, errorThrown)
                {
                    console.log(textStatus);
                }
            });
        }

        $(document).ready(function() {
            // NOTE:: use to update status order
            $('.item-status').click(function(e) {
                e.preventDefault();

                var id = $(this).data('id');
                var status = $(this).data('status');
                var row = $(this).closest('tr'); // Get the closest <tr> element
                var orderStatusElement = row.find('.order-status span'); // Find the element with the class 'order-status'
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
                        if (data.status_code == 200) {
                            console.log(data);
                            if (status == 1) {
                                orderStatusElement.removeClass('badge-danger').addClass('badge-success').text('Ordered');
                            } else {
                                orderStatusElement.removeClass('badge-success').addClass('badge-danger').text('Unordered');
                            }
                            toastr.success("Order Status has been change");
                            console.log(data.status_code);
                        } else {
                            toastr.error('Error! item will unorder');
                            console.log(data.status_code);
                        }
                        console.log(data)
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        toastr.error('An error occurred while making the request');
                    }
                });
            });

            setInterval(getBill(), 5000);
            calculateTotal();
        });
    </script>
@endpush
