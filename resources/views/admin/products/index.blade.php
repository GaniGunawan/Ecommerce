@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">ElectroStore</div>
                <div class="card-body">
                    <div style="margin-bottom:10px;">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-success">Tambah Data Barang</a>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif 
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="text-align:center;">No</th>
                                    <th style="text-align:center;">Nama</th>
                                    <th style="text-align:center;">Harga</th>
                                    <th style="text-align:center;">Tanggal</th>
                                    <th style="text-align:center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <th scope="row" style="text-align:center;">{{ $product['id'] }}</th>
                                    <td style="text-align:center;">{{ $product['name'] }}</td>
                                    <td style="text-align:center;">{{ $product['price'] }}</td>
                                    <td style="text-align:center;">{{ $product['created_at'] }}</td>
                                    <td style="text-align:center;">
                                        <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <a class="btn btn-primary" href="{{ route('admin.products.show',$product->id) }}">Detail</a>
                                            <a class="btn btn-warning" href="{{ route('admin.products.edit',$product->id) }}">Ubah</a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?');">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
