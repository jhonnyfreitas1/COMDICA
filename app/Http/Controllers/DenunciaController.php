<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RespGeral;
use App\RespOcorrencia;
use App\RespViolencia;
use App\RespLesao;
use App\RespAgressor;
use App\RespFinalizar;
use App\DadosGerais;
use Illuminate\Support\Facades\DB;



class DenunciaController extends Controller
{
    public function index(){
		$denuncias = DB::table('dados_gerais')->paginate();
        return view('admin.denuncia.index', compact('denuncias'));
     }

    public function store(Request $request){
        //Adicionando na tabela resp_gerals
		($request->pregnant == '1') ? $pregnant = true: $pregnant = false;
		($request->deficient == '1') ? $deficient = true: $deficient = false;
		$respGeral = new respGeral;
		$respGeral->name = isset($request->name) ? $request->name : '';
		$respGeral->gender = isset($request->gender) ? $request->gender : null;
		$respGeral->ethnicity = isset($request->ethnicity) ? $request->ethnicity : null;
		$respGeral->pregnant = isset($request->pregnant) ? $pregnant : null;
		$respGeral->responsible = isset($request->responsible) ? $request->responsible : null;
		$respGeral->locality = isset($request->locality) ? $request->locality : null;
		$respGeral->street = isset($request->street) ? $request->street : null;
		$respGeral->complement = isset($request->complement) ? $request->complement : null;
		$respGeral->residence = isset($request->residence) ? $request->residence : null;
		$respGeral->number = isset($request->number) ? $request->number : null;
		$respGeral->deficient = isset($request->deficient) ? $deficient : null;
		$respGeral->save();

    	//Adicionando na tabela resp_ocorrencia
		($request->otherOcurrence == '1') ? $otherOcurrence = true : $otherOcurrence = false;
		($request->autoProvocated == '1') ? $autoProvocated = true : $autoProvocated = false;
		$respOcorrencia = new respOcorrencia;
		$respOcorrencia->occurrence = isset($request->occurrence) ? $request->occurrence : null;
		$respOcorrencia->otherOcurrence = isset($request->otherOcurrence) ? $otherOcurrence : null;
		$respOcorrencia->autoProvocated = isset($request->autoProvocated) ? $autoProvocated : null;
		$respOcorrencia->save();

    	//Adicionando na tabela resp_violencia
		($request->penetration == '1') ? $penetration = true : $penetration = false;
		$respViolencia = new respViolencia;
		$respViolencia->violence = isset($request->violence) ? $request->violence : null;
		$respViolencia->agression = isset($request->agression) ? $request->agression : null;
		$respViolencia->consOcurrence = isset($request->consOcurrence) ? $request->consOcurrence : null;
		$respViolencia->violenceType = isset($request->violenceType) ? $request->violenceType : null;
		$respViolencia->penetration = isset($request->penetration) ? $penetration : null;
		$respViolencia->penetrationType = isset($request->penetrationType) ? $request->penetrationType : null;
		$respViolencia->save();

    	//Adicionando na tabela resp_lesaos
		$respLesao = new respLesao;
		$respLesao->nature = isset($request->nature) ? $request->nature : null;
		$respLesao->bodyPart = isset($request->bodyPart) ? $request->bodyPart : null;
        $respLesao->save();

    	//Adicionando na tabela resp_finalizar
		$respFinalizar = new respFinalizar;
		$respFinalizar->finStatus = false;
        $respFinalizar->save();

        //Adicionando na tabela resp_agressors
        ($request->alcool == '1') ? $alcool = 'sim' : (($request->alcool == '0') ? $alcool = 'não' : null);
		$respAgressor = new respAgressor;
		$respAgressor->agressorName = isset($request->agressorName) ? $request->agressorName : 0;
		$respAgressor->agressorAge = isset($request->agressorAge) ? $request->agressorAge : 0;
		$respAgressor->agressorGender = isset($request->agressorGender) ? $request->agressorGender : null;
		$respAgressor->agressorBond = isset($request->agressorBond) ? $request->agressorBond : null;
		$respAgressor->alcool = isset($alcool) ? $alcool : null;
		$respAgressor->save();

    	//Adicionando na tabela dados_gerais
		$dadosGerais = new DadosGerais;
		$dadosGerais->respGeral = $respGeral['id'];
		$dadosGerais->hashDenun = 'denun';
		$dadosGerais->respOcorrencia = $respOcorrencia['id'];
		$dadosGerais->respViolencia = $respViolencia['id'];
		$dadosGerais->respLesao = $respLesao['id'];
		$dadosGerais->respAgressor = $respAgressor['id'];
		$dadosGerais->respfinalizar = $respFinalizar['id'];
        $dadosGerais->save();

        //Adicionando o Hash na denúncia
        $recupDenun = DadosGerais::where('id','=', $dadosGerais->id)->first();
        $recupDenun->hashDenun = $dadosGerais->hashDenun.$dadosGerais->id;
        $recupDenun->save();

        $hash = $recupDenun->hashDenun;
        return view('success', compact('hash'));
    }
    public function show($id){

        $denuncia = DB::table('dados_gerais')
            		->join('resp_gerals', 'resp_gerals.id', '=' , 'respGeral')
            		->join('resp_ocorrencias', 'resp_ocorrencias.id', '=' , 'respOcorrencia')
            		->join('resp_violencias', 'resp_violencias.id', '=' , 'respViolencia')
            		->join('resp_lesaos', 'resp_lesaos.id', '=' , 'respLesao')
            		->join('resp_agressors', 'resp_agressors.id', '=' , 'respAgressor')
                    ->select('dados_gerais.id','dados_gerais.hashDenun','resp_gerals.*','resp_ocorrencias.*','resp_violencias.*','resp_lesaos.*','resp_agressors.*')
        			->where('dados_gerais.id','=',$id)
                    ->get();

         return view('admin.denuncia.show', compact('denuncia'));
	}
	public function track(Request $request){

        $denuncia = DB::table('dados_gerais')
                    ->join('resp_gerals', 'resp_gerals.id', '=' , 'respGeral')
            		->join('resp_ocorrencias', 'resp_ocorrencias.id', '=' , 'respOcorrencia')
            		->join('resp_violencias', 'resp_violencias.id', '=' , 'respViolencia')
            		->join('resp_lesaos', 'resp_lesaos.id', '=' , 'respLesao')
            		->join('resp_agressors', 'resp_agressors.id', '=' , 'respAgressor')
            		->join('resp_finalizar', 'resp_finalizar.id', '=' , 'respFinalizar')
                    ->select(
                        'dados_gerais.id',
                        'dados_gerais.hashDenun',
                        'dados_gerais.created_at',
                        'dados_gerais.updated_at',
                        // dados gerais
                        'resp_gerals.name',
                        'resp_gerals.gender',
                        'resp_gerals.ethnicity',
                        'resp_gerals.pregnant',
                        'resp_gerals.responsible',
                        'resp_gerals.locality',
                        'resp_gerals.street',
                        'resp_gerals.complement',
                        'resp_gerals.residence',
                        'resp_gerals.number',
                        'resp_gerals.deficient',
                        // dados da violencia
                        'resp_violencias.violence',
                        'resp_violencias.agression',
                        'resp_violencias.consOcurrence',
                        'resp_violencias.violenceType',
                        'resp_violencias.penetration',
                        'resp_violencias.penetrationType',
                        // dados da ocorrencia
                        'resp_ocorrencias.occurrence',
                        'resp_ocorrencias.otherOcurrence',
                        'resp_ocorrencias.autoProvocated',
                        // dados da lesao
                        'resp_lesaos.nature',
                        'resp_lesaos.bodyPart',
                        // dados do agressor
                        'resp_agressors.agressorName',
                        'resp_agressors.agressorAge',
                        'resp_agressors.agressorGender',
                        'resp_agressors.agressorBond',
                        'resp_agressors.alcool',
                        // dados finais
                        'resp_finalizar.finStatus',
                        'resp_finalizar.updated_at as up_final',
                        )
        			->where('dados_gerais.hashDenun','=',$request->hash)
                    ->get();

        $encaminhamentos =  DB::table('resp_encaminhar')->where('dadosGerais_id','=',$denuncia[0]->id)->get();

        // return var_dump($encaminhamentos);
        // return var_dump($denuncia);
        // verificando se existe a denuncia
        if(count($denuncia) == 0){
            /*Voltando para a pagina denunCard mostrando a menagem que não tem aquela denuncia*/
            $mensagem = 'Denuncia não existe!';
            return redirect('denunCards')->with('mensagem',$mensagem);
        }else{
            /*redirecionando para o rastreio da denuncia*/
            $denuncia = $denuncia[0];
            // return var_dump($denuncia);
            return view('newFront.denunTrack', compact('denuncia','encaminhamentos'));
        }
    }
    public function denuncia(){
        return view('welcome');
    }
    public function offline(){
        return view('offline');
    }
    public function success(){
        return view('success');
    }
}
