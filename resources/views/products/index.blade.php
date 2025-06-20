<h1>Productos</h1>
<form method="GET" action="">
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <button>Filtrar</button>
</form>

<table>
@foreach ($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->stock }}</td>
    </tr>
@endforeach
</table>