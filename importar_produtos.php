<?php
session_start();
require_once "conexao.php"; // conexão com o banco

$jsonFile = __DIR__ . '/produtos.json';
$produtos = json_decode(file_get_contents($jsonFile), true);

if (!$produtos) {
    die("Erro ao ler o JSON.");
}

foreach ($produtos as $produto) {
    $nome = $produto['nome'] ?? '';

    // ✅ Verificar se produto já existe
    $check = $conn->prepare("SELECT id FROM produtos WHERE nome = ?");
    $check->bind_param("s", $nome);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "⚠ Produto já cadastrado, pulando: {$nome} <br>";
        continue; // pula para o próximo produto
    }

    // Dados do produto
    $preco = $produto['preco'] ?? 0;
    $desconto = $produto['desconto'] ?? 0;
    $parcelas = $produto['parcelas'] ?? '';
    $preco_parcelado = $produto['preco_parcelado'] ?? 0;
    $preco_original = $produto['preco_original'] ?? 0;
    $descricao = $produto['descricao'] ?? '';
    $imagem_principal = $produto['imagem_principal'] ?? '';
    $categoria = $produto['categoria'] ?? 'outros';
    $estoque = $produto['estoque'] ?? 1;
    $marca = $produto['marca'] ?? '';
    $modelo = $produto['modelo'] ?? '';
    $peso = $produto['peso'] ?? '';
    $destaque = $produto['destaque'] ?? 0;

    // Inserir produto
    $stmt = $conn->prepare("
        INSERT INTO produtos
        (nome, preco, preco_antigo, desconto, parcelas, preco_parcelado, preco_original,
         descricao, imagem, categoria, estoque, marca, modelo, peso, destaque)
        VALUES (?, ?, NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "sdissdsssisssi",
        $nome, $preco, $desconto, $parcelas, $preco_parcelado, $preco_original,
        $descricao, $imagem_principal, $categoria, $estoque,
        $marca, $modelo, $peso, $destaque
    );

    if ($stmt->execute()) {
        $produto_id = $stmt->insert_id;

        // Inserir imagens da galeria
        if (!empty($produto['galeria'])) {
            foreach ($produto['galeria'] as $img) {
                $stmtImg = $conn->prepare("INSERT INTO produto_imagens (produto_id, imagem) VALUES (?, ?)");
                $stmtImg->bind_param("is", $produto_id, $img);
                $stmtImg->execute();
            }
        }

        echo "✅ Produto cadastrado: {$nome} <br>";
    } else {
        echo "❌ Erro ao cadastrar {$nome}: " . htmlspecialchars($stmt->error) . "<br>";
    }
}
?>
