@extends('layouts.admin')

	@section('area-principal')
<br>
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li  class="breadcrumb-item">
                <a href="{{route('admin.comdica')}}">Home</a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                    Resoluções
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
                Resoluções
            </h1>
        </div>
        <div class="col-md-3 text-right" >
            <a href="{{route('resolucao.create')}}" class="btn btn-success">
                Adicionar
            </a>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr  class="bg-info text-light">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        @if(sizeOf($resolucoes) > 1)
        <tbody>
            @foreach($resolucoes as $count => $resolucao)
            <tr>
                <th scope="row">{{$resolucao->id}}</th>
                <td>
                    <strong>
                        <a href="{{route('resolucao.show', $resolucao->id)}}" class="text-dark">{{$resolucao->nome}}</a>
                    </strong>
                </td>
                <td>
                    <a href="{{route('resolucao.edit', $resolucao->id)}}" class="btn btn-outline-info btn-sm mr-2">Editar</a>
                    <a href="#"  class="btn btn-outline-danger btn-sm mr-2" onClick="confirmExclusao();">Excluir</a>
                </tr>
            @endforeach
        </tbody>
        @endif
    </table>

    <!-- Mensagem de confirmação -->
    <script type="text/javascript">
        function confirmExclusao() {
            var message = "Tem certeza que deseja excluir essa instituição?";
            if ( confirm(message) ) {
            } else {
                return false;
            }
        }
    </script>
@endsection

