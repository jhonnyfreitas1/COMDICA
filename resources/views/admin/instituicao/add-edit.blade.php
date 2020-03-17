@extends('layouts.admin')

    @section('area-principal')
        @isset($instituicoes)
            <h2 id="titulo"> Editar Instituição </h2>
        @else
            <h2 id="titulo"> Cadastro de Instituição </h2>
        @endisset
        @isset($instituicoes)
            <form method="post" action="{{route('instituicao.update', $instituicoes->id)}}" enctype="multipart/form-data">
        		@method('put')
        @else
            <form method="post" action="{{route('instituicao.store')}}" enctype="multipart/form-data">
        @endisset

        		@csrf

        		<label>Nome da Instituição*</label>  
                <input type="text" name="name" id="name"  value="{{ isset($instituicoes->name) ? $instituicoes->name : '' }}" placeholder="Ex: Comdica" required><br>
                <label>Descrição da Instituição*</label>  
                <input type="text" name="desc" id="desc"  value="{{ isset($instituicoes->desc) ? $instituicoes->desc : '' }}" placeholder="Digite a descricao da instituição..." required><br>
                <label>Telefone da Instituição*</label>  
                <input type="text" name="telefone" id="telefone"  value="{{ isset($instituicoes->telefone) ? $instituicoes->telefone : '' }}" placeholder="Digite o telefone da instituição..."><br>
                <label>Endereço da Instituição*</label>  
                <input type="text" name="endereco" id="endereco"  value="{{ isset($instituicoes->endereco) ? $instituicoes->endereco : '' }}" placeholder="Digite o endereço da instituição..."><br>
                <label>E-mail da Instituição*</label>  
                <input type="text" name="email" id="email"  value="{{ isset($instituicoes->email) ? $instituicoes->email : '' }}" placeholder="Digite o e-mail da instituição..."><br>
                <label>Site da Instituição*</label>  
                <input type="text" name="site" id="site"  value="{{ isset($instituicoes->site) ? $instituicoes->site : '' }}" placeholder="Digite o site da instituição..."><br>
                <label>Imagem principal da Instituição*</label>  
                <input type="file" name="imagem_princ" id="imagem_princ"  value="{{ isset($instituicoes->imagem_princ) ? $instituicoes->imagem_princ : '' }}"><br>
                <label>Imagem secundária da Instituição</label>  
                <input type="file" name="imagem_sec" id="imagem_sec"  value="{{ isset($instituicoes->imagem_sec) ? $instituicoes->imagem_sec : '' }}"><br>
                <label>Imagem terciária da Instituição</label>  
                <input type="file" name="imagem_ter" id="imagem_ter"  value="{{ isset($instituicoes->imagem_ter) ? $instituicoes->imagem_ter : '' }}"><br>
            @isset($instituicoes)
                <button type="submit">Editar Instituição</button>
            @else
                <button type="submit">Adicionar</button>
            @endisset
            </form>
    @endsection

