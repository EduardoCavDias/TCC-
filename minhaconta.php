<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit;
}

$nome = $_SESSION['usuario_nome'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Minha Conta</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background-color: #f4f4f4;
    }

    header {
      background-color: #cc0000;
      color: white;
      padding: 16px 32px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .user-info i {
      font-size: 20px;
    }

    .main-content {
      padding: 40px;
    }

    .btn-sair {
      background: white;
      color: #cc0000;
      border: 2px solid white;
      padding: 8px 16px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      transition: all 0.2s ease-in-out;
    }

    .btn-sair:hover {
      background-color: #ffffffaa;
      color: #990000;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>

<header>
  <div class="logo">Katchau</div>
  <div class="user-info">
    <i class="fas fa-user-circle"></i>
    <span><?= htmlspecialchars($nome) ?></span>
    <a class="btn-sair" href="php/logout.php">Sair</a>
  </div>
</header>

<div class="main-content">
  <!-- Aqui poderia ir o painel do usuário -->
  <h2>Seja bem-vindo(a), <?= htmlspecialchars($nome) ?>.</h2>
  <p>Este é o seu painel. Em breve você verá seus pedidos, favoritos, etc.</p>
</div>

</body>
</html>
