@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($products as $idx => $product)
        @if ($idx == 0 || $idx % 4 == 0)
            <div class="row mt-4">
        @endif

        <div class="col">
           <div class="card">
           @if(!$product->images()->get()->isEmpty())
                @foreach($product->images()->get() as $idx2 => $image)
                @if($idx2 == 0)
                <img src="{{ asset('/images/'.$image->image_src) }}" class="card-img-top" alt="..." style="height:30%;width:30%">
                @endif
                @endforeach
                @endif
                <div class="card-body">
                   <h5 class="card-title">
                      <a href="{{ route('products.show', ['id' => $product['id']]) }}">
                        {{ $product->name }}
                      </a>
                    </h5>
                    <p class="card-text">
                        {{ $product->price }}
                    </p>
                    <a href="{{ route('carts.add', ['id' => $product['id']]) }}" class="btn btn-primary">Beli</a>
                </div>
            </div>
        </div>

        @if ($idx > 0 && $idx % 4 == 3)
            </div>
        @endif
    @endforeach
</div>
@endsection
