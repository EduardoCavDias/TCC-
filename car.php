<?php
// Arquivo gerado automaticamente: car.php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="icon" href="imagem/logoK.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KATCHAU - Carrinho de Compras</title>
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
        
        /* Header (mantido igual ao tcc.html) */
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
        
        .header-content {
            display: flex;
            align-items: center;
            padding: 15px 0;
        }
        
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: var(--primary);
            margin-right: 30px;
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
        
        /* Conteúdo do Carrinho */
        .cart-container {
            display: flex;
            flex-wrap: wrap;
            margin: 30px 0;
            gap: 20px;
        }
        
        .cart-items {
            flex: 2;
            min-width: 300px;
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
        }
        
        .cart-summary {
            flex: 1;
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            height: fit-content;
        }
        
        .cart-title {
            font-size: 24px;
            color: var(--secondary);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .cart-item {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            align-items: center;
        }
        
        .cart-item:last-child {
            border-bottom: none;
        }
        
        .cart-item-image {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-right: 15px;
        }
        
        .cart-item-details {
            flex-grow: 1;
        }
        
        .cart-item-title {
            font-size: 16px;
            color: var(--secondary);
            margin-bottom: 5px;
        }
        
        .cart-item-price {
            font-size: 16px;
            font-weight: bold;
            color: var(--primary);
        }
        
        .cart-item-quantity {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        
        .quantity-btn {
            width: 30px;
            height: 30px;
            background-color: #eee;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        .quantity-input {
            width: 50px;
            height: 30px;
            text-align: center;
            margin: 0 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .remove-item {
            color: #999;
            cursor: pointer;
            margin-left: 20px;
        }
        
        .remove-item:hover {
            color: var(--primary);
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .summary-total {
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #eee;
        }
        
        

        .checkout-btn {
        width: 100%;
        background-color: var(--primary);
        color: white;
        border: none;
        padding: 14px;
        border-radius: 6px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-top: 20px;
    }
    
    .checkout-btn:hover {
        background-color: #e00;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    
    .continue-btn {
        width: 100%;
        background-color: white;
        color: var(--primary);
        border: 2px solid var(--primary);
        padding: 14px;
        border-radius: 6px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 12px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    
    .continue-btn:hover {
        background-color: #fff5f5;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .button-group {
        margin-top: 25px;
    }
        
        .empty-cart {
            text-align: center;
            padding: 50px 0;
        }
        
        .empty-cart-icon {
            font-size: 50px;
            color: #ddd;
            margin-bottom: 20px;
        }
        
        .empty-cart-message {
            font-size: 18px;
            color: var(--secondary);
            margin-bottom: 20px;
        }
        
        /* Footer (mantido igual ao tcc.html) */
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
        @media (max-width: 768px) {
            .cart-container {
                flex-direction: column;
            }
            
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 576px) {
            .cart-item {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .cart-item-image {
                margin-bottom: 15px;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
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
                <div class="logo"> <img src="imagem/logo.png" alt="logo" class="header-logo" style="max-height: 100px;" width="70px"></div>
                
                <div class="search-bar">
                    <input type="text" placeholder="Buscar produtos, marcas e muito mais...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                
                <div class="user-actions">
                    <a href="cad.php">
                        <i class="fas fa-user"></i>
                        <span>Minha Conta</span>
                    </a>
                    <a href="fav.html">
                        <i class="fas fa-heart"></i>
                        <span>Favoritos</span>
                    </a>
                    <a href="car.php" style="position: relative;">
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
        <div class="cart-container">
            <div class="cart-items">
                <h2 class="cart-title">Seu Carrinho (3 itens)</h2>
                
                <!-- Item 1 -->
                <div class="cart-item">
                    <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRyB391AjuJZvSQLSmYbqLJvE28F46YZuxhj5j_9jkmYEkr9Q6F6SABd4RYqa6sJb93FGMQ1usSqdyxEeIZmQ9WZvEPGs-8" alt="Mouse Gamer" class="cart-item-image">
                    <div class="cart-item-details">
                        <h3 class="cart-item-title">Mouse Gamer HyperX Pulsefire FPS Pro</h3>
                        <div class="cart-item-price">R$ 249,90</div>
                        <div class="cart-item-quantity">
                            <button class="quantity-btn">-</button>
                            <input type="text" value="1" class="quantity-input">
                            <button class="quantity-btn">+</button>
                            <span class="remove-item"><i class="fas fa-trash"></i> Remover</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 2 -->
                <div class="cart-item">
                    <img src="https://images.kabum.com.br/produtos/fotos/89171/89171_2_1523620293_gg.jpg" alt="Teclado Mecânico" class="cart-item-image">
                    <div class="cart-item-details">
                        <h3 class="cart-item-title">Teclado Mecânico Redragon Kumara K552</h3>
                        <div class="cart-item-price">R$ 329,90</div>
                        <div class="cart-item-quantity">
                            <button class="quantity-btn">-</button>
                            <input type="text" value="1" class="quantity-input">
                            <button class="quantity-btn">+</button>
                            <span class="remove-item"><i class="fas fa-trash"></i> Remover</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 3 -->
                <div class="cart-item">
                    <img src="https://images.kabum.com.br/produtos/fotos/104667/headset-gamer-razer-kraken-x-lite-p2_headset-gamer-razer-kraken-x-lite-p2_1569864643_gg.jpg" alt="Headset Gamer" class="cart-item-image">
                    <div class="cart-item-details">
                        <h3 class="cart-item-title">Headset Gamer Razer Kraken X Lite</h3>
                        <div class="cart-item-price">R$ 299,90</div>
                        <div class="cart-item-quantity">
                            <button class="quantity-btn">-</button>
                            <input type="text" value="1" class="quantity-input">
                            <button class="quantity-btn">+</button>
                            <span class="remove-item"><i class="fas fa-trash"></i> Remover</span>
                        </div>
                    </div>
                </div>
                
                <!-- Carrinho vazio (exemplo) -->
                <!--
                <div class="empty-cart">
                    <div class="empty-cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3 class="empty-cart-message">Seu carrinho está vazio</h3>
                    <a href="tcc.html" class="continue-btn">Continuar comprando</a>
                </div>
                -->
            </div>
            
            <div class="cart-summary">
                <h2 class="cart-title">Resumo do Pedido</h2>
                
                <div class="summary-row">
                    <span>Subtotal (3 itens)</span>
                    <span>R$ 879,70</span>
                </div>
                
                <div class="summary-row">
                    <span>Frete</span>
                    <span>Grátis</span>
                </div>
                
                <div class="summary-row">
                    <span>Descontos</span>
                    <span>- R$ 80,00</span>
                </div>
                
                <div class="summary-row summary-total">
                    <span>Total</span>
                    <span>R$ 799,70</span>
                </div>
                
                <button class="checkout-btn">FINALIZAR COMPRA</button>
                <a href="tcc.html" class="continue-btn">CONTINUAR COMPRANDO</a>
                
                <div style="margin-top: 20px; font-size: 14px; color: #666;">
                    <p><i class="fas fa-lock" style="margin-right: 5px;"></i> Compra 100% segura</p>
                    <p style="margin-top: 10px;">Seus dados estão protegidos</p>
                </div>
            </div>
        </div>
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
                <p>TECHZONE COMÉRCIO ELETRÔNICO LTDA - CNPJ: 12.345.678/0001-99 - Todos os direitos reservados - 2023</p>
                <p>Endereço: Rua Exemplo, 123 - Centro, São Paulo/SP - CEP: 01234-567</p>
            </div>
        </div>
    </footer>
</body>
</html>