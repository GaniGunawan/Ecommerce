@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Ubah Produk</div>

                <div class="card-body">
                    <div class="col-md-10">
                        @if(count($errors))
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <form action="{{ route('admin.products.update',$product->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf @method('PATCH')
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Nama Produk" name="name" value={{ $product->name}}>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" class="form-control" placeholder="Harga Produk" name="price" value={{ $product->price}}>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea type="number" class="form-control" rows="3" name="description" id="description">{{ $product->description }}</textarea>
                            </div>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" multiple name="images[]" id="images">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                            </div>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#description'
        });
    </script>
@endsection
