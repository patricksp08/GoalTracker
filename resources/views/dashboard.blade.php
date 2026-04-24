@extends('layouts.app')

@section('content')
@section('header')
    <h2 class="h5">Dashboard</h2>
@endsection

<div class="container">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total</h5>
                    <h3>{{ $total }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Concluídas</h5>
                    <h3>{{ $concluidas }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5>Pendentes</h5>
                    <h3>{{ $pendentes }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="progress mb-4">
            <div class="progress-bar bg-success" style="width: {{ $percent }}%">
                {{ round($percent) }}%
            </div>
        </div>
    </div>
</div>
@endsection