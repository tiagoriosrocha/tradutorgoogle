<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GoogleTradutorController extends Controller
{
    
    private function carregarLinguagens(){
        $client = new \GuzzleHttp\Client(); //crio um objeto da classe Client que irá buscar os dados usando a API
        $headers = [ //defino os headers da consulta (serve para verificar a autorização)
            'X-RapidAPI-Key' => env('RAPID_API_GOOGLE_TRANSLATOR_KEY'), //usei a função env() pra poder armazenar a key no arquivo .env
            'X-RapidAPI-Host' => 'google-translate1.p.rapidapi.com'
        ];
        //abaixo eu crio um objeto classe Request, com os parâmetros da consulta
        $request = new \GuzzleHttp\Psr7\Request('GET', 'https://google-translate1.p.rapidapi.com/language/translate/v2/languages', $headers);
        //abaixo eu "executo" a consulta usando modo assíncrono
        $result = $client->sendAsync($request)->wait();

        //abaixo eu pego os dados que estarão dentro da variável $result e pego o corpo do resultado
        //$objetoJson = json_decode($result->getBody(), JSON_OBJECT_AS_ARRAY); //convertendo o resultado para um array
        $objetoJson = json_decode($result->getBody()); //convertendo o resultado para objeto json

        //return $result->getBody();
        //dd($objetoJson->data->languages); //pegando o vetor com todos elementos (objetos) de linguagens
        //dd($objetoJson->data->languages[2]->language); //pegando o elemento de índice 0, na propriedade langage

        $vetorLinguagens = []; //crio um vetor vazio
        foreach($objetoJson->data->languages as $umElemento){ //faço um laço de repetição para cada elemento que veio na requisição
            $vetorLinguagens[] = $umElemento->language; //adiciona só o "es" "en" "pt" no vetor
        }

        return $vetorLinguagens;
    }
    
    public function carregarFormulario(){
        //carrego as linguagens
        $vetorLinguagens = $this->carregarLinguagens();
        //chamo uma view e envio para ela os dados para que sejam usados na criação do formulário
        return view('formulario',["vetorLinguagens" => $vetorLinguagens]);
    }


    public function produzirTraducao(Request $request){
        $textooriginal = $request['texto_original'];
        $lingua_origem = $request['linguagem_origem'];
        $lingua_destino = $request['linguagem_destino'];

        $client = new Client();
        $headers = [
            'X-RapidAPI-Key' => env('RAPID_API_GOOGLE_TRANSLATOR_KEY'),
            'X-RapidAPI-Host' => 'google-translate1.p.rapidapi.com',
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
        $options = [
            'form_params' => [
                'source' => $lingua_origem,
                'target' => $lingua_destino,
                'q' => $textooriginal
            ]
        ];
        $request = new \GuzzleHttp\Psr7\Request('POST', 'https://google-translate1.p.rapidapi.com/language/translate/v2', $headers);
        $result = $client->sendAsync($request, $options)->wait();

        //pego o resultado e converto para objeto json 
        $objetoJson = json_decode($result->getBody());

        //abaixo o código para eu pegar somente a variável  com o resultado
        $resultadoDaTraducao = $objetoJson->data->translations[0]->translatedText;

        $vetorLinguagens = $this->carregarLinguagens();

        return view("formulario",[
                                            'vetorLinguagens' => $vetorLinguagens,
                                            'lingua_origem' => $lingua_origem, 
                                            'lingua_destino' => $lingua_destino,
                                            'textooriginal' => $textooriginal, 
                                            'textotraduzido' => $resultadoDaTraducao
                                ]);
        
    }

}
