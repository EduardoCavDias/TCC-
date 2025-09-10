<?php
// Arquivo gerado automaticamente: cad.php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <link rel="icon" href="imagem/logoK.png" type="image/x-icon">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cadastro - Tech Store</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f9f9f9, #ffffff);
      color: #222;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      position: relative;
      overflow: hidden;
    }

    #particles-js {
      position: absolute;
      width: 100%;
      height: 100%;
      z-index: 0;
    }

    .container {
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      padding: 40px 30px;
      width: 100%;
      max-width: 420px;
      z-index: 1;
      position: relative;
      transition: all 0.3s ease;
      animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .container:hover {
      transform: scale(1.01);
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);
    }

    .container h2 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
      font-size: 24px;
    }

    .input-group {
      margin-bottom: 20px;
      position: relative;
    }

    .input-group label {
      display: block;
      margin-bottom: 6px;
      color: #555;
      font-size: 14px;
      font-weight: 500;
    }

    .input-group input {
      width: 100%;
      padding: 12px 40px 12px 14px;
      border-radius: 8px;
      border: 1px solid #ccc;
      background-color: #f5f5f5;
      color: #222;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    .input-group i {
      position: absolute;
      top: 37px;
      right: 14px;
      color: #aaa;
      transition: color 0.3s ease;
    }

    .input-group input:focus {
      outline: none;
      border-color: #cc0000;
      background-color: #fff;
      box-shadow: 0 0 0 2px rgba(204, 0, 0, 0.1);
    }

    .input-group input:focus + i {
      color: #cc0000;
    }

    .input-group input.invalid {
      border-color: #fd3636;
      background-color: #ffeaea;
    }

    .error-message {
      color: #fd3636;
      font-size: 12px;
      margin-top: 5px;
      display: none;
    }

    .btn {
      width: 100%;
      padding: 14px;
      background-color: #cc0000;
      border: none;
      border-radius: 8px;
      color: #fff;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .btn:hover {
      background-color: #aa0000;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn:active {
      transform: translateY(0);
    }

    .btn::after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 5px;
      height: 5px;
      background: rgba(255, 255, 255, 0.5);
      opacity: 0;
      border-radius: 100%;
      transform: scale(1, 1) translate(-50%);
      transform-origin: 50% 50%;
    }

    .btn:focus:not(:active)::after {
      animation: ripple 0.6s ease-out;
    }

    @keyframes ripple {
      0% {
        transform: scale(0, 0);
        opacity: 0.5;
      }
      100% {
        transform: scale(20, 20);
        opacity: 0;
      }
    }

    .footer {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #333;
    }

    .footer a {
      color: #cc0000;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.2s ease;
    }

    .footer a:hover {
      color: #aa0000;
      text-decoration: underline;
    }

    .message {
      display: none;
      text-align: center;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      animation: fadeIn 0.5s ease-out;
    }

    .success-message {
      background-color: #4CAF50;
      color: white;
    }

    .error-message-global {
      background-color: #fd3636;
      color: white;
    }

    .password-strength {
      height: 4px;
      background: #eee;
      border-radius: 2px;
      margin-top: 8px;
      overflow: hidden;
      position: relative;
    }

    .password-strength::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      width: 0;
      background: #fd3636;
      transition: width 0.3s ease, background 0.3s ease;
    }

    .password-strength[data-strength="1"]::before {
      width: 25%;
      background: #fd3636;
    }

    .password-strength[data-strength="2"]::before {
      width: 50%;
      background: #ff9800;
    }

    .password-strength[data-strength="3"]::before {
      width: 75%;
      background: #ffc107;
    }

    .password-strength[data-strength="4"]::before {
      width: 100%;
      background: #4CAF50;
    }

    .terms {
      font-size: 13px;
      color: #555;
      margin: 20px 0;
      text-align: center;
    }

    .terms a {
      color: #cc0000;
      text-decoration: none;
    }

    .terms a:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .container {
        padding: 30px 20px;
        margin: 0 15px;
      }
    }

    .shake {
      animation: shake 0.5s ease-in-out;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      20%, 60% { transform: translateX(-5px); }
      40%, 80% { transform: translateX(5px); }
    }
  </style>
</head>
<body>

  <div id="particles-js"></div>

  <div class="container">
    <h2>Criar Sua Conta</h2>
    
    <div id="successMessage" class="message success-message">
      Cadastro realizado com sucesso! Redirecionando...
    </div>
    
    <div id="errorMessage" class="message error-message-global">
      Ocorreu um erro no cadastro. Por favor, tente novamente.
    </div>
    
    <form id="formCadastro">
      <div class="input-group">
        <label for="nome">Nome Completo</label>
        <input type="text" id="nome" name="nome" required minlength="3">
        <i class="fas fa-user" aria-hidden="true"></i>
        <div id="nomeError" class="error-message">Por favor, insira um nome válido (mínimo 3 caracteres)</div>
      </div>

      <div class="input-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>
        <i class="fas fa-envelope" aria-hidden="true"></i>
        <div id="emailError" class="error-message">Por favor, insira um e-mail válido</div>
      </div>

      <div class="input-group">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required minlength="6">
        <i class="fas fa-lock" aria-hidden="true"></i>
        <div class="password-strength" id="passwordStrength"></div>
        <div id="senhaError" class="error-message">A senha deve ter pelo menos 6 caracteres</div>
      </div>

      <div class="input-group">
        <label for="confirmarSenha">Confirmar Senha</label>
        <input type="password" id="confirmarSenha" name="confirmarSenha" required>
        <i class="fas fa-lock" aria-hidden="true"></i>
        <div id="confirmarSenhaError" class="error-message">As senhas não coincidem</div>
      </div>

      <div class="terms">
        <input type="checkbox" id="termos" name="termos" required>
        <label for="termos">Eu concordo com os <a href="termos.html">Termos de Serviço</a> e <a href="privacidade.html">Política de Privacidade</a></label>
      </div>

      <button type="submit" class="btn" id="submitBtn">
        <span id="btnText">Cadastrar</span>
        <div id="btnLoader" style="display: none;">
          <i class="fas fa-spinner fa-spin"></i>
        </div>
      </button>
    </form>

    <div class="footer">
      Já tem uma conta? <a href="login.php">Entrar</a>
    </div>
  </div>

  <!-- Particles.js -->
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  
  <script>
    // Configuração do Particles.js
    particlesJS('particles-js', {
      particles: {
        number: { value: 120 },
        color: { value: "#cccccc" },
        shape: { type: "circle" },
        opacity: { value: 0.4 },
        size: { value: 2.5 },
        line_linked: {
          enable: true,
          distance: 150,
          color: "#bbbbbb",
          opacity: 0.3,
          width: 1
        },
        move: {
          enable: true,
          speed: 1.2
        }
      },
      interactivity: {
        detect_on: "canvas",
        events: {
          onhover: { enable: true, mode: "repulse" },
          onclick: { enable: true, mode: "push" }
        },
        modes: {
          repulse: { distance: 100 },
          push: { particles_nb: 4 }
        }
      }
    });

    // Validação do formulário
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('formCadastro');
      const nome = document.getElementById('nome');
      const email = document.getElementById('email');
      const senha = document.getElementById('senha');
      const confirmarSenha = document.getElementById('confirmarSenha');
      const termos = document.getElementById('termos');
      const passwordStrength = document.getElementById('passwordStrength');
      const submitBtn = document.getElementById('submitBtn');
      const btnText = document.getElementById('btnText');
      const btnLoader = document.getElementById('btnLoader');
      const successMessage = document.getElementById('successMessage');
      const errorMessage = document.getElementById('errorMessage');

      // Validação em tempo real
      nome.addEventListener('input', validateNome);
      email.addEventListener('input', validateEmail);
      senha.addEventListener('input', validateSenha);
      confirmarSenha.addEventListener('input', validateConfirmarSenha);

      // Verificar força da senha
      senha.addEventListener('input', function() {
        const strength = checkPasswordStrength(senha.value);
        passwordStrength.setAttribute('data-strength', strength);
      });

      form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if(validateForm()) {
          // Simular envio ao servidor
          submitBtn.disabled = true;
          btnText.style.display = 'none';
          btnLoader.style.display = 'block';
          errorMessage.style.display = 'none';
          
          // Simular requisição AJAX
          setTimeout(function() {
            // Simular resposta do servidor (substitua por chamada real)
            const cadastroSuccess = simulateCadastro(
              nome.value, 
              email.value, 
              senha.value
            );
            
            if(cadastroSuccess) {
              successMessage.style.display = 'block';
              
              // Redirecionar após 2 segundos
              setTimeout(function() {
                window.location.href = 'minhaconta.html';
              }, 2000);
            } else {
              errorMessage.style.display = 'block';
              submitBtn.disabled = false;
              btnText.style.display = 'block';
              btnLoader.style.display = 'none';
              
              // Efeito de shake no formulário
              form.classList.add('shake');
              setTimeout(() => form.classList.remove('shake'), 500);
            }
          }, 1500);
        }
      });

      // Função de simulação (remova na implementação real)
      function simulateCadastro(nome, email, senha) {
        // Em produção, substitua por chamada AJAX real ao backend
        return true; // Sempre retorna sucesso na simulação
      }

      function validateForm() {
        const isNomeValid = validateNome();
        const isEmailValid = validateEmail();
        const isSenhaValid = validateSenha();
        const isConfirmarSenhaValid = validateConfirmarSenha();
        const isTermosValid = validateTermos();
        
        return isNomeValid && isEmailValid && isSenhaValid && isConfirmarSenhaValid && isTermosValid;
      }

      function validateNome() {
        const errorElement = document.getElementById('nomeError');
        if(nome.value.length < 3) {
          nome.classList.add('invalid');
          errorElement.style.display = 'block';
          return false;
        } else {
          nome.classList.remove('invalid');
          errorElement.style.display = 'none';
          return true;
        }
      }

      function validateEmail() {
        const errorElement = document.getElementById('emailError');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if(!emailRegex.test(email.value)) {
          email.classList.add('invalid');
          errorElement.style.display = 'block';
          return false;
        } else {
          email.classList.remove('invalid');
          errorElement.style.display = 'none';
          return true;
        }
      }

      function validateSenha() {
        const errorElement = document.getElementById('senhaError');
        if(senha.value.length < 6) {
          senha.classList.add('invalid');
          errorElement.style.display = 'block';
          return false;
        } else {
          senha.classList.remove('invalid');
          errorElement.style.display = 'none';
          return true;
        }
      }

      function validateConfirmarSenha() {
        const errorElement = document.getElementById('confirmarSenhaError');
        if(confirmarSenha.value !== senha.value || confirmarSenha.value === '') {
          confirmarSenha.classList.add('invalid');
          errorElement.style.display = 'block';
          return false;
        } else {
          confirmarSenha.classList.remove('invalid');
          errorElement.style.display = 'none';
          return true;
        }
      }

      function validateTermos() {
        if(!termos.checked) {
          return false;
        }
        return true;
      }

      function checkPasswordStrength(password) {
        let strength = 0;
        
        // Verifica o comprimento
        if (password.length >= 6) strength++;
        if (password.length >= 8) strength++;
        
        // Verifica se tem números
        if (password.match(/([0-9])/)) strength++;
        
        // Verifica se tem caracteres especiais
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength++;
        
        return Math.min(strength, 4);
      }
    });
  </script>
</body>
</html>