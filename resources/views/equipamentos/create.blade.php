@extends('main')
@section('content')
  <form method="POST" action="/equipamentos">
    @csrf
    Ip: <input type="text" name="ip" value="{{old('ip', $equipamento->ip)}}">
    Descrição: <input type="text" name="nome" value="{{old('nome', $equipamento->nome)}}">
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
@endsection