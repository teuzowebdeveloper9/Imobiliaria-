<?php
// Conexão com o banco de dados
$servername = "localhost"; // ou o endereço do seu servidor de banco de dados
$username = "root";        // seu nome de usuário do banco de dados
$password = "";            // sua senha do banco de dados
$dbname = "imobiliaria";   // nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Pega os dados do banco de dados
$sql = "SELECT * FROM anuncios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Anúncios</title>
    <link rel="stylesheet" href="style.css"> <!-- Aqui você liga o seu CSS -->
</head>
<body>

    <h1>Anúncios de Imóveis</h1>

    <?php
    if ($result->num_rows > 0) {
        // Exibe os dados de cada anúncio
        while($row = $result->fetch_assoc()) {
            echo "<div class='plaquinha'>";
            echo "<h2>" . ucfirst($row['tipo']) . " Imóvel</h2>";
            echo "<p><strong>Nome do Anunciante:</strong> " . $row['nome'] . "</p>";
            echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
            echo "<p><strong>Telefone:</strong> " . $row['telefone'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhum anúncio encontrado!</p>";
    }

    // Fecha a conexão
    $conn->close();
    ?>

</body>
</html>