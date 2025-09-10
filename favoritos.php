<?php
include('php/verifica_login.php');
include('php/conexao.php');

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT p.* FROM favoritos f JOIN produtos p ON f.produto_id = p.id WHERE f.usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="icon" href="imagem/logoK.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Favoritos - Katchau</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #f81f10;
            --secondary: #333333;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #28a745;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
        }
        
        /* Header */
        .top-bar {
            background-color: var(--secondary);
            color: white;
            padding: 8px 0;
            font-size: 14px;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .top-bar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .main-header {
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .main-header {
    background-color: white;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    padding: 10px 0; /* Reduzi o padding vertical */
}

.header-content {
    display: flex;
    align-items: center;
    padding: 5px 0; /* Reduzi o padding */
    height: auto; /* Garante que a altura seja automática */
}

.header-logo {
    height: 70px; /* Tamanho fixo para desktop */
    width: auto;
    margin-right: 20px; /* Reduzi a margem direita */
    object-fit: contain; /* Garante que a imagem mantenha proporções */
}
        .search-bar {
            flex-grow: 1;
            position: relative;
            margin-right: 20px;
        }
        
        .search-bar input {
            width: 100%;
            padding: 12px 20px;
            border: 2px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .search-bar button {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0 20px;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }
        
        .user-actions {
            display: flex;
            align-items: center;
        }
        
        .user-actions a {
            margin-left: 20px;
            color: var(--secondary);
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 12px;
        }
        
        .user-actions i {
            font-size: 20px;
            margin-bottom: 5px;
        }
        
        .cart-count {
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 10px;
            position: absolute;
            top: -5px;
            right: -5px;
        }
        
        /* Navigation */
        .main-nav {
            background-color: var(--secondary);
        }
        
        .nav-list {
            display: flex;
            list-style: none;
        }
        
        .nav-list li {
            position: relative;
        }
        
        .nav-list li a {
            color: white;
            text-decoration: none;
            padding: 12px 15px;
            display: block;
            font-size: 14px;
        }
        
        .nav-list li:hover {
            background-color: var(--primary);
        }
        
        /* Page Title */
        .page-title {
            padding: 30px 0;
            text-align: center;
        }
        
        .page-title h1 {
            font-size: 32px;
            color: var(--secondary);
            margin-bottom: 10px;
        }
        
        .page-title p {
            color: #666;
            font-size: 16px;
        }
        
        /* Favorites Section */
        .favorites-section {
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .favorites-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .favorites-header h2 {
            font-size: 24px;
            color: var(--secondary);
        }
        
        .favorites-count {
            color: #666;
            font-size: 14px;
        }
        
        .favorites-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        
        .favorite-item {
            background-color: white;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            position: relative;
        }
        
        .favorite-item:hover {
            transform: translateY(-5px);
        }
        
        .remove-favorite {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--primary);
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
        }
        
        .product-image {
            position: relative;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }
        
        .product-image img {
            max-width: 100%;
            height: 150px;
            object-fit: contain;
        }
        
        .discount-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: var(--success);
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
        }
        
        .product-info {
            padding: 15px;
        }
        
        .product-title {
            font-size: 14px;
            color: var(--secondary);
            margin-bottom: 10px;
            height: 40px;
            overflow: hidden;
        }
        
        .product-price {
            margin-bottom: 10px;
        }
        
        .current-price {
            font-size: 18px;
            font-weight: bold;
            color: var(--primary);
        }
        
        .original-price {
            font-size: 14px;
            color: #999;
            text-decoration: line-through;
            margin-left: 5px;
        }
        
        .installments {
            font-size: 12px;
            color: #666;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        
        .buy-button {
            flex: 1;
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }
        
        .add-to-cart {
            flex: 1;
            background-color: white;
            color: var(--primary);
            border: 1px solid var(--primary);
            padding: 10px;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }
        
        .empty-favorites {
            text-align: center;
            padding: 50px 0;
        }
        
        .empty-favorites i {
            font-size: 50px;
            color: #ccc;
            margin-bottom: 20px;
        }
        
        .empty-favorites h3 {
            font-size: 24px;
            color: var(--secondary);
            margin-bottom: 15px;
        }
        
        .empty-favorites p {
            color: #666;
            margin-bottom: 20px;
        }
        
        .continue-shopping {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 4px;
            font-weight: bold;
        }
        
        /* Footer */
        .footer {
            background-color: var(--secondary);
            color: white;
            padding: 40px 0 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .footer-column h3 {
            font-size: 18px;
            margin-bottom: 15px;
            color: var(--primary);
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column ul li a {
            color: #ddd;
            text-decoration: none;
            font-size: 14px;
        }
        
        .footer-column ul li a:hover {
            color: var(--primary);
        }
        
        .payment-methods img {
            height: 30px;
            margin-right: 5px;
            margin-bottom: 5px;
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #444;
            font-size: 12px;
            color: #aaa;
        }
        
        /* Responsivo */
        @media (max-width: 992px) {
            .favorites-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-wrap: wrap;
            }
            
            .header-content img {
             height: 50px; 
             margin-right: 30px;
            }
            .header-logo {
             height: 50px;
             width: auto;
             margin-right: 30px;
            }
            .search-bar {
                order: 3;
                margin: 15px 0;
            }
            
            .favorites-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 576px) {
            .favorites-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
        }
        @media (max-width: 768px) {
    .header-logo {
        height: 40px;
        margin-bottom: 10px;
    }
}
    </style>
</head>
<body>
   
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                <div>Atendimento: (11) 1234-5678 | Karchau@kat.org.br</div>
                <div>
                    <a href="#" style="color: white; text-decoration: none; margin-right: 15px;">
                        <i class="fas fa-map-marker-alt"></i> Rastrear Pedido
                    </a>
                    <a href="#" style="color: white; text-decoration: none;">
                        <i class="fas fa-user"></i> Minha Conta
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Header -->
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <img src="imagem/logo.png" alt="logo" class="header-logo" style="max-height: 700px;" width="200px">
                <div class="search-bar">
                    <input type="text" placeholder="Buscar produtos, marcas e muito mais...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                
                <div class="user-actions">
                    <a href="cad.html">
                        <i class="fas fa-user"></i>
                        <span>Minha Conta</span>
                    </a>
                    <a href="favoritos.php">
                        <i class="fas fa-heart"></i>
                        <span>Favoritos</span>
                    </a>
                    <a href="car.html" style="position: relative;">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Carrinho</span>
                        <span class="cart-count">3</span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Navigation -->
    <nav class="main-nav">
        <div class="container">
            <ul class="nav-list">
                <li><a href="#"><i class="fas fa-bars"></i> TODAS AS CATEGORIAS</a></li>
                <li><a href="#">OFERTAS</a></li>
                <li><a href="#">MOUSES</a></li>
                <li><a href="#">TECLADOS</a></li>
                <li><a href="#">HEADSETS</a></li>
                <li><a href="#">MOUSEPADS</a></li>
                <li><a href="#">CADEIRAS</a></li>
                <li><a href="#">MONITORES</a></li>
            </ul>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main class="container">
        <!-- Page Title -->
        <section class="page-title">
            <h1>Meus Favoritos</h1>
            <p>Veja todos os produtos que você salvou para comprar depois</p>
        </section>
        
        <!-- Favorites Section -->
        <section class="favorites-section">
            <div class="favorites-header">
                <h2>Produtos Favoritados</h2>
                <div class="favorites-count">3 itens</div>
            </div>
            
            
<div class="favorites-grid">
<?php while ($produto = $result->fetch_assoc()): ?>
  <div class="favorite-item">
    <button class="remove-favorite" onclick="removerFavorito(<?= $produto['id'] ?>)">
      <i class="fas fa-times"></i>
    </button>
    <div class="product-image">
      <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>">
    </div>
    <div class="product-info">
      <h3 class="product-title"><?= $produto['nome'] ?></h3>
      <div class="product-price">
        <span class="current-price">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></span>
      </div>
      <div class="installments">10x sem juros</div>
      <div class="action-buttons">
        <button class="buy-button">COMPRAR</button>
        <button class="add-to-cart">CARRINHO</button>
      </div>
    </div>
  </div>
<?php endwhile; ?>
</div>

            <!--
            <div class="empty-favorites">
                <i class="far fa-heart"></i>
                <h3>Sua lista de favoritos está vazia</h3>
                <p>Adicione produtos aos seus favoritos para encontrá-los facilmente depois</p>
                <a href="index.html" class="continue-shopping">CONTINUAR COMPRANDO</a>
            </div>
            -->
        </section>
    </main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>INSTITUCIONAL</h3>
                    <ul>
                        <li><a href="#">Quem Somos</a></li>
                        <li><a href="#">Nossas Lojas</a></li>
                        <li><a href="#">Política de Privacidade</a></li>
                        <li><a href="#">Trabalhe Conosco</a></li>
                        <li><a href="#">Programa de Afiliados</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>ATENDIMENTO</h3>
                    <ul>
                        <li><a href="#">Central de Atendimento</a></li>
                        <li><a href="#">Prazos e Entregas</a></li>
                        <li><a href="#">Trocas e Devoluções</a></li>
                        <li><a href="#">Dúvidas Frequentes</a></li>
                        <li><a href="#">Formas de Pagamento</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>MINHA CONTA</h3>
                    <ul>
                        <li><a href="#">Meus Pedidos</a></li>
                        <li><a href="#">Meus Dados</a></li>
                        <li><a href="#">Lista de Desejos</a></li>
                        <li><a href="#">Login/Cadastro</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>FORMAS DE PAGAMENTO</h3>
                    <div class="payment-methods">
                        <img src="https://images.seeklogo.com/logo-png/14/2/visa-logo-png_seeklogo-149692.png" alt="Visa">
                        <img src="https://play-lh.googleusercontent.com/ISgtba6LRnEs5iuHt-9d8lpioh8M3UFO5ZtoDjPPpf9l1zWr_L4GH3ABcN9WXgR3YQ8" alt="Mastercard">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-U8tK4EfgFz0FAX0yYoXfE05yWfq2tqNLQw&s" alt="American Express">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/da/Elo_card_association_logo_-_black_text.svg/1200px-Elo_card_association_logo_-_black_text.svg.png" alt="Elo">
                        <img src="https://logodownload.org/wp-content/uploads/2019/09/boleto-logo-0.png" alt="Boleto">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo%E2%80%94pix_powered_by_Banco_Central_%28Brazil%2C_2020%29.svg/2560px-Logo%E2%80%94pix_powered_by_Banco_Central_%28Brazil%2C_2020%29.svg.png" alt="Pix">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Hipercard_logo.svg/2000px-Hipercard_logo.svg.png" alt="Hipercard">
                        <img src="https://via.placeholder.com/40x25" alt="Diners Club">
                    </div>
                    
                    <h3 style="margin-top: 20px;">REDES SOCIAIS</h3>
                    <div style="display: flex; gap: 10px;">
                        <a href="#" style="color: white;"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" style="color: white;"><i class="fab fa-instagram"></i></a>
                        <a href="#" style="color: white;"><i class="fab fa-twitter"></i></a>
                        <a href="#" style="color: white;"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>KATCHAU COMÉRCIO ELETRÔNICO LTDA - CNPJ: 12.345.678/0001-99 - Todos os direitos reservados - 2025</p>
                <p>Endereço: Rua Exemplo, 123 - Centro, Curitiba/PR - CEP: 01234-567</p>
            </div>
        </div>
    </footer>

<script>
function removerFavorito(produtoId) {
    if (confirm("Remover este produto dos favoritos?")) {
        fetch('php/remover_favorito.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'produto_id=' + produtoId
        }).then(res => res.text()).then(res => {
            if (res === 'removido') {
                location.reload();
            } else {
                alert("Erro ao remover favorito");
            }
        });
    }
}
</script>

</body>
</html>