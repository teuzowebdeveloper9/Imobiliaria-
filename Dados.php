<?php
$servername = "localhost"; // ou o endereço do seu servidor de banco de dados
$username = "root";        // seu nome de usuário do banco de dados
$password = "";            // sua senha do banco de dados
$dbname = "imobiliaria";   // nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os dados do formulário
$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

// Prepara e executa a consulta SQL para inserir os dados
$sql = "INSERT INTO anuncios (tipo, nome, email, telefone) 
        VALUES ('$tipo', '$nome', '$email', '$telefone')";

if ($conn->query($sql) === TRUE) {
    echo "Dados enviados com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fecha a conexão
$conn->close();
?>