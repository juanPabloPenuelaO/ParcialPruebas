@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Actualizar Stock</h2>

        <form action="{{ route('movimientos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="product_id">Producto</label>
                <select name="product_id" class="form-control" required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} (Stock: {{ $product->stock }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="type">Tipo de Movimiento</label>
                <select name="type" class="form-control" required>
                    <option value="entrada">Entrada</option>
                    <option value="salida">Salida</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity">Cantidad</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
@endsection