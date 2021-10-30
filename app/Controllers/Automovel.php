<?php

namespace App\Controllers;

use App\Models;
use Config\App;

class Automovel extends BaseController
{
    public function index()
    {
        $model = new \App\Models\Tbautomovel;

        $automoveis = array();

        $automoveis['data'] = $model->findAll();

        echo view('Automovel_view', $automoveis);

        // echo '<pre>';
        // var_dump($automoveis);
    }

    public function inserir()
    {
        echo view('InserirAltomovelView');
    }

    public function cadastrar_carro()
    {
        if (isset($this->request->getPost()['TB_AUTOMOVEL_ID'])) {
                $id = $this->request->getPost()['TB_AUTOMOVEL_ID'];
        }else {
            $id = FALSE;
        }
        $nome=$this->request->getPost()['TB_AUTOMOVEL_NOME'];
        $anofab=$this->request->getPost()['TB_AUTOMOVEL_ANO_FAB'];
        $cor=$this->request->getPost()['TB_AUTOMOVEL_COR'];
        $km=$this->request->getPost()['TB_AUTOMOVEL_KM'];
        $valorauto=$this->request->getPost()['TB_AUTOMOVEL_VALOR_D'];
        $status=$this->request->getPost()['TB_AUTOMOVEL_STATUS'];
        $marca=$this->request->getPost()['TB_MARCA_ID'];
        $modelo=$this->request->getPost()['TB_MODELO_ID'];

        //instanciando o AutomovelModel para inserir dados no banco

        $model = new \App\Models\Tbautomovel();

        $data = [
            'TB_AUTOMOVEL_NOME'=>$nome,
            'TB_AUTOMOVEL_ANO_FAB'=>$anofab,
            'TB_AUTOMOVEL_COR'=>$cor,
            'TB_AUTOMOVEL_KM'=>$km,
            'TB_AUTOMOVEL_VALOR_D'=>$valorauto,
            'TB_AUTOMOVEL_STATUS'=>$status,
            'TB_MARCA_ID'=>$marca,
            'TB_MODELO_ID'=>$modelo,
        ];

        if ($id != FALSE) {
            $data['TB_AUTOMOVEL_ID'] = $id;
        }
        $resultado = $model->save($data);
        //var_dump($resultado);
    }

    public function alterar($id)
    {
        $model = new \App\Models\Tbautomovel();
        // find só seleciona a linha pelo id
        $automoveis = $model->find($id);
        $data['alterar'] = $automoveis;
		echo view('EditarAutomovelView', $data); 
        //var_dump($data);
    }

    public function viewCarros()
    {
        $model = new \App\Models\Tbautomovel();
        $automoveis = $model->findAll();

        foreach($automoveis as $chave => $linha)
        {
            $automoveis[$chave]['alterar'] = '<a class="btn btn-primary" href="alterar/' . $linha['TB_AUTOMOVEL_ID'] . '"> ALTERAR </a>';
            $automoveis[$chave]['excluir'] = '<a class="btn btn-danger" href="excluir/' . $linha['TB_AUTOMOVEL_ID'] . '"> EXCLUIR </a>'; 
        }

        $data['tabela'] = $automoveis;
        echo view('Automovel_view', $data);
    }

    public function excluir($id)
    {
        $model = new \App\Models\Tbautomovel();
		
		$resultado = $model->delete($id);		
		//var_dump($resultado);        	

    }
}
