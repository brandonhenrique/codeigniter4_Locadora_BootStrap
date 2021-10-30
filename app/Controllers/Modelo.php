<?php

namespace App\Controllers;
use App\Models;

class Modelo extends BaseController
{
    public function index()
    {
        $model = new \App\Models\TbModelo();
        $modelos = array();
        $modelos['data'] = $model->findAll();

        echo view('Modelo_view', $modelos);
    }

    public function inserir()
    {
        echo view('cadastrarModeloView');

    }
    
    public function inserir_Modelo()
    {
        
        if(isset($this->request->getPost()['TB_MODELO_ID']))
        { 
            $id = $this->request->getPost()['TB_MODELO_ID'];
         } else
        {
            $id = FALSE;
        }

        $modDesc=$this->request->getPost()['TB_MODELO_DESC'];
        $modObs=$this->request->getPost()['TB_MODELO_OBS'];
        $modData=$this->request->getPost()['TB_MODELO_DATA'];

        $model = new \App\Models\TbModelo();
        
        $data = [
            'TB_MODELO_DESC'=>$modDesc,
            'TB_MODELO_OBS'=>$modObs,
            'TB_MODELO_DATA'=>$modData
        ];  

        if($id != FALSE) 
        {
            $data['TB_MODELO_ID'] = $id;
        }
        $resultado = $model->save($data);
       
        
    }

    public function editar_Modelo($id)
    {
        $model = new \App\Models\TbModelo();
        // find só seleciona a linha pelo id
        $modelos = $model->find($id);
        $data['editar'] = $modelos;
		echo view('EditarModeloView', $data); 
        //var_dump($data);
    }

    public function viewModelo()
    {
        $model = new \App\Models\TbModelo();	
		$modelos = $model->findAll();

        foreach ($modelos as $chave => $linha)
        {
            $modelos[$chave]['editar'] = '<a class="btn btn-primary" href="editar_Modelo/' . $linha['TB_MODELO_ID'] . '"> ALTERAR </a>';
            $modelos[$chave]['excluir'] = '<a class="btn btn-danger" href="excluir_Modelo/' . $linha['TB_MODELO_ID'] . '"> EXCLUIR </a>';       
        }   

        $data['tabela'] = $modelos;
		echo view('Modelo_view', $data);     
    }

    public function excluir_Modelo($id)
    {
        $model = new \App\Models\TbModelo();
		
		$resultado = $model->delete($id);		
		//var_dump($resultado);          	

    }
}