@extends('layouts.app')

@section('content')
<a href="{{ route('admin.products.create') }}" class="btn btn-lg btn-success">CRIAR PRODUTO</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>NOME</th>
            <th>PREÇO</th>
            <th>LOJA</th>
            <th>CRIADO EM</th>
            <th>AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->store->name }}</td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <div class="btn-group">
                    <a href="{{ route('admin.products.edit', compact('product')) }}" class="btn btn-sm btn-warning">EDITAR</a>
                    <form action="{{ route('admin.products.destroy', compact('product')) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                    </form>
                    <div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links()}} //menu paginate

@endsection
