@extends('client.layout.main')
@section('main')
    <h2>Tất cả sản phẩm</h2>

    <div class="row">
        @foreach ($products as $item)
            <div class="col-3 text-center ">
                <a class="text-decoration-none" href="{{ route('product.detail', $item->id) }}">
                    <div class="card " style="width: 18rem;">
                        <img height="400px" src="{{ asset('storage/images/' . basename($item->image)) }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <b class="text-danger">{{ number_format($item->price, 0, ',', '.') }}₫</b>
                            <p class="card-text">{{ $item->short_description }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
