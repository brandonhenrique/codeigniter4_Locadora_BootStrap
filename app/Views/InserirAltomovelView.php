<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOCADORA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container mt-5">   

            <center><h4 class="text-dark">Cadastrar Automóvel</h4></center>
       
            <div class="row align-items-start">
                
                <div class="col-4"></div>     
                
                <div class="col-4 border rounded">                    
                    
                    <?php

                        $submit = [
                            'class' => 'btn btn-success'                            
                        ];

                        $row = '<div class="row-6">';
                        $divOpenB = '<div class="form-group col-md-12 my-3">';
                        $divOpen = '<div class="form-group col-md-6 my-3">';
                        $divClose = '</div>';

                        helper('form');
                        echo form_open('automovel/cadastrar_carro');
                        echo $row;                     
                        echo $divClose;
                        echo $divOpenB;
                        echo form_label('MARCA       ', 'marca');   
                        echo'<br>';    
                        echo form_input('TB_MARCA_ID', '');                        
                        echo $divClose;
                        echo $divOpenB;
                        echo form_label('MODELO      ', 'modelo');
                        echo'<br>'; 
                        echo form_input('TB_MODELO_ID', '');
                        echo $divClose;
                        echo $divOpenB;                    
                        echo form_label('AUTOMÓVEL   ', 'nome');
                        echo'<br>'; 
                        echo form_input('TB_AUTOMOVEL_NOME', '');
                        echo $divClose;
                        echo $divOpenB;
                        echo form_label('ANO/MODELO  ', 'anoFab');
                        echo'<br>'; 
                        echo form_input('TB_AUTOMOVEL_ANO_FAB', '');
                        echo $divClose;
                        echo $divOpenB;
                        echo form_label('COR         ',  'cor');
                        echo'<br>'; 
                        echo form_input('TB_AUTOMOVEL_COR', '');
                        echo $divClose;
                        echo $divOpenB;
                        echo form_label('KM ATUAL    ', 'km');
                        echo'<br>'; 
                        echo form_input('TB_AUTOMOVEL_KM', '');
                        echo $divClose;
                        echo $divOpenB;
                        echo form_label('VALOR       ', 'valor');
                        echo'<br>'; 
                        echo form_input('TB_AUTOMOVEL_VALOR_D', '');
                        echo $divClose;
                        echo $divOpenB;
                        echo form_label('STATUS      ', 'status');
                        echo'<br>'; 
                        echo form_input('TB_AUTOMOVEL_STATUS', '');                    
                        echo $divClose;
                        echo $divOpenB;
                        echo form_submit('mysubmit', 'INSERIR', $submit);
                        echo $divClose;
                        echo $divClose;
                        echo form_close();

                    ?>
                    
                </div>

                <div class="col-4"></div>    
                 
            </div>   
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
