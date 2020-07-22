@extends('layouts.app')

@section('content')
@if(!$store)
<a href="{{ route('admin.stores.create') }}" class="btn btn-lg btn-success">CRIAR LOJA</a>
@else
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>LOJA</th>
            <th>TOTAL DE PRODUTOS</th>
            <th>AÇÕES</th>
        </tr>
    </thead>
    <tbody>

            <tr>
                <td>{{ $store->id }}</td>
                <td>{{ $store->name }}</td>
                <td>{{ $store->products->count() }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('admin.stores.edit', compact('store')) }}" class="btn btn-sm btn-warning">EDITAR</a>
                        <form action="{{ route('admin.stores.destroy', compact('store')) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                         </form>
                    </div>
                </td>
            </tr>

    </tbody>
</table>
@endif

@endsection
