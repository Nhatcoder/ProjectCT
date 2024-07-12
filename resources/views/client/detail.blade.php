@extends('client.layout.main')
@section('main')
    <h1>Chi tiết sản phẩm: {{ $product->name }}</h1>
    <div class="row">
        <div class="col-3 text-center">
            <div class="card" style="width: 18rem;">
                <img height="400px" src="{{ asset('storage/images/' . basename($product->image)) }}" class="card-img-top"
                    alt="{{ $product->name }}">
            </div>
        </div>

        <div class="col-9">
            <form action="{{ route('order') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">
                <input type="hidden" name="price" value="{{ $product->price }}">

                <h5 class="card-title">{{ $product->name }}</h5>
                <p>Mã sản phẩm: {{ $product->sku }}</p>
                <p class="card-text">Mô tả ngắn: {{ $product->short_description }}</p>
                <b class="text-danger">Giá: {{ number_format($product->price, 0, ',', '.') }}₫</b>
                <p class="card-text">Số lượng còn: {{ $product->quantity }}</p>

                <input class="form-control" type="number" min="1" name="quantity" value="1">

                <br>
                @if (Auth::guard('customer')->check())
                    <button type="submit" class="btn btn-success">Mua hàng</button>
                @else
                    <a href="{{ route('login') }}" class="btn btn-success">Mua hàng</a>
                @endif
            </form>

        </div>
    </div>
@endsection
