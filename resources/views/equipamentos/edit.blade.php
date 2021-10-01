@extends('main')
@section('content')
  <form method="POST" action="/equipamentos/{{ $equipamento->id }}">
    @csrf
    @method('patch')
      @include('equipamentos.form') 
  </form>
@endsection