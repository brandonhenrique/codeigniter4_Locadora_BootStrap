<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Cargos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">   
            <center><h4 class="text-dark">Alterar Cadastro de Cargos</h4></center>
       
            <div class="row align-items-start mt-5">
                
                <!-- <div class="col"></div>      -->
                
                <div class="col border rounded">                    
                    
                    <?php

                        $id = [
                            'class' => 'form-control w-25',
                            'readonly' => 'readonly'
                            ];

                        $input = [
                            'required' => 'required',
                            'class' => 'form-control'
                            ];

                        $submit = [
                            'class' => 'btn btn-success'
                            
                        ];

                        $row = '<div class="row">';

                        $divID = '<div class="form-group col-md-12 my-3">';
                        $divOpenB = '<div class="form-group col-md-12 my-3">';
                        $divOpen = '<div class="form-group col-md-6 my-3">';
                        $divClose = '</div>';
                        
                        helper('form');

                        echo form_open('cargo/CadastrarCargo');
                        echo '<pre>';
                       
                        echo '<br>';
                        
                        echo form_label('Digite o ID a alterar ', 'TB_CARGO_ID'); 
                        echo form_input('TB_CARGO_ID', $editar['TB_CARGO_ID'], $id);
                    
                        echo form_label('Digite o Cargo ', 'TB_CARGO_NOME'); 
                        echo form_input('TB_CARGO_NOME', $editar['TB_CARGO_NOME'], $input);
                    
                        echo '<br>';
                        echo '<br>';
                        echo form_submit('mysubmit', 'ALTERAR', $submit);
                        echo form_close();
                        ?>                    
                        </div>
        
                        <!-- <div class="col"></div>     -->                 
                    </div>      
            </div>
        
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        
        </body>
        </html>