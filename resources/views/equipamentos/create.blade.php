@extends('main')
@section('content')
  <form method="POST" action="/equipamentos">
    @csrf
    <div class="form-group">
      Ip: <input type="text" name="ip" value="{{old('ip', $equipamento->ip)}}">
    </div>

    <div class="form-group">
      Descrição: <input type="text" name="nome" value="{{old('nome', $equipamento->nome)}}">
    </div>  

    <div class="form-group">
      <label for="emails">Emails separados por vírgula:</label>
      <textarea class="form-control" id="emails" rows="3" name="emails">{{old('emails', $equipamento->emails)}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
@endsection