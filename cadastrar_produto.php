<?php
session_start();
require_once "conexao.php"; // já cria o $conn

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitização básica
    $nome = trim($_POST['nome'] ?? '');
    $preco = floatval($_POST['preco'] ?? 0);
    $preco_parcelado = $_POST['preco_parcelado'] !== '' ? floatval($_POST['preco_parcelado']) : null;
    $parcelas = trim($_POST['parcelas'] ?? '');
    $desconto = $_POST['desconto'] !== '' ? intval($_POST['desconto']) : null;
    $descricao = trim($_POST['descricao'] ?? '');
    $estoque = intval($_POST['estoque'] ?? 0);
    $marca = trim($_POST['marca'] ?? '');
    $modelo = trim($_POST['modelo'] ?? '');
    $peso = trim($_POST['peso'] ?? '');
    $destaque = isset($_POST['destaque']) ? 1 : 0;
    $preco_original = $_POST['preco_original'] !== '' ? floatval($_POST['preco_original']) : null;

    // Categorias múltiplas
    $categoriaArray = $_POST['categoria'] ?? ['outros'];
    $categoria = implode(',', $categoriaArray); // ex.: "mouse,oferta"

    // Imagem principal (opcional)
    $imagem_principal = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/imagens/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $nomeArq = 'p_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . strtolower($ext);
        $destino = $uploadDir . $nomeArq;
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
            $imagem_principal = 'imagens/' . $nomeArq;
        }
    }

    // Inserção do produto
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

        // Upload de múltiplas imagens (galeria)
        if (isset($_FILES['imagens'])) {
            $uploadDir = __DIR__ . '/imagens/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

            foreach ($_FILES['imagens']['tmp_name'] as $key => $tmp_name) {
                if ($_FILES['imagens']['error'][$key] === UPLOAD_ERR_OK) {
                    $ext = pathinfo($_FILES['imagens']['name'][$key], PATHINFO_EXTENSION);
                    $nomeImg = 'g_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . strtolower($ext);
                    $destino = $uploadDir . $nomeImg;
                    if (move_uploaded_file($tmp_name, $destino)) {
                        $imagemPath = 'imagens/' . $nomeImg;
                        $stmtImg = $conn->prepare("INSERT INTO produto_imagens (produto_id, imagem) VALUES (?, ?)");
                        $stmtImg->bind_param("is", $produto_id, $imagemPath);
                        $stmtImg->execute();
                    }
                }
            }
        }

        $msg = "<p style='color:green;'>✅ Produto cadastrado com sucesso! <a href='inicio.php'>Ver na página inicial</a></p>";
    } else {
        $msg = "<p style='color:red;'>Erro ao cadastrar: " . htmlspecialchars($stmt->error) . "</p>";
    }
}
?>

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Cadastrar Produto - Katchau</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{font-family:Arial,Helvetica,sans-serif;background:#0f1226;color:#e9ecf5;margin:0;padding:2rem}
.container{max-width:980px;margin:0 auto;background:#181b3a;padding:1.5rem;border-radius:16px}
h1{margin-top:0}
.grid{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}
.grid label{display:block;font-weight:600;margin:.25rem 0}
.grid input,.grid textarea,.grid select{width:100%;padding:.6rem;border-radius:10px;border:1px solid #2a2f66;background:#0f1226;color:#e9ecf5}
.grid textarea{min-height:90px}
.actions{margin-top:1rem;display:flex;gap:.75rem}
button{padding:.7rem 1.2rem;border:0;border-radius:10px;background:#7b5cff;color:#fff;font-weight:700;cursor:pointer}
.note{opacity:.85}
</style>
</head>
<body>
<div class="container">
    <h1>Cadastrar Produto</h1>
    <?php if (!empty($msg)) echo $msg; ?>
    <form method="post" enctype="multipart/form-data" class="grid">
        <div>
            <label>Nome</label>
            <input type="text" name="nome" required>
        </div>
        <div>
            <label>Preço (R$)</label>
            <input type="number" name="preco" step="0.01" min="0" required>
        </div>
        <div>
            <label>Preço Parcelado (R$)</label>
            <input type="number" name="preco_parcelado" step="0.01" min="0">
        </div>
        <div>
            <label>Parcelas (ex.: 10x de 99,90)</label>
            <input type="text" name="parcelas">
        </div>
        <div>
            <label>Desconto (%)</label>
            <input type="number" name="desconto" min="0" max="90">
        </div>
        <div>
            <label>Preço Original (R$)</label>
            <input type="number" name="preco_original" step="0.01" min="0">
        </div>
        <div style="grid-column:1 / -1">
            <label>Descrição</label>
            <textarea name="descricao"></textarea>
        </div>
        <div>
            <label>Categoria</label>
            <select name="categoria[]" multiple size="6">
                <option value="oferta">Oferta</option>
                <option value="mais_vendidos">Mais Vendidos</option>
                <option value="cadeira">Cadeira Gamer</option>
                <option value="teclado">Teclado</option>
                <option value="mouse">Mouse</option>
                <option value="monitor">Monitor</option>
                <option value="gabinete">Gabinete</option>
                <option value="placa_de_video">Placa de vídeo</option>
                <option value="headset">Headset</option>
                <option value="mousepad">Mousepad</option>
                <option value="outros">Outros</option>
            </select>
            <small>Segure Ctrl (Windows) ou Cmd (Mac) para selecionar múltiplas categorias.</small>
        </div>
        <div>
            <label>Estoque</label>
            <input type="number" name="estoque" min="0" value="1" required>
        </div>
        <div>
            <label>Marca</label>
            <input type="text" name="marca">
        </div>
        <div>
            <label>Modelo</label>
            <input type="text" name="modelo">
        </div>
        <div>
            <label>Peso</label>
            <input type="text" name="peso" placeholder="ex.: 1.2 kg">
        </div>
        <div>
            <label>Imagem principal</label>
            <input type="file" name="imagem" accept="image/*">
        </div>
        <div>
            <label>Galeria (múltiplas imagens)</label>
            <input type="file" name="imagens[]" accept="image/*" multiple>
        </div>
        <div style="display:flex;align-items:center;gap:.5rem">
            <input type="checkbox" id="destaque" name="destaque">
            <label for="destaque" style="margin:0;">Exibir em destaque</label>
        </div>

        <div class="actions" style="grid-column:1 / -1">
            <button type="submit">Salvar Produto</button>
            <a href="inicio.php" style="color:#fff;text-decoration:none;padding:.7rem 1rem;background:#2a2f66;border-radius:10px">Voltar</a>
        </div>
        <p class="note" style="grid-column:1 / -1">Após salvar, o produto aparecerá nas seções da página inicial de acordo com a(s) categoria(s) e/ou destaque.</p>
    </form>
</div>
</body>
</html>
