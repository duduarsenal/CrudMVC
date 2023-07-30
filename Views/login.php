<link rel="stylesheet" href="/CrudMVC/Css/login.css">
<script src="/CrudMVC/Js/script.js"></script>

<section class="loginWrapper">
      <form class="formWrapper" method="POST">
        <h1 class="login-title">Acesse sua conta</h1>
        <div id="msgError"></div>
        <div class="inputWrapper">
          <div class="login-input">
            <input type="text" name="userEmail" id="usuario" required/>
            <label for="usuario">Usuario/E-mail</label>
          </div>
          <div class="login-input">
            <input type="text" name="senha" id="senha" pattern="[A-Za-z0-9]+" required title="Digite somente letras e numeros"/>
            <label for="senha">Senha</label>
          </div>
          <span class="nTemConta">Não tem uma conta? <a href="./cadastro">Registre-se</a></span>
        </div>
        <button class="login-btn" id="btn">Enviar</button>
      </form>
      <?php 
      
      if (isset($_POST)){
          
          if (!empty($_POST)){

              $userEmail = $_POST['userEmail'];
              $pass = $_POST['senha'];

              $c = new loginController();
              $result = $c->logar($userEmail, $pass);

              if ($result === true) {
                echo "<script>window.location.href = './perfil'</script>";
              } else if ($result === false) {
                echo "<script>
                msgError('Usuario ou senha incorretos.')
                let usuario = document.querySelector('#usuario').value = '$userEmail';
                </script>";
              } else{
                echo "<script> 
                msgError('Erro 999, multiplos usuarios');
                console.log('Erro no banco, multiplos usuarios');
                </script>";
              }
          }
      }

    ?>
</section>