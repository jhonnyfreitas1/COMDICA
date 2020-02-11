
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
        <label>Visão Instituição*</label>  
        <input type="text" name="visao" id="visao"  value="{{ isset($instituicoes->visao) ? $instituicoes->visao : '' }}" placeholder="Ex: Comdica" required><br>
        <label>Valor da Instituição*</label>  
        <input type="text" name="valor" id="valor"  value="{{ isset($instituicoes->valor) ? $instituicoes->valor : '' }}" placeholder="Ex: Comdica" required><br>
        <label>Missão da Instituição*</label>  
        <input type="text" name="missao" id="missao"  value="{{ isset($instituicoes->missao) ? $instituicoes->missao : '' }}" placeholder="Ex: Comdica" required><br>
        <label>Imagem principal da Instituição*</label>  
        <input type="file" name="imagem_princ" id="imagem_princ"  value="{{ isset($instituicoes->imagem_princ) ? $instituicoes->imagem_princ : '' }}"><br>
        <label>Imagem secundária da Instituição</label>  
        <input type="file" name="imagem_sec" id="imagem_sec"  value="{{ isset($instituicoes->imagem_sec) ? $instituicoes->imagem_sec : '' }}"><br>
        <label>Imagem terciária da Instituição</label>  
        <input type="file" name="imagem_ter" id="imagem_ter"  value="{{ isset($instituicoes->imagem_ter) ? $instituicoes->imagem_ter : '' }}"><br>
        <label>Imagem quaternária da Instituição</label>  
        <input type="file" name="imagem_qua" id="imagem_qua"  value="{{ isset($instituicoes->imagem_qua) ? $instituicoes->imagem_qua : '' }}"><br>
    @isset($instituicoes)
        <button type="submit">Editar Instituição</button>
    @else
        <button type="submit">Adicionar</button>
    @endisset
    </form>
