@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Productos con Stock Bajo</h2>

    @if($products->isEmpty())
        <p class="text-muted">No hay productos con stock bajo.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
