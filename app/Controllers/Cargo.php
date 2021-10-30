<?php
namespace App\Controllers;

use App\Models;
use Config\App;

class Cargo extends BaseController
{
    public function index()
    {
        $model = new \App\Models\TbCargo;

        $cargos = array();

        $cargos['data'] = $model->findAll();

        echo view('CargoView', $cargos);

        //var_dump($cargos);
    }

    public function InserirCargo()
    {
        echo view('CadCargoView');
    }

    public function CadastrarCargo()
    {
        if (isset($this->request->getPost()['TB_CARGO_ID'])) {
            $id = $this->request->getPost()['TB_CARGO_ID'];
        }else 
        {
            $id = FALSE;    
        }

        $nomeCargo=$this->request->getPost()['TB_CARGO_NOME'];

        $model = new \App\Models\TbCargo();

        $data = ['TB_CARGO_NOME'=>$nomeCargo];

        if ($id != FALSE) {
             $data['TB_CARGO_ID'] = $id;
        }
        $resultado = $model->save($data);

    }

    public function EditarCargo($id)
    {
        $model = new \App\Models\TbCargo();

        $cargos = $model->find($id);

        $data['editar'] = $cargos;
        echo view('EditarCargoView', $data);

        //var_dump($data);
    }

    public function ViewCargos()
    {
        $model = new \App\Models\TbCargo();
        $cargos = $model->findAll();

        foreach ($cargos as $chave => $linha) 
        {
            $cargos[$chave]['editarcargo'] = '<a class="btn btn-primary" href="editarcargo/' . $linha['TB_CARGO_ID'] . '"> ALTERAR </a>';
            $cargos[$chave]['excluir'] = '<a class="btn btn-danger" href="excluir/' . $linha['TB_CARGO_ID'] . '"> EXCLUIR </a>'; 
        }
        $data['tabela'] = $cargos;
        echo view('CargoView', $data);
    }

    public function excluir($id)
    {
        $model = new \App\Models\TbCargo();

        $resultado = $model->delete($id);

        //var_dump($resultado);
    }

}

?>