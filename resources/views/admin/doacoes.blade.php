@extends('layouts.admin')

	@section('js')
		<style type="text/css">
				

		</style>
	@endsection
	@section('area-principal')
 </center>
 	<div class="row " style=" margin-top: 2em;">


       <table class="table table-striped table-bordered " id="example">
            <thead align="center" class="thead-light" style="height:10%;" >
                <tr align="center">                 
                    <th scope="col"> Charger ID </th>
                    <th scope="col"> Nome doador </th>
                    <th scope="col"> Link Boleto </th>
                @if(isset($doacao->parcela))
                    
                       <th scope="col"> Parcela </th>    
                    @else
                    <th scope="col"> Valor total</th>
                    @endif

                     <th scope="col"> Metodo </th>
                     <th scope="col"> Status </th>
                     <th scope="col"> Vencimento </th>
                     <th scope="col"> Ações </th>
                     
                </tr>
            </thead>
           <tbody>
                @foreach ($doacoes as $count => $doacao)
                    <tr id="{{ $doacao->charger_id }}" class="bg-light" align="center">
                        <td> {{$doacao->charger_id}}</td>
                        <td> {{$doacao->doador_nome}}</td>
                        <td> <a href="{{$doacao->link_boleto}}">
                        {{ str_limit($doacao->link_boleto, 25)}}</a></td>
            
                        <td>{{$doacao->valor_total}}</td>
        
                        <td> {{$doacao->metodo_pagamento}}</td>
                        <td> {{$doacao->status}}</td>
                        <td> {{$doacao->vencimento}}</td>
                        <td> 
                             <a  id="" class="destroy" data-catid="{{$doacao->charger_id}}" data-toggle="modal" data-target="#delete{{$count}}"  href="#"> 
                                Detalhes
                            </a>
                        </td>
                    </tr>
                        <div class="modal modal-danger fade" id="delete{{$count}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title text-center" id="myModalLabel" style="margin-left: 8em;">Detalhes</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                              </div>
                                <input type="hidden" name="category_id" id="cat_id" value="">       
                                <div class="modal-footer">

                                    <div class="col-md-12" style="display: inline-block;">
                                      <ul class="list-group  ">
                                            <li class="list-group-item col-md-12 row"> <button type="button" class="btn btn-warning">Doador nome</button> {{$doacao->doador_nome}} </li>  
                                             <li class="list-group-item col-md-12 row"> <button type="button" class="btn btn-warning"> Charger ID </button> {{$doacao->charger_id}} </li>  
                                              
                                              <li class="list-group-item col-md-12 row"> <button type="button" class="btn btn-warning">Link boleto</button> <a  class='bg-light' href="{{$doacao->link_boleto}}">{{ str_limit($doacao->link_boleto, 25)}}</a> </li>  
                                               
                                               <li class="list-group-item col-md-12 row"> <button type="button" class="btn btn-warning">  @if($doacao->valor_parcelado != 0))
                                                        
                                                            Parcela    </button> {{$doacao->valor_parcelado}}</li>
                                                        @else
                                                        Valor total </button> {{$doacao->valor_total}}</li>
                                                        @endif
                                               
                                               <li class="list-group-item col-md-12 row"> <button type="button" class="btn btn-warning">Doador cpf</button> {{$doacao->doador_cpf}} </li>  

                                                <li class="list-group-item col-md-12 row"> <button type="button" class="btn btn-warning">Doador telefone</button> {{$doacao->doador_telefone}} </li>   

                                                <li class="list-group-item col-md-12 row"> <button type="button" class="btn btn-warning">Parcelas</button> {{$doacao->parcelas}} </li>
                                                <li class="list-group-item col-md-12 row"> <button type="button" class="btn btn-warning">Método</button> {{$doacao->metodo_pagamento}} </li>
                                                  <li class="list-group-item col-md-12 row"> <button type="button" class="btn btn-warning">Status</button> {{$doacao->status}} </li>
                                                   <li class="list-group-item col-md-12 row"> <button type="button" class="btn btn-warning"> Vencimento</button> {{$doacao->vencimento}} </li>
                                                    <li class="list-group-item col-md-12 row"> <button type="button" class="btn btn-warning"> Boleto gerado em </button> {{$doacao->created_at  }} </li>
                                        </ul>
                                      
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>  
            @endforeach
            </tbody>
        </table>
        {{$doacoes->links()}}
    </div>		
   </div>
 

	@endsection
