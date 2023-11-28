<?php

if(isset($_POST['submit']))
{
    include_once('config.php');
    $first_name = $_POST['first_name'];
    $senha = $_POST['password'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $last_name = $_POST['last_name'];


    $result = mysqli_query($conexao, "INSERT INTO user(first_name,password,email,mobile,address,last_name) 
    VALUES ('$first_name','$senha','$email','$mobile','$address','$last_name')");
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>
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
            padding: 20px;
            border-radius: 17px;
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
        #submit{
            background-image: linear-gradient(to right, rgb(0,100,0), rgb(34,139,34));
            width: 100%;
            padding: 15px;
            border: none;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background: linear-gradient(to right, rgb(46, 182, 44), rgb(171, 224, 152));
        }
    </style>
</head>
<body>
<a href="sistema.php"><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="black" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
</svg></a>
    <div class="box">
        <form action="formulario2.php" method="POST">
            <fieldset>
            <legend>Formulário de Clientes</legend>
            <br>
            <div class="inputBox">
                <input type="text" name="first_name" id="first_name" class="inputUser" required>
                <label for="first_name" class="labelInput">Primeiro Nome</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="last_name" id="last_name" class="inputUser" required>
                <label for="last_name" class="labelInput">Último Nome</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="email" id="email" class="inputUser" required>
                <label for="email" class="labelInput">Email</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="password" id="password" class="inputUser" required>
                <label for="password" class="labelInput">Senha</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="tel" name="mobile" id="mobile" class="inputUser" required>
                <label for="mobile" class="labelInput">Telefone</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="address" id="address" class="inputUser" required>
                <label for="address" class="labelInput">Endereço</label>
            </div>

                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>