<style>
button {
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline: none;
}
</style>

<div class="card">
  <div class="card-header"><b>Estagiários/as</b></div>
  <div class="card-body">

    @can('empresa')
        <a href="/estagios/create" class="btn btn-success"> Novo/a estagiário/a </a>
        <br>
    @endcan('empresa')
    <br>

    <table class="table table-striped">
    <thead>
        <tr>
        <th>Número USP</th>
        <th>Tipo</th>
        <th>Nome</th>
        <th>Período</th>
        <th>Status</th>
        @can('admin')<th>Deletar</th>@endcan 
        </tr>
    </thead>
    <tbody>
        @forelse($estagios->sortByDesc('created_at') as $estagio)
        <tr>

        <td>
          <a href ="/estagios/{{$estagio->id}}"> {{$estagio->numero_usp}}</a>
        <td>
            @if( empty($estagio->renovacao_parent_id) )
                Original
            @else
                Renovação 
            @endif
        </td>

        </td>

        <td>
        {{ $estagio->nome }}
        </td>

        <td>
        {{$estagio->data_inicial}} - {{$estagio->data_final}}

        </td>
        <td> {{$estagio->getStatus()[$estagio->status]['name'] }} </td>
        @can('admin')
        <td>
            <form  method="POST" action="/estagios/{{$estagio->id}}">         
                @csrf
                @method('delete')
                <button class="botao" type="submit" onclick="return confirm('Tem certeza que deseja deletar?');"><i class="fas fa-trash-alt"></i></button>
            </form>
            <div>
        </td>
        @endcan('admin')

        </tr>
        <div></div>
        @empty
            <td colspan="5">Sem estagiários/as no momento</td>
        @endforelse
    </tbody>
    </table>
<div></div>    