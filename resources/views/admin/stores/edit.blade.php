@extends('layouts.app')
<div class="container">
    <h1 class="text-center">ATUALIZAR LOJA</h1>
</div>


@section('content')
    <form action="{{ route('admin.stores.update', compact('store')) }}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="form-group">
    <label>Nome Loja</label>
    <input type="text" name="name" class="form-control" value="{{ $store->name }}">
</div>
<div class="form-group">
    <label>Descrição</label>
    <input type="text" name="description" class="form-control" value="{{ $store->description }}">
</div>
<div class="form-group">
    <label>Telefone</label>
    <input type="text" name="phone" class="form-control" value="{{ $store->phone }}">
</div>
<div class="form-group">
    <label>Celular</label>
    <input type="text" name="mobile_phone" class="form-control" value="{{ $store->mobile_phone }}">
</div>
    <div class="form-group">
        <p>
            <img src="{{ asset('storage/' . $store->logo) }}" alt="">
        </p>
        <label>Logotipo</label>
        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
        @error('logo') 
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
    </div>
<!-- <div class="form-group">
    <label>Slug</label>
    <input type="text" name="slug"  class="form-control" value="{{ $store->slug }}">
</div> -->

<div class="form-group">
    <button type="submit" class="btn btn-primary">ATUALIZAR LOJA</button>
</div>
</form>
@endsection
