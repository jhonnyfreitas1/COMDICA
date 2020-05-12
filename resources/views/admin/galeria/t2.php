extends('layouts.admin')

	@section('area-principal')
<br>
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li  class="breadcrumb-item">
                <a href="{{route('admin.comdica')}}">Home</a>
            </li>
            <li class="breadcrumb-item" >
                <span class="text-secondary">
                    Galeria
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
                Galeria
            </h1>
        </div>
        <div class="col-md-3 text-right" >
            <a href="{{route('galeria.create')}}" class="btn btn-success">
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
        <tbody>
            @foreach($albuns as $count => $album)
            <tr>
                <th scope="row">{{$album->id}}</th>
                <td>
                    <strong>
                        <a href="{{route('galeria.show', $album->id)}}" class="text-dark">{{$album->titulo}}</a>
                    </strong>
                </td>
                <td>
                    <a href="{{route('galeria.edit', $album->id)}}" class="btn btn-outline-info btn-sm mr-2">Editar</a>
                    <a href="#"  href="#"  id="{{$album->id}}" url="{{ route('galeria.destroy', $album->id)}}" class="btn btn-outline-danger btn-sm mr-2"  onClick="confirmExclusao({{$album->id}}, 'esse álbum');">Excluir</a>
                </tr>
            @endforeach
        </tbody>
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
