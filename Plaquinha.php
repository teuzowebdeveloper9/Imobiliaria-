<?php
// Conectar ao banco de dados
$host = 'localhost';
$dbname = 'seu_banco';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Pegando o ID da URL
    $id = $_GET['id'];

    // Consultando o anúncio no banco de dados
    $sql = "SELECT * FROM anuncios WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    $anuncio = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="Plaquinha.css"
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plaquinha do Anúncio</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Cadastro.css">
</head>
<body>
    <div class="plaquinha">
        <h1>Anúncio de Imóvel</h1>
        <div class="informacoes">
            <p><strong>Tipo de Imóvel:</strong> <?= htmlspecialchars($anuncio['tipo_imovel']); ?></p>
            <p><strong>Nome do Anunciante:</strong> <?= htmlspecialchars($anuncio['nome']); ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($anuncio['email']); ?></p>
            <p><strong>Telefone:</strong> <?= htmlspecialchars($anuncio['telefone']); ?></p>
        </div>
    </div>
</body>
</html>