@extends('layouts.app')

@section('content')
<div class="container">

    @section('header')
        <h2 class="h5">Editar Perfil</h2>
    @endsection

    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nome --}}
        <label for="name">Nome</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control mb-2">

        {{-- Email --}}
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control mb-2">

        {{-- Senha --}}
        <label for="password">Nova Senha</label>
        <input type="password" name="password" placeholder="Nova senha (opcional)" class="form-control mb-3">

        {{-- FOTO + PREVIEW --}}
        <div class="row align-items-center mb-3">

            {{-- Input --}}
            <div class="col-md-6">
                <label class="form-label">Imagem de Perfil</label>
                <input type="file" name="photo" id="photo" class="form-control">
                <small class="text-muted">Selecione uma nova imagem para alterar</small>
            </div>

            {{-- Preview --}}
            <div class="col-md-6 text-center">
                <div class="border rounded d-flex align-items-center justify-content-center"
                     style="width:150px; height:150px;">

                    <img id="preview"
                         src="{{ $user->photo ? asset('storage/' . $user->photo) : '' }}"
                         style="{{ $user->photo ? '' : 'display:none;' }} max-width:100%; max-height:100%; border-radius:8px;">

                    <div id="no-image" class="text-muted text-center"
                         style="{{ $user->photo ? 'display:none;' : '' }}">
                        Nenhuma imagem selecionada
                    </div>

                </div>
            </div>

        </div>

        <button class="btn btn-success" type="submit">Atualizar</button>

        <hr>
    </form>

    <div class="card border-danger mt-4">
        <div class="card-body">

            <h5 class="text-danger mb-2">Zona de Perigo</h5>

            <p class="text-muted mb-3">
                Ao excluir sua conta, todos os seus dados serão permanentemente removidos.
                Esta ação não pode ser desfeita.
            </p>

            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger"
                        onclick="return confirm('Tem certeza absoluta que deseja excluir sua conta?')">
                    🗑️ Excluir Conta
                </button>
            </form>

        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('photo');
    const preview = document.getElementById('preview');
    const placeholder = document.getElementById('no-image');

    if (input) {
        input.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    placeholder.style.display = 'none';
                }

                reader.readAsDataURL(file);
            }
        });
    }
});
</script>
@endpush