<link rel="stylesheet" href="/CrudMVC/Css/cadastro.css">
<script src="/CrudMVC/Js/script.js"></script>

<section class="cadastroWrapper">
    <article class="warn">
        <span>ATENÇÃO</span>
        <p>Esse projeto foi feito somente com intuito em estudar as tecnologias para Desenvolvimento Web</p>
        <span>NUNCA</span>
        <p>coloque dados sensiveis como usuarios, emails ou senhas verdadeiras!</p>
    </article>
    <form class="formWrapper" method="POST">
        <h1 class="register-title">CRIE SUA CONTA</h1>
        <div class="msgWrapper">
            <div id="msgError"></div>
            <div id="msgSucess"></div>
        </div>
        <div class="inputWrapper">
            <div class="register-input">
                <input type="text" id="nome" name="nome" pattern="[A-Za-z]+" title="Permitido somente letras" required />
                <label for="nome" id="labelNome">Nome</label>
            </div>
            <div class="register-input">
                <input type="text" name="usuario" id="usuario" pattern="[A-Za-z0-9]+" maxlength="16" title="Permitido somente letras e numeros" required/>
                <label for="username" id="labelUsername">Usuário</label>
            </div>
            <div class="register-input">
                <input type="email" name="email" id="email" required />
                <label for="email" id="labelEmail">E-mail</label>
            </div>
            <div class="register-input">
                <input type="password" name="password" id="password" maxlength="16" required />
                <label for="password" id="labelSenha">Senha</label>
            </div>
            <div class="register-input">
                <input type="password" name="repassword" id="repassword" maxlength="16" required />
                <label for="repassword" id="labelConfirmSenha">Confirmar Senha</label>
            </div>
            <span class="jaTemConta">Ja possui uma conta? Faça seu <a href="./login">Login</a></span>
        </div>
        <button class="register-btn" id="btn">
            Registrar
        </button>
    </form>
    <?php

    if (isset($_POST)) {

        if (!empty($_POST)) {

            $nome = $_POST['nome'];
            $user = $_POST['usuario'];
            $email = $_POST['email'];
            $pass = $_POST['password'];

            $c = new cadastroController();
            $result = $c->cadastrar($nome, $user, $email, $pass);

            if ($result === true) {
                echo "<script>
                msgSucess('Registrado com sucesso, redirecionando...');
                setTimeout(() => {
                  window.location.href = './login';
                }, 1500);
                </script>";
            } else if ($result === false) {
                echo "<script>
                msgError('Erro ao Cadastrar, conta já existente.');
                </script>";
            } else {
                echo "<script>
                msgError('Erro no cadastro ao banco de dados');
                console.log('Erro no cadastro ao banco de dados');
                </script>";
            }
        }
    }
    ?>
</section>