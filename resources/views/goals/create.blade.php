@extends('layouts.app')

@section('content')
<div class="container">
    @section('header')
        <h2 class="h5">Criar Meta</h2>
    @endsection

    <form method="POST" action="{{ route('goals.store') }}" enctype="multipart/form-data">
        @csrf

        <label for="title">Título</label>
        <input type="text" name="title" class="form-control mb-2" placeholder="Título">

        <label for="description">Descrição</label>
        <textarea name="description" class="form-control mb-2"></textarea>
        
        <label for="due_date">Prazo</label>
        <input type="date" name="due_date" class="form-control mb-2">

        <label for="completed">Status</label>
        <select name="completed" class="form-control mb-2">
            <option value="0">Pendente</option>
            <option value="1">Concluída</option>
        </select>

        <button class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
