<?php

namespace App\Controllers;
use App\Models;

class Funcionario extends BaseController
{
    public function index()
    {
        $model = new \App\Models\TbFuncionario();
        $funcionarios = array();
        $funcionarios['data'] = $model->findAll();

        echo view('Funcionario_view', $funcionarios);
    }

    public function inserir()
    {
        echo view('cadastrarFuncionarioView');

    }
    
    public function inserir_funcionario()
    {
        
        if(isset($this->request->getPost()['TB_FUNCIONARIO_ID']))
        { 
            $id = $this->request->getPost()['TB_FUNCIONARIO_ID'];
         } else
        {
            $id = FALSE;
        }

        $nomeFunc=$this->request->getPost()['TB_FUNCIONARIO_NOME'];
        $telefone=$this->request->getPost()['TB_FUNCIONARIO_TEL'];
        $dataContrato=$this->request->getPost()['TB_FUNCIONARIO_DT_CONTRATO'];
        $cargo=$this->request->getPost()['TB_CARGO_ID'];     
        
        // instancia Funcionario Model para inserir dados no banco
        $model = new \App\Models\TbFuncionario();
        
        $data = [
            'TB_FUNCIONARIO_NOME'=>$nomeFunc,
            'TB_FUNCIONARIO_TEL'=>$telefone,
            'TB_FUNCIONARIO_DT_CONTRATO'=>$dataContrato,
            'TB_CARGO_ID'=>$cargo
        ];  

        if($id != FALSE) 
        {
            $data['TB_FUNCIONARIO_ID'] = $id;
        }
        $resultado = $model->save($data);
        //var_dump($resultado); 
        
        
    }

    public function editar_funcionario($id)
    {
        $model = new \App\Models\TbFuncionario();
        // find só seleciona a linha pelo id
        $funcionarios = $model->find($id);
        $data['editar'] = $funcionarios;
		echo view('editarFuncionarioView', $data); 
        //var_dump($data);
    }

    public function viewFuncionarios()
    {
        $model = new \App\Models\TbFuncionario();	
		$funcionarios = $model->findAll();

        foreach ($funcionarios as $chave => $linha)
        {
            $funcionarios[$chave]['editar'] = '<a class="btn btn-primary" href="editar_funcionario/' . $linha['TB_FUNCIONARIO_ID'] . '"> ALTERAR </a>';
            $funcionarios[$chave]['excluir'] = '<a class="btn btn-danger" href="excluirFuncionarios/' . $linha['TB_FUNCIONARIO_ID'] . '"> EXCLUIR </a>';       
        }   

        $data['tabela'] = $funcionarios;
		echo view('Funcionario_view', $data);     
    }

    public function excluirFuncionarios($id)
    {
        $model = new \App\Models\TbFuncionario();
		
		$resultado = $model->delete($id);		
		//var_dump($resultado);  
             	

    }
}