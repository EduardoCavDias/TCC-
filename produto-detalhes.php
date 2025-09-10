<?php
// produto-detalhes_fix.php
$conn = new mysqli("localhost", "root", "", "katchau_db");
if ($conn->connect_error) { die("Erro de conexão: " . $conn->connect_error); }

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) { die("Produto inválido."); }

// Produto
$stmt = $conn->prepare("SELECT id, nome, preco, preco_antigo, desconto, parcelas, preco_parcelado, preco_original, descricao, imagem, categoria, estoque, marca, modelo, peso FROM produtos WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$produto = $stmt->get_result()->fetch_assoc();
if (!$produto) { die("Produto não encontrado."); }

// Galeria
$imgs = [];
$res = $conn->query("SELECT imagem FROM produto_imagens WHERE produto_id = " . $id);
while ($r = $res->fetch_assoc()) { $imgs[] = $r['imagem']; }

// Fontes de preço
$fontes = [];
$res2 = $conn->query("SELECT id, loja, url, ultimo_preco, atualizado_em FROM price_sources WHERE produto_id = " . $id . " ORDER BY loja");
while ($r = $res2->fetch_assoc()) { $fontes[] = $r; }
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title><?php echo htmlspecialchars($produto['nome']); ?> - Katchau</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{font-family:Arial,Helvetica,sans-serif;background:#0f1226;color:#e9ecf5;margin:0}
.wrap{max-width:1100px;margin:0 auto;padding:1rem 1.5rem}
.top{display:grid;grid-template-columns:1fr 1fr;gap:18px}
.gallery{background:#181b3a;border-radius:14px;padding:10px}
.gallery img{width:100%;border-radius:10px;background:#0f1226;display:block;margin-bottom:8px}
.info{background:#181b3a;border-radius:14px;padding:16px}
.price .old{text-decoration:line-through;opacity:.7;margin-left:.6rem}
.badge{display:inline-block;background:#2a2f66;padding:.2rem .5rem;border-radius:8px;margin-left:.5rem}
.tabs{margin-top:1rem}
.table{width:100%;border-collapse:collapse;margin-top:.5rem}
.table th,.table td{padding:.6rem;border-bottom:1px solid #2a2f66;text-align:left}
.note{opacity:.85}
a{color:#9fb6ff}
@media (max-width:900px){.top{grid-template-columns:1fr}}
</style>
</head>
<body>
<div class="wrap">
    <a href="inicio.php" style="display:inline-block;margin-bottom:.75rem">&larr; Voltar</a>
    <div class="top">
        <div class="gallery">
            <?php
            $principal = htmlspecialchars($produto['imagem'] ?: 'imagens/placeholder.png');
            echo "<img src='{$principal}' alt='".htmlspecialchars($produto['nome'])."'>";
            foreach ($imgs as $img) {
                $src = htmlspecialchars($img);
                echo "<img src='{$src}' alt='Foto do produto'>";
            }
            ?>
        </div>
        <div class="info">
            <h1 style="margin-top:0"><?php echo htmlspecialchars($produto['nome']); ?></h1>
            <div class="price">
                <strong>R$ <?php echo number_format((float)$produto['preco'], 2, ',', '.'); ?></strong>
                <?php if ($produto['preco_antigo'] !== null): ?>
                    <span class="old">R$ <?php echo number_format((float)$produto['preco_antigo'], 2, ',', '.'); ?></span>
                <?php endif; ?>
                <?php if (!empty($produto['parcelas'])): ?>
                    <span class="badge"><?php echo htmlspecialchars($produto['parcelas']); ?></span>
                <?php endif; ?>
            </div>
            <?php if (!empty($produto['marca'])): ?>
                <p class="note">Marca: <strong><?php echo htmlspecialchars($produto['marca']); ?></strong> <?php if(!empty($produto['modelo'])) echo "• Modelo: <strong>".htmlspecialchars($produto['modelo'])."</strong>"; ?></p>
            <?php endif; ?>
            <?php if (!empty($produto['estoque'])): ?>
                <p class="note">Estoque: <?php echo (int)$produto['estoque']; ?> unidades</p>
            <?php endif; ?>
            <div class="actions" style="margin-top:10px">
                <button style="background:#7b5cff;color:#fff;border:0;border-radius:10px;padding:.7rem 1rem;cursor:pointer">Comprar</button>
                <button style="background:#2a2f66;color:#fff;border:0;border-radius:10px;padding:.7rem 1rem;cursor:pointer">Adicionar ao carrinho</button>
            </div>
        </div>
    </div>

    <div class="tabs">
        <h2>Descrição</h2>
        <p><?php echo nl2br(htmlspecialchars($produto['descricao'] ?? '')); ?></p>
    </div>

    <div class="tabs">
        <h2>Comparar preços em outras lojas</h2>
        <p class="note">Você (admin) pode cadastrar as URLs das páginas do mesmo produto em outras lojas. Futuramente, um robô (cron) pode atualizar os preços automaticamente.</p>
        <table class="table">
            <thead>
                <tr><th>Loja</th><th>Preço</th><th>Última atualização</th><th>Link</th></tr>
            </thead>
            <tbody>
                <?php if (empty($fontes)): ?>
                    <tr><td colspan="4">Nenhuma fonte cadastrada ainda.</td></tr>
                <?php else: foreach ($fontes as $f): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($f['loja']); ?></td>
                        <td><?php echo $f['ultimo_preco'] !== null ? 'R$ ' . number_format((float)$f['ultimo_preco'], 2, ',', '.') : '-'; ?></td>
                        <td><?php echo $f['atualizado_em'] ? date('d/m/Y H:i', strtotime($f['atualizado_em'])) : '-'; ?></td>
                        <td><a href="<?php echo htmlspecialchars($f['url']); ?>" target="_blank" rel="noopener noreferrer">Abrir</a></td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>

        <form method="post" action="salvar_fonte_preco.php" style="margin-top:.5rem;background:#181b3a;padding:10px;border-radius:10px">
            <input type="hidden" name="produto_id" value="<?php echo $id; ?>">
            <label>Loja</label><br>
            <input name="loja" required style="width:220px;padding:.4rem;border-radius:8px;border:1px solid #2a2f66;background:#0f1226;color:#e9ecf5"><br><br>
            <label>URL da página do produto</label><br>
            <input name="url" required style="width:100%;padding:.4rem;border-radius:8px;border:1px solid #2a2f66;background:#0f1226;color:#e9ecf5"><br><br>
            <button type="submit" style="background:#7b5cff;color:#fff;border:0;border-radius:10px;padding:.5rem 1rem;cursor:pointer">Adicionar fonte</button>
        </form>
    </div>
</div>
</body>
</html>