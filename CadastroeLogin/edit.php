<?php

if(!empty($_GET['id']))
{

    include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
            $nome = $user_data['nome'];
            $senha = $user_data['senha'];
            $email = $user_data['email'];
            $telefone = $user_data['telefone'];
            $sexo = $user_data['sexo'];
            $data_nasc = $user_data['data_nasc'];
            $cidade = $user_data['cidade'];
            $estado = $user_data['estado'];
            $endereco = $user_data['endereco'];
        }
    }
    else
    {
        header('Location: sistema.php');
    }
}
else
{
    header('Location: sistema.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de dados</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(46, 182, 44), rgb(171, 224, 152));

        }
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.65);
            padding: 15px;
            border-radius: 15px;
            width: 30%;
            color: white;
        }
        fieldset{
            border: 4px solid green;
        }
        legend{
            border: 1px solid dark;
            padding: 10px;
            text-align: center;
            background-color: black;
            color: white;
            border-radius: 8px;

        }
        .inputBox{
            position: relative;

        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s; 

        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: #00FF00;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;

        }
        #update{
        
            background-image: linear-gradient(to right, rgb(0,100,0), rgb(34,139,34));
            width: 100%;
            padding: 15px;
            border: none;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #update:hover{
            background: linear-gradient(to right, rgb(46, 182, 44), rgb(171, 224, 152));
        }
    </style>
</head>
<body>
<a href="sistema.php"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="black" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
</svg></a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
            <legend>Formulário de Clientes</legend>
            <br>
            <div class="inputBox">
                <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                <label for="nome" class="labelInput">Nome Completo</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="senha" id="senha" class="inputUser"  value="<?php echo $senha ?>" required>
                <label for="senha" class="labelInput">Senha</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="email" id="email" class="inputUser"  value="<?php echo $email ?>" required>
                <label for="email" class="labelInput">Email</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="tel" name="telefone" id="telefone" class="inputUser"  value="<?php echo $telefone ?>" required>
                <label for="telefone" class="labelInput">Telefone</label>
            </div>
            <br>
            <p>Sexo:</p>
            <input type="radio" id="feminino" name="genero" value="feminino" <?php echo($sexo == 'feminino') ? 'checked' : '' ?> required>
            <label for="feminino">Feminino</label>
            <input type="radio" id="masculino" name="genero" value="masculino" <?php echo($sexo == 'masculino') ? 'checked' : '' ?> required>
            <label for="masculino">Masculino</label>
            <input type="radio" id="outro" name="genero" value="outro" <?php echo($sexo == 'outro') ? 'checked' : '' ?> required>
            <label for="outro">Outro</label>
            <br><br>
            <br>
                <label for="data_nascimento"> <b>Data de nascimento: </b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nasc ?>" required>
            <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade ?>" required>
                    <label for="email" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" value="<?php echo $estado ?>" required>
                    <label for="email" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco ?>" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" name="update" id="update">
            </fieldset>
        </form>
    </div>
</body>
</html>