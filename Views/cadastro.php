<link rel="stylesheet" href="/CrudMVC/Css/cadastro.css">
<script src="/CrudMVC/Js/script.js"></script>

<section class="flex items-center justify-center gap-16">

    <article class="max-w-[20rem] py-[1rem] px-[2rem] text-[1.15rem] text-center bg-[#5f5f5f40] rounded-[.5rem] text-[#fff0f0]">
        <span class="text-[2.25rem] font-[600] text-[#fa2323]">ATENÇÃO</span>
        <p>Esse projeto foi feito somente com intuito em estudar as tecnologias para Desenvolvimento Web</p>
        <span class="text-[1.5rem] font-[600] text-[#fa2323]">NUNCA</span>
        <p>coloque dados sensiveis como usuarios, emails ou senhas verdadeiras!</p>
    </article>

    <form class="flex flex-col justify-between bg-[white] min-h-[20rem] min-w-[20rem] p-4 border-2 border-[#ff000080] drop-shadow-[0_0_20px_rgba(255,0,0,0.7)] outline outline-[3px] outline-[#ff00004d] outline-offset-[.4rem] rounded-[.5rem]" method="POST">

        <h1 class="w-full text-[1.5rem] font-[600] text-center">CRIE SUA CONTA</h1>

        <div class="msgWrapper">
            <div id="msgError"></div>
            <div id="msgSucess"></div>
        </div>

        <div class="mb-[2.25rem]">
            <div class="relative flex flex-col justify-between min-w-[450px] pt-[1rem] my-[1rem] mx-auto">
                <input class="w-auto pt-[.3rem] pr-[.3rem] pb-0 pl-[1px] inline-block border-b-2 border-b-[#1f1f1f] bg-transparent outline-none w-[260px] text-[1rem] transition-all duration-300 focus:border-[#ff969680]" type="text" id="nome" name="nome" pattern="[A-Za-z]+" title="Permitido somente letras" required />
                <label class="absolute top-0 left-0 w-max text-[1.15rem] text-center pointer-events-none" for="nome" id="labelNome">Nome</label>
            </div>
            <div class="relative flex flex-col justify-between min-w-[450px] pt-[1rem] my-[1rem] mx-auto">
                <input class="w-auto pt-[.3rem] pr-[.3rem] pb-0 pl-[1px] inline-block border-b-2 border-b-[#1f1f1f] bg-transparent outline-none w-[260px] text-[1rem] transition-all duration-300 focus:border-[#ff969680]" type="text" name="usuario" id="usuario" pattern="[A-Za-z0-9]+" maxlength="16" title="Permitido somente letras e numeros" required/>
                <label class="absolute top-0 left-0 w-max text-[1.15rem] text-center pointer-events-none" for="username" id="labelUsername">Usuário</label>
            </div>
            <div class="relative flex flex-col justify-between min-w-[450px] pt-[1rem] my-[1rem] mx-auto">
                <input class="w-auto pt-[.3rem] pr-[.3rem] pb-0 pl-[1px] inline-block border-b-2 border-b-[#1f1f1f] bg-transparent outline-none w-[260px] text-[1rem] transition-all duration-300 focus:border-[#ff969680]" type="email" name="email" id="email" required />
                <label class="absolute top-0 left-0 w-max text-[1.15rem] text-center pointer-events-none" for="email" id="labelEmail">E-mail</label>
            </div>
            <div class="relative flex flex-col justify-between min-w-[450px] pt-[1rem] my-[1rem] mx-auto">
                <input class="w-auto pt-[.3rem] pr-[.3rem] pb-0 pl-[1px] inline-block border-b-2 border-b-[#1f1f1f] bg-transparent outline-none w-[260px] text-[1rem] transition-all duration-300 focus:border-[#ff969680]" type="password" name="password" id="password" maxlength="16" required />
                <label class="absolute top-0 left-0 w-max text-[1.15rem] text-center pointer-events-none" for="password" id="labelSenha">Senha</label>
            </div>
            <div class="relative flex flex-col justify-between min-w-[450px] pt-[1rem] my-[1rem] mx-auto">
                <input class="w-auto pt-[.3rem] pr-[.3rem] pb-0 pl-[1px] inline-block border-b-2 border-b-[#1f1f1f] bg-transparent outline-none w-[260px] text-[1rem] transition-all duration-300 focus:border-[#ff969680]" type="password" name="repassword" id="repassword" maxlength="16" required />
                <label class="absolute top-0 left-0 w-max text-[1.15rem] text-center pointer-events-none" for="repassword" id="labelConfirmSenha">Confirmar Senha</label>
            </div>

            <span class="block text-center pt-[.15rem] px-0 pb-[.3rem]text-[#3b1010]">Ja possui uma conta? Faça seu <a class="no-underline text-[red] font-[700]" href="./login">Login</a></span>

        </div>

        <button class="cursor-pointer w-[70%] h-[2.25rem] text-[1.25rem] uppercase font-[600] bg-[#ff2323] mx-auto rounded-[0.25rem] transition-all duration-300 ease-in-out outline outline-[3px] outline-[#ff2323] hover:outline-offset-[0.15rem]" id="btn">
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