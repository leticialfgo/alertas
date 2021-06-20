@extends('main')
@section('content')


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Ip</th>
      <th scope="col">Descrição</th>
      <th scope="col">Data do Ping</th>
      <th scope="col">Ping Status</th>
      @can('admin') <th scope="col">Ações</th> @endcan
    </tr>
  </thead>
  <tbody>
  @forelse ($equipamentos as $equipamento)
    <tr>
        <td>{{ $equipamento->ip }}</td>
        <td>{{ $equipamento->nome }}</td>
        <td>Data</td>
        <td><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:red;"></i></td>
        @can('admin')
            <td>
            <form action="/equipamentos/{{ $equipamento->id }} " method="post">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Tem certeza?');"><i class="fas fa-trash-alt"></i></button> 
            </form>
            </td>
        @endcan
    </tr>
    @empty
        <tr>
            <td>Não há equipamentos cadastrados</td>
        </tr>
    @endforelse
  </tbody>
</table>

@endsection