@extends('main')
@section('content')

<form method="get" action="/equipamentos">
  <div class="row">
    <div class=" col-sm input-group">
      <input type="text" class="form-control" name="busca" value="{{Request()->busca}}" placeholder="Busca por número IP ou descrição">  

      @inject('equipamento','App\Models\Equipamento')

      <select name="buscaatividade" class="form-control">
        <option value="" selected="">- Atividade do Equipamento -</option>
        @foreach($equipamento->getAtivo() as $key=>$atividade)

            <option value="{{$key}}" name="buscaatividade" 
              @if($key == Request()->buscaatividade) selected @endif
            >{{$atividade['name']}}</option>

        @endforeach
      </select>  

      <span class="input-group-btn">
        <button type="submit" class="btn btn-info"> Buscar </button>
      </span>
    </div>
  </div>
</form>

<hr>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Ip</th>
      <th scope="col">Descrição</th>
      <th scope="col">Atividade</th>
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
        <td>
        @if($equipamento->equipamentoativo)
          Ativo
        @else
          Inativo
        @endif
        </td>
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

{{ $equipamentos->links() }}

@endsection