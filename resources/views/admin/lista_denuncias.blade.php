@extends('layouts.admin')

	@section('js')
	@endsection
	@section('area-principal')

    <div class="row m-2 " style=" " >
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Hash</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($denuncias as $denuncia)
    
              <tr>
                <th scope="row">{{$denuncia->id}}</th>
                <td>{{$denuncia->hashDenun}}</td>
                <td>
                  <a href="/admin/show_denuncia/{{$denuncia->id}}" style="color: inherit">Detalhe da  denúncia</a>
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {!! $denuncias -> Links()!!} 
	@endsection