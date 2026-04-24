@extends('layouts.app')

@section('content')
<div class="container">
    @section('header')
        <h2 class="h5">Minhas Metas</h2>
    @endsection

    <a href="{{ route('goals.create') }}" class="btn btn-primary mb-3">Nova Meta</a>

    <table id="goals-table" class="table table-bordered table-striped table-sm">
        <thead>
            <tr>
                <th>Título</th>
                <th>Prazo</th>
                <th>Status</th>
                <th>Concluir meta</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach($goals as $goal)
            <tr>
                <td>{{ $goal->title }}</td>
                <td>{{ $goal->due_date }}</td>
                <td>
                    @if($goal->completed)
                        <span class="badge bg-success">Concluída</span>
                    @elseif (!$goal->completed && $goal->due_date < now())
                        <span class="badge bg-danger">Atrasada</span>
                    @else
                        <span class="badge bg-warning">Pendente</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('goals.update', $goal->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="title" value="{{ $goal->title }}">
                        <input type="hidden" name="completed" value="{{ $goal->completed ? 0 : 1 }}">

                        <button class="btn btn-success btn-sm" type="submit">
                            {{ $goal->completed ? 'Reabrir' : 'Concluir' }}
                        </button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('goals.edit', $goal->id) }}" class="btn btn-warning btn-sm">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#goals-table').DataTable();
    });
</script>
@endpush
@endsection