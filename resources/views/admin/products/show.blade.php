@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Detail Produk</div>

                <div class="card-body">
                    <table class="table text-semibold">
                        <tbody>
                            <tr>
                                <td class="col-xs-2">Nama Produk</td>
                                <td class="col-xs-2">{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-2">Harga Produk</td>
                                <td class="col-xs-2">{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <td class="col-xs-2">Deskripsi</td>
                                <td class="col-xs-2">{{ $product->description }}</td>
                            </tr>
                            @if(!$product->images()->get()->isEmpty())
                            <tr>
                                <td class="col-xs-2">Gambar Produk</td>
                                @foreach($product->images()->get() as $image)
                                <td class="col-xs-2">
                                    <image src="{{ asset('/images/'.$image->image_src) }}" class="img-thumbnail img-fluid" alt="{{ $image->image_desc }}" style="width:200px;height:200px;"></image>
                                </td>
                                @endforeach
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="form-group" style="margin-top:40px">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    tinymce.init({
        selector: '#'
    });

</script>
@endsection
