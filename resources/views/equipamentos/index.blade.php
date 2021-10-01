@extends('main')
@section('content')


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Ip</th>
      <th scope="col">Descrição</th>
      <th scope="col">Data do Ping</th>
      <th scope="col">Ping Status</th>
      @can('admin') 
        <th scope="col">Emails</th>
        <th scope="col">Ações</th> 
      @endcan
    </tr>
  </thead>
  <tbody>
  @forelse ($equipamentos as $equipamento)
    <tr>
        <td>{{ $equipamento->ip }}</td>
        <td>{{ $equipamento->nome }}</td>
        <td>{{ $equipamento->ping_date }}</td>
        <td>
        @if($equipamento->ping_status == 'Up')
            <i class="fas fa-check-circle" style="color:green;"></i>
        @else
            <i class="fa fa-exclamation-triangle" style="color:red;"></i>
        @endif
        
        </td>
        @can('admin')
            <td>{{ $equipamento->emails }}</td>
            <td>
            <form action="/equipamentos/{{ $equipamento->id }} " method="post">
                @csrf
                @method('delete')
                <a href="/equipamentos/{{ $equipamento->id }}/edit"><i class="fas fa-edit"></i></a>
                <button type="submit" onclick="return confirm('Tem certeza?');" style="color: DodgerBlue;background-color: Transparent; border: none;cursor:pointer;overflow: hidden;outline:none;">
                <i class="fas fa-trash-alt"></i></button> 
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