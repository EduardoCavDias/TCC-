<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="icon" href="imagem/logoK.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katchau - Melhores Periféricos para Gamers e Profissionais</title>
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
    padding: 10px 0;
}

.header-content {
    display: flex;
    align-items: center;
    padding: 5px 0;
    height: auto;
}

.header-logo {
    height: 70px;
    width: auto;
    margin-right: 20px;
    object-fit: contain;
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

/* Carrossel */
.carrossel {
    position: relative;
    max-width: 1200px;
    margin: 20px auto;
    overflow: hidden;
    border-radius: 4px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.slide {
    display: none;
    width: 100%;
    transition: opacity 0.5s ease;
}

.slide.active {
    display: block;
}

.slide img {
    width: 100%;
    height: auto;
    display: block;
}

.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.3s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
    background-color: rgba(0, 0, 0, 0.5);
}

.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

/* Categories */
.categories {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 15px;
    margin: 20px 0;
}

.category-card {
    background-color: white;
    border-radius: 4px;
    padding: 15px;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: transform 0.3s;
}

.category-card:hover {
    transform: translateY(-5px);
}

.category-card img {
    width: 60px;
    height: 60px;
    object-fit: contain;
    margin-bottom: 10px;
}

.category-card h3 {
    font-size: 14px;
    color: var(--secondary);
}

/* Highlights */
.section-title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 30px 0 15px;
}

.section-title h2 {
    font-size: 24px;
    color: var(--secondary);
}

.section-title a {
    color: var(--primary);
    text-decoration: none;
    font-size: 14px;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}

.product-card {
    background-color: white;
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    transition: transform 0.3s;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-image {
    position: relative;
    padding: 20px;
    text-align: center;
    border-bottom: 1px solid #eee;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-image img {
    max-width: 100%;
    max-height: 100%;
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

.buy-button {
    width: 100%;
    background-color: var(--primary);
    color: white;
    border: none;
    padding: 10px;
    border-radius: 4px;
    font-weight: bold;
    cursor: pointer;
    margin-top: 10px;
    transition: background-color 0.3s;
}

.buy-button:hover {
    background-color: #e01a0b;
}

/* Brands */
.brands {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0;
    margin: 30px 0;
    background-color: white;
    border-radius: 4px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.brands img {
    height: 40px;
    opacity: 0.7;
    transition: opacity 0.3s;
}

.brands img:hover {
    opacity: 1;
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
    .categories {
        grid-template-columns: repeat(3, 1fr);
    }
    
    .products-grid {
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
        width: 100%;
    }
    
    .categories {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .products-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .nav-list {
        flex-wrap: wrap;
    }
    
    .nav-list li {
        width: 50%;
        text-align: center;
    }
}

@media (max-width: 576px) {
    .categories {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .products-grid {
        grid-template-columns: 1fr;
    }
    
    .footer-content {
        grid-template-columns: 1fr;
    }
    
    .header-logo {
        height: 40px;
        margin-bottom: 10px;
    }
    
    .brands {
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
    }
    
    .brands img {
        height: 30px;
        margin: 0 10px;
    }
}
    </style>
</head>
<body>
   
    <!-- (Manter todo o cabeçalho existente) -->
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
                <img src="imagem/logo.png" alt="logo" class="header-logo" style="max-height: 700px;" width="200px"  alt="logo">
                <div class="search-bar">
                    <input type="text" placeholder="Buscar produtos, marcas e muito mais...">
                    <button>.<i class="fas fa-search"></i></button>
                </div>
                
                <div class="user-actions">
                    <?php if (isset($_SESSION['usuario_nome'])): ?>
    <a href="#" style="pointer-events: none;">
        <i class="fas fa-user"></i>
        <span>Olá, <?= $_SESSION['usuario_nome'] ?></span>
    </a>
    <a href="php/logout.php">
        <i class="fas fa-sign-out-alt"></i>
        <span>Sair</span>
    </a>
<?php else: ?>
    <a href="login.html">
        <i class="fas fa-user"></i>
        <span>Entrar</span>
    </a>
<?php endif; ?>
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
                <li><a href="mouses.php">MOUSES</a></li>
                <li><a href="tecladp.php"></a></li>
                <li><a href="headset.php">HEADSETS</a></li>
                <li><a href="mousepad.php">MOUSEPADS</a></li>
                <li><a href="cadeira.php">CADEIRAS</a></li>
                <li><a href="monitor.php">MONITORES</a></li>
                <li><a href="monteseupc.html">MONTE SEU PC</a></li>
            </ul>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main class="container">
        
        <!-- Banner -->
        <div class="carrossel">
            <div class="slide">
                <img src="Banner/1.png" alt="Promoção 1">
            </div>
            <div class="slide">
                <img src="Banner/2.png" alt="Promoção 2">
            </div>
            <div class="slide">
                <img src="Banner/3.png" alt="Promoção 3">
            </div>
            <div class="slide">
                <img src="Banner/4.png" alt="Promoção 2">
            </div>
            <div class="slide">
                <img src="Banner/5.png" alt="Promoção 2">
            </div>
            <div class="slide">
                <img src="Banner/6.png" alt="Promoção 2">
            </div>
            <button class="prev">&#10094;</button>
            <button class="next">&#10095;</button>
        </div>
        <script src="carrossel.js"></script>
        <script>
            // Carrossel de banners
            let currentSlide = 0;
            const slides = document.querySelectorAll('.slide');
            const totalSlides = slides.length;
        
            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove('active'));
                slides[index].classList.add('active');
            }
        
            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                showSlide(currentSlide);
            }
        
            function prevSlide() {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                showSlide(currentSlide);
            }
        
            // Iniciar carrossel
            showSlide(currentSlide);
            setInterval(nextSlide, 5000); // Muda a cada 5 segundos
        
            // Botões de navegação
            document.querySelector('.next').addEventListener('click', nextSlide);
            document.querySelector('.prev').addEventListener('click', prevSlide);
        </script>
        <!-- Categories -->
        <section class="categories">
            <div class="category-card">
                <img src="https://m.media-amazon.com/images/I/61mpMH5TzkL._AC_SL1500_.jpg"  alt="Mouse">
                <h3>Mouses</h3>
            </div>
            <div class="category-card">
                <img src="https://minipreco.vtexassets.com/arquivos/ids/181847/544dda9b-5637-47c0-9182-ff44f32af282.jpg?v=638224597976700000" alt="Teclado">
                <h3>Teclados</h3>
            </div>
            <div class="category-card">
                <img src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/dell-client-products/peripherals/headphones/aw-pro-wireless-headset/media-gallery/lunar-light/headset-aw-pro-wh-gallery-4.psd?fmt=pjpg&pscan=auto&scl=1&wid=2796&hei=3573&qlt=100,1&resMode=sharp2&size=2796,3573&chrss=full&imwidth=5000" alt="Headset">
                <h3>Headsets</h3>
            </div>
            <div class="category-card">
                <img src="https://lojaibyte.vteximg.com.br/arquivos/ids/193861-1200-1200/mousepad-gamer-logitech-powerplay-rgb-medio-320x275mm--carregamento-sem-fio-943-000208-1.jpg?v=637304363792770000" alt="Mousepad">
                <h3>Mousepads</h3>
            </div>
            <div class="category-card">
                <img src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/dell-client-products/peripherals/monitors/s-series/s2725h/pdp/monitor-s2725h-pdp-module-hero.psd?fmt=jpg&wid=3000&hei=2063" alt="Monitor">
                <h3>Monitores</h3>
            </div>
            <div class="category-card">
                <img src="https://gazin-images.gazin.com.br/0Vy-nhZjZUebkoiNcLIMjJ3usVQ=/1920x/filters:format(webp):quality(75)/https://gazin-images.gazin.com.br/WUlGQFcstNpl4cuXlkLv8z8YkV4=/filters:format(webp):quality(75)/https://gazin-marketplace.s3.amazonaws.com/midias/imagens/2024/10/cadeira-gamer-xtreme-gamer-zone-enconsto-reclinavel-apoio-de-braco-162410391441.jpg" alt="Cadeira">
                <h3>Cadeiras</h3>
            </div>
        </section>
        
      <!-- Ofertas -->
<section>
    <div class="section-title">
        <h2>OFERTAS IMPERDÍVEIS</h2>
        <a href="#">VER TODAS</a>
    </div>
    
    <div class="products-grid">
        <?php
        $sql = "SELECT * FROM produtos WHERE categoria='oferta' ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($produto = $result->fetch_assoc()) {
                $id = $produto['id'];
                $nome = $produto['nome'];
                $imagem = $produto['imagem'];
                $preco = number_format($produto['preco'], 2, ',', '.');
                $preco_antigo = !empty($produto['preco_antigo']) ? number_format($produto['preco_antigo'], 2, ',', '.') : null;
                $desconto = !empty($produto['desconto']) ? $produto['desconto'] : null;
                $parcelas = !empty($produto['parcelas']) ? $produto['parcelas'] : null;

                echo '<div class="product-card">';
                echo '<a href="produto-detalhes.php?id='.$id.'" class="product-link">';
                echo '<div class="product-image">';
                if ($desconto) echo '<span class="discount-badge">-'.$desconto.'%</span>';
                echo '<img src="'.$imagem.'" alt="'.$nome.'">';
                echo '</div>';
                echo '<div class="product-info">';
                echo '<h3 class="product-title">'.$nome.'</h3>';
                echo '<div class="product-price">';
                echo '<span class="current-price">R$ '.$preco.'</span>';
                if ($preco_antigo) echo '<span class="original-price">R$ '.$preco_antigo.'</span>';
                echo '</div>';
                if ($parcelas) echo '<div class="installments">'.$parcelas.'</div>';
                echo '<button class="buy-button">COMPRAR</button>';
                echo '</div></a></div>';
            }
        } else {
            echo "Nenhum produto encontrado.";
        }
        ?>
    </div>
</section>

        
       <!-- Mais Vendidos -->
<section>
    <div class="section-title">
        <h2>MAIS VENDIDOS</h2>
        <a href="#">VER TODOS</a>
    </div>
    
    <div class="products-grid">
        <?php
        $sql = "SELECT * FROM produtos WHERE categoria='mais_vendidos' ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($produto = $result->fetch_assoc()) {
                $id = $produto['id'];
                $nome = $produto['nome'];
                $imagem = $produto['imagem'];
                $preco = number_format($produto['preco'], 2, ',', '.');
                $preco_antigo = !empty($produto['preco_antigo']) ? number_format($produto['preco_antigo'], 2, ',', '.') : null;
                $desconto = !empty($produto['desconto']) ? $produto['desconto'] : null;
                $parcelas = !empty($produto['parcelas']) ? $produto['parcelas'] : null;

                echo '<div class="product-card">';
                echo '<a href="produto-detalhes.php?id='.$id.'" class="product-link">';
                echo '<div class="product-image">';
                if ($desconto) echo '<span class="discount-badge">-'.$desconto.'%</span>';
                echo '<img src="'.$imagem.'" alt="'.$nome.'">';
                echo '</div>';
                echo '<div class="product-info">';
                echo '<h3 class="product-title">'.$nome.'</h3>';
                echo '<div class="product-price">';
                echo '<span class="current-price">R$ '.$preco.'</span>';
                if ($preco_antigo) echo '<span class="original-price">R$ '.$preco_antigo.'</span>';
                echo '</div>';
                if ($parcelas) echo '<div class="installments">'.$parcelas.'</div>';
                echo '<button class="buy-button">COMPRAR</button>';
                echo '</div></a></div>';
            }
        } else {
            echo "Nenhum produto encontrado.";
        }
        ?>
    </div>
</section>

       <!-- Cadeiras Gamer -->
<section>
    <div class="section-title">
        <h2>CADEIRAS GAMER</h2>
        <a href="#">VER TODAS</a>
    </div>
    
    <div class="products-grid">
        <?php
        $sql = "SELECT * FROM produtos WHERE categoria='cadeira' ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($produto = $result->fetch_assoc()) {
                $id = $produto['id'];
                $nome = $produto['nome'];
                $imagem = $produto['imagem'];
                $preco = number_format($produto['preco'], 2, ',', '.');
                $preco_antigo = !empty($produto['preco_antigo']) ? number_format($produto['preco_antigo'], 2, ',', '.') : null;
                $desconto = !empty($produto['desconto']) ? $produto['desconto'] : null;
                $parcelas = !empty($produto['parcelas']) ? $produto['parcelas'] : null;

                echo '<div class="product-card">';
                echo '<a href="produto-detalhes.php?id='.$id.'" class="product-link">';
                echo '<div class="product-image">';
                if ($desconto) echo '<span class="discount-badge">-'.$desconto.'%</span>';
                echo '<img src="'.$imagem.'" alt="'.$nome.'">';
                echo '</div>';
                echo '<div class="product-info">';
                echo '<h3 class="product-title">'.$nome.'</h3>';
                echo '<div class="product-price">';
                echo '<span class="current-price">R$ '.$preco.'</span>';
                if ($preco_antigo) echo '<span class="original-price">R$ '.$preco_antigo.'</span>';
                echo '</div>';
                if ($parcelas) echo '<div class="installments">'.$parcelas.'</div>';
                echo '<button class="buy-button">COMPRAR</button>';
                echo '</div></a></div>';
            }
        } else {
            echo "Nenhum produto encontrado.";
        }
        ?>
    </div>
</section>
        
        <!-- Marcas -->
        <section class="brands">
            <img src="https://logodownload.org/wp-content/uploads/2018/03/logitech-logo-2.png" alt="Logitech">
            <img src="https://cdn.worldvectorlogo.com/logos/razer.svg" alt="Razer">
            <img src="https://logodownload.org/wp-content/uploads/2017/10/hyper-x-logo.png" alt="HyperX">
            <img src="https://logodownload.org/wp-content/uploads/2020/03/redragon-logo-0.png" alt="Redragon">
            <img src="https://cwsmgmt.corsair.com/press/CORSAIRLogo2020_stack_K.png" alt="Corsair">
            <img src="https://upload.wikimedia.org/wikipedia/commons/d/de/AsusTek-black-logo.png" alt="Asus">
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
                        <a href="#" style="color: white;"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>NEWSLETTER</h3>
                    <p>Cadastre-se para receber nossas promoções</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Seu e-mail">
                        <button type="submit">CADASTRAR</button>
                    </form>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 Katchau - Todos os direitos reservados.</p>
                <p>CNPJ: 12.345.678/0001-99 - Endereço: Rua Exemplo, 123 - São Paulo/SP</p>
            </div>
        </div>
    </footer>
    
    <!-- Botão de Voltar ao Topo -->
    <button id="back-to-top" title="Voltar ao topo">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <script>
        // Botão de voltar ao topo
        const backToTopButton = document.getElementById('back-to-top');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.style.display = 'block';
            } else {
                backToTopButton.style.display = 'none';
            }
        });
        
        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Atualizar contador do carrinho
    function atualizarContadorCarrinho() {
        const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
        const totalItens = carrinho.reduce((total, item) => total + item.quantidade, 0);
        document.querySelectorAll('.cart-count').forEach(el => {
            el.textContent = totalItens;
        });
    }
    
    // Adicionar evento aos botões "COMPRAR"
    document.querySelectorAll('.buy-button').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const productCard = this.closest('.product-card');
            const productId = parseInt(productCard.querySelector('a').getAttribute('href').split('id=')[1]);
            const productTitle = productCard.querySelector('.product-title').textContent;
            const productPrice = parseFloat(productCard.querySelector('.current-price').textContent.replace('R$ ', '').replace(',', '.'));
            const productImage = productCard.querySelector('img').src;
            
            // Obter carrinho existente ou criar um novo
            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            
            // Verificar se o produto já está no carrinho
            const itemExistente = carrinho.find(item => item.id === productId);
            
            if (itemExistente) {
                // Atualizar quantidade se o produto já existir
                itemExistente.quantidade += 1;
            } else {
                // Adicionar novo item ao carrinho
                carrinho.push({
                    id: productId,
                    nome: productTitle,
                    preco: productPrice,
                    imagem: productImage,
                    quantidade: 1
                });
            }
            
            // Salvar no localStorage
            localStorage.setItem('carrinho', JSON.stringify(carrinho));
            
            // Atualizar contador
            atualizarContadorCarrinho();
            
            // Feedback para o usuário
            alert(`${productTitle} adicionado ao carrinho!`);
        });
    });
    
    // Atualizar contador ao carregar a página
    atualizarContadorCarrinho();
});
</script>
<script>
document.querySelectorAll('.buy-button').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        
        const productCard = this.closest('.product-card');
        const product = {
            id: parseInt(productCard.querySelector('a').href.split('id=')[1]),
            name: productCard.querySelector('.product-title').textContent,
            price: parseFloat(productCard.querySelector('.current-price').textContent
                .replace('R$ ', '').replace(',', '.')),
            image: productCard.querySelector('img').src,
            quantity: 1
        };
        
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const existingItem = cart.find(item => item.id === product.id);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push(product);
        }
        
        localStorage.setItem('cart', JSON.stringify(cart));
        
        // Atualiza o contador
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        document.querySelectorAll('.cart-count').forEach(el => {
            el.textContent = totalItems;
        });
        
        alert(`${product.name} adicionado ao carrinho!`);
    });
});
</script>
</body>
</html>