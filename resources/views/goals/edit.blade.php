@extends('layouts.app')

@section('content')
<div class="container">
    @section('header')
        <h2 class="h5">Editar Meta</h2>
    @endsection

    <form method="POST" action="{{ route('goals.update', $goal->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Título</label>
        <input type="text" name="title" class="form-control mb-2" placeholder="Título" value="{{ old('title', $goal->title) }}">
        
        <label for="description">Descrição</label>
        <textarea name="description" class="form-control mb-2">{{ old('description', $goal->description) }}</textarea>

        <label for="due_date">Prazo</label>
        <input type="date" name="due_date" class="form-control mb-2" value="{{ old('due_date', $goal->due_date) }}">

        <label for="completed">Status</label>
        <select name="completed" class="form-control mb-2">
            <option value="0" {{ old('completed', $goal->completed) == 0 ? 'selected' : '' }}>Pendente</option>
            <option value="1" {{ old('completed', $goal->completed) == 1 ? 'selected' : '' }}>Concluída</option>
        </select>

        <button class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
