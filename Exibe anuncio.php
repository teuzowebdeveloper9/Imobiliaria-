<?php
// Conectar ao banco de dados
$host = "localhost";
$user = "seu_usuario";
$pass = "sua_senha";
$dbname = "seu_banco_de_dados";

// Criar a conexão
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Buscar os anúncios do banco de dados
$sql = "SELECT tipo_imovel, nome, email, telefone FROM anuncios";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anúncios de Imóveis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Anúncios de Imóveis</h1>

    <?php
    // Exibir os anúncios
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='plaquinha'>";
            echo "<h2>" . ucfirst($row['tipo_imovel']) . " Imóvel</h2>";
            echo "<p><strong>Nome do Anunciante:</strong> " . $row['nome'] . "</p>";
            echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
            echo "<p><strong>Telefone:</strong> " . $row['telefone'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Não há anúncios disponíveis no momento.</p>";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>

</body>
</html>