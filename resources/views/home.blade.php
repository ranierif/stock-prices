@extends('layouts.default')
@section('title')
{{$title}}
@parent
@stop

@section('content')

    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid">
            <h1 class="display-5 fw-bold text-center">Consulta de Preço de Ações</h1>
            <p class="col-md-12 fs-4 text-center">Busque no formulário abaixo o símbolo da ação que você deseja buscar mais informações.</p>
        </div>
    </div>

    @livewire('show-stock-price')

@endsection
