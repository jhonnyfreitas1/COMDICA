@extends('layouts.admin')

	@section('js')
	@endsection
	@section('area-principal')
    <br>
    <nav class="mb-2">
        <ol class="breadcrumb">
            <li  class="breadcrumb-item">
                <a href="{{route('usuario.index')}}">Home</a>
            </li>

            <li class="breadcrumb-item" >
                <span class="text-secondary">
                    Denúncias
                </span>
            </li>
        </ol>
    </nav>
    <div class="row mb-4">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
                Denúncias
            </h1>
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
          @foreach($denuncias as $denuncia)

              <tr>
                <th scope="row">{{$denuncia->id}}</th>
                <td>
                    <strong>
                        <a href="{{ route('denuncias.show',$denuncia->id) }}" class="text-dark">
                            {{$denuncia->hashDenun}}
                        </a>
                    </strong>
                </td>
                <td>
                  <a href="{{ route('denuncias.show',$denuncia->id) }}" class="btn btn-outline-info btn-sm mr-2">Detalhe da  denúncia</a>
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    <!-- </div> -->
    {!! $denuncias -> Links()!!}
	@endsection
