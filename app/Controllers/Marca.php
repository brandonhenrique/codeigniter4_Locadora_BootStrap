<?php

namespace App\Controllers;
use App\Models;

class Marca extends BaseController
{
    public function index()
    {
        $model = new \App\Models\TbMarca();
        $marcas = array();
        $marcas['data'] = $model->findAll();

        echo view('Marcas_view', $marcas);
    }

    public function inserir()
    {
        echo view('cadastrarMarcaView');

    }
    
    public function inserir_Marca()
    {
        
        if(isset($this->request->getPost()['TB_MARCA_ID']))
        { 
            $id = $this->request->getPost()['TB_MARCA_ID'];
         } else
        {
            $id = FALSE;
        }

        $marcNome=$this->request->getPost()['TB_MARCA_NOME'];
      
        $model = new \App\Models\TbMarca();
        
        $data = [
            'TB_MARCA_NOME'=>$marcNome
        ];  

        if($id != FALSE) 
        {
            $data['TB_MARCA_ID'] = $id;
        }
        $resultado = $model->save($data);
       
        
    }

    public function editar_Marca($id)
    {
        $model = new \App\Models\TbMarca();
        // find só seleciona a linha pelo id
        $marcas = $model->find($id);
        $data['editar'] = $marcas;
		echo view('EditarMarcaView', $data); 
        //var_dump($data);
    }

    public function viewMarcas()
    {
        $model = new \App\Models\TbMarca();	
		$marcas = $model->findAll();

        foreach ($marcas as $chave => $linha)
        {
            $marcas[$chave]['editar'] = '<a class="btn btn-primary" href="editar_Marca/' . $linha['TB_MARCA_ID'] . '"> ALTERAR </a>';
            $marcas[$chave]['excluir'] = '<a class="btn btn-danger" href="excluir_Marca/' . $linha['TB_MARCA_ID'] . '"> EXCLUIR </a>';       
        }   

        $data['tabela'] = $marcas;
		echo view('Marcas_view', $data);     
    }

    public function excluir_Marca($id)
    {
        $model = new \App\Models\TbMarca();
		
		$resultado = $model->delete($id);		
		//var_dump($resultado);          	

    }
}