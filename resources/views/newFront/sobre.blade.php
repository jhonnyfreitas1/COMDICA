@extends('layouts.newIndex');

@section('content')
<section class="introducao-interna interna_sobre">
    <div class="container">
        <h1 data-anime="400" class="fadeInDown">Sobre</h1>
        <p data-anime="800" class="fadeInDown">Conheça mais sobre o COMDICA e o FUNDECA</p>
    </div>
</section>
<section class="missao_sobre container fadeInDown" data-anime="1200">
    <div class="grid-10">
        <h2 class="subtitulo-interno"> Quem somos?, O que Fazemos?</h2>
        <p>
            Criado pela lei municipal nº 028 de 26 de janeiro de 1998, o conselho municipal de defesa dos direitos da criança e do adolescente de Araçoiaba (COMDICA Araçoiaba) é um órgão de natureza deliberativa, de fiscalização e controlador da execução da política de promoção e defesa dos direitos da criança e do adolescente do município de Araçoiaba.
O COMDICA Araçoiaba objetivará o cumprimento das diretrizes da política nacional, estadual e municipal de promoção e defesa dos direitos da criança e do adolescente, mediante a formulação democrática e participativa de suas linhas de ação e o estímulo das entidades governamentais e não governamentais atuantes no município de Araçoiaba zelando pelo cumprimento dos dispositivos do estatuto da criança e do adolescente (ECA).
        </p>
    </div>
    {{-- <div class="grid-6">
        <h2 class="subtitulo-interno">Fundeca</h2>
        <p>
            Os fundos públicos da infância e adolescência – “fias” são os fiéis depositários dos recursos destinados ao atendimento dos programas e ações voltadas para a promoção, proteção e defesa da garantia dos direitos de crianças e adolescentes. 
em Araçoiaba / PE, ele recebe o nome de “FUNDECA”. criado pela lei municipal nº 0305 de 30 de dezembro de 2014.
para esclarecer: esses recursos não são destinados à prefeitura, como as pessoas acreditam. são recursos depositados no FUNDECA, que possuem personalidade jurídica própria (CNPJ) e passam pelo controle social do COMDICA – conselho municipal de defesa dos direitos de criança e adolescentes. além de estarem sujeitos à aprovação de um plano de investimento e sua destinação é feita através de editais públicos, ambos apresentados e aprovados por este conselho.
        </p> --}}
    {{-- </div> --}}

    <div class="grid-6 foto-equipe">
        <img src="{{asset('img/marca1.png')}}" alt="Equipe Bikcraft">
    </div>
    <div class="grid-10">
        <h2 class="subtitulo-interno">Fundeca</h2>
        <p>
            Os fundos públicos da infância e adolescência – “fias” são os fiéis depositários dos recursos destinados ao atendimento dos programas e ações voltadas para a promoção, proteção e defesa da garantia dos direitos de crianças e adolescentes. 
            em Araçoiaba / PE, ele recebe o nome de “FUNDECA”. criado pela lei municipal nº 0305 de 30 de dezembro de 2014.
            para esclarecer: esses recursos não são destinados à prefeitura, como as pessoas acreditam. são recursos depositados no FUNDECA, que possuem personalidade jurídica própria (CNPJ) e passam pelo controle social do COMDICA – conselho municipal de defesa dos direitos de criança e adolescentes. além de estarem sujeitos à aprovação de um plano de investimento e sua destinação é feita através de editais públicos, ambos apresentados e aprovados por este conselho.
        </p>
    </div>
    <div class="grid-6 foto-equipe">
        <img src="{{asset('img/fundeca.png')}}" alt="Equipe Bikcraft">
    </div>
</section>
@endsection