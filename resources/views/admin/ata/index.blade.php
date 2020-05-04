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
                    Atas
                </span>
            </li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-md-9">
            <h1 class="h2 border-left pl-2">
                Atas
            </h1>
        </div>
        <div class="col-md-3 text-right" >
            <a href="{{route('atas.create')}}" class="btn btn-success">
                Adicionar
            </a>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr  class="bg-info text-light">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        @if(sizeOf($atas) >= 1)
        <tbody>
            @foreach($atas as $count => $ata)
            <tr>
                <th scope="row">{{$ata->id}}</th>
                <td>
                    <strong>
                        <a href="{{route('atas.show', $ata->id)}}" class="text-dark">{{ substr($ata->nome,0,-4) }}</a>
                    </strong>
                </td>
                <td>
                    <strong>
                    </strong>
                </td>
                <td>
                    <a href="{{route('atas.edit', $ata->id)}}" class="btn btn-outline-info btn-sm mr-2">Editar</a>
                    <a href="#"  id="{{$ata->id}}" url="{{ route('atas.destroy', $ata->id)}}" class="btn btn-outline-danger btn-sm mr-2" onClick="confirmExclusao({{$ata->id}}, 'essa ata');">Excluir</a>
                </tr>
            @endforeach
        </tbody>
        @endif
    </table>

@endsection
