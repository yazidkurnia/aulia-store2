@extends('index')

@section('title')
    {{ $page_title ?? 'Product View' }}
@endsection

@section('content')
    <!-- 2 -->
    <!-- Hero Section Begin -->
    @include('template.user.partial_hero')
    <!-- Hero Section End -->

    <!-- 3 -->
    <!-- Women Banner Section Begin -->
    <div class="container pb-3">
        <h3 class="py-3">Katalog</h3>
        <div class="row row-cols-1 row-cols-md-6">
            @if (!empty($data))
                @foreach ($data as $v)
                    <div class="col mb-4">
                        <div class="card h-100">
                            <img src="https://images.unsplash.com/photo-1618932260643-eee4a2f652a6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=480&q=80"
                                class="card-img-top img-fluid h-72" style="height: 200px" alt="...">
                            <div class="card-body w-100 d-flex flex-column">
                                <h5 class="card-title">Elegant Black Dress</h5>
                                <div class="mt-auto">
                                    @if (!Auth::user())
                                        <a href="{{ route('login') }}" class="btn btn-primary">+ Cart</a>
                                    @else
                                        <a href="{{ route('dashboard.product.detail', encrypt($v->id)) }}"
                                            class="btn btn-warning">+
                                            Cart</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col">
                    <p class="text-center">No products found.</p>
                </div>
            @endif
        </div>
    </div>
    <!-- Women Banner Section End -->

    <!-- 4 -->
    <!-- Instagram Section Begin -->
    @include('template.user.partial_instagram')
    <!-- Instagram Section End -->

    <!-- 5 -->
    <!-- Partner Logo Section Begin -->
    @include('template.user.partial_partner_logo')
    <!-- Partner Logo Section End -->

@endsection
