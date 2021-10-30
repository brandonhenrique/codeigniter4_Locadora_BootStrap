<?php

namespace App\Controllers;
use App\Models;

class Locacao extends BaseController
{
    public function index()
    {
        $model = new \App\Models\TbLocacao();
        $locacoes = array();
        $locacoes['data'] = $model->findAll();

        echo view('Locacao_view', $locacoes);
    }

    public function inserir()
    {
        echo view('cadastrarLocacaoView');

    }
    
    public function inserir_Locacao()
    {
        
        if(isset($this->request->getPost()['TB_LOCACAO_ID']))
        { 
            $id = $this->request->getPost()['TB_LOCACAO_ID'];
         } else
        {
            $id = FALSE;
        }

        $tipoLoc=$this->request->getPost()['TB_LOCACAO_TIPO'];
        $valorLoc=$this->request->getPost()['TB_LOCACAO_VALOR'];
        $dtInicio=$this->request->getPost()['TB_LOCACAO_DT_INICIO'];
        $dtFim=$this->request->getPost()['TB_LOCACAO_DT_FIM'];
        $idCli=$this->request->getPost()['TB_CLIENTE_ID'];
        $idFun=$this->request->getPost()['TB_FUNCIONARIO_ID'];
        $idAuto=$this->request->getPost()['TB_AUTOMOVEL_ID'];     
        
        // instancia Funcionario Model para inserir dados no banco
        $model = new \App\Models\TbLocacao();
        
        $data = [
            'TB_LOCACAO_TIPO'=>$tipoLoc,
            'TB_LOCACAO_VALOR'=>$valorLoc,
            'TB_LOCACAO_DT_INICIO'=>$dtInicio,
            'TB_LOCACAO_DT_FIM'=>$dtFim,
            'TB_CLIENTE_ID'=>$idCli,
            'TB_FUNCIONARIO_ID'=>$idFun,
            'TB_AUTOMOVEL_ID'=>$idAuto
        ];  

        if($id != FALSE) 
        {
            $data['TB_LOCACAO_ID'] = $id;
        }
        $resultado = $model->save($data);
        //var_dump($resultado); 
        
        
    }

    public function editar_locacao($id)
    {
        $model = new \App\Models\TbLocacao();
        // find só seleciona a linha pelo id
        $locacoes = $model->find($id);
        $data['editar'] = $locacoes;
		echo view('EditarLocacaoView', $data); 
        //var_dump($data);
    }

    public function viewLocacoes()
    {
        $model = new \App\Models\TbLocacao();	
		$locacoes = $model->findAll();

        foreach ($locacoes as $chave => $linha)
        {
            $locacoes[$chave]['editar'] = '<a class="btn btn-primary" href="editar_locacao/' . $linha['TB_FUNCIONARIO_ID'] . '"> ALTERAR </a>';
            $locacoes[$chave]['excluir'] = '<a class="btn btn-danger" href="excluir_locacaoes/' . $linha['TB_FUNCIONARIO_ID'] . '"> EXCLUIR </a>';       
        }   

        $data['tabela'] = $locacoes;
		echo view('Locacao_view', $data);     
    }

    public function excluir_locacoes($id)
    {
        $model = new \App\Models\TbLocacao();
		
		$resultado = $model->delete($id);		
		//var_dump($resultado);          	

    }
}