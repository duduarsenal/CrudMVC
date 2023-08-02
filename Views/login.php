<link rel="stylesheet" href="/CrudMVC/Css/login.css">
<script src="/CrudMVC/Js/script.js"></script>

<section class="min-w-[320px] sm:w-auto flex items-center justify-center">

      <form class="flex flex-col justify-between bg-[white] sm:min-h-[20rem] sm:min-w-[20rem] p-2 sm:p-4 border-2 border-[#ff000080] drop-shadow-[0_0_20px_rgba(255,0,0,0.7)] outline outline-[3px] outline-[#ff00004d] outline-offset-[.4rem] rounded-[.5rem]" method="POST">

        <h1 class="w-full text-[1.5rem] font-[600] text-center">Acesse sua conta</h1>

        <div id="msgError"></div>

        <div class="flex flex-col h-max gap[.75rem] pt-[1rem] pb-[2.5rem] mt-[-2rem]">
          <div class="relative flex flex-col justify-between w-full pt-[1rem] px-[.75rem] my-[1rem] mx-auto">
            <input class="w-full pt-[.3rem] pr-[.3rem] pb-0 pl-[1px] inline-block border-b-2 border-b-[#1f1f1f] bg-transparent outline-none w-[260px] text-[1rem] transition-all duration-300 focus:border-[#ff969680]" type="text" name="userEmail" id="usuario" required/>
            <label class="absolute top-0 left-0 w-max text-[1.15rem] text-center px-[.75rem] pointer-events-none" for="usuario">Usuario/E-mail</label>
          </div>
          <div class="relative flex flex-col justify-between w-full pt-[1rem] px-[.75rem] my-[1rem] mx-auto">
            <input class="w-full pt-[.3rem] pr-[.3rem] pb-0 pl-[1px] inline-block border-b-2 border-b-[#1f1f1f] bg-transparent outline-none w-[260px] text-[1rem] transition-all duration-300 focus:border-[#ff969680]" type="text" name="senha" id="senha" pattern="[A-Za-z0-9]+" required title="Digite somente letras e numeros"/>
            <label class="absolute top-0 left-0 w-max text-[1.15rem] text-center px-[.75rem] pointer-events-none" for="senha">Senha</label>
          </div>
          
          <span class="block text-center pt-[.15rem] px-0 pb-[.3rem]text-[#3b1010]">Não tem uma conta? <a class="no-underline text-[red] font-[700]" href="./cadastro">Registre-se</a></span>

        </div>

        <button class="cursor-pointer w-[70%] h-[2.25rem] text-[1.25rem] uppercase font-[600] bg-[#ff2323] mx-auto rounded-[0.25rem] transition-all duration-300 ease-in-out outline outline-[3px] outline-[#ff2323] hover:outline-offset-[0.15rem]" id="btn">Enviar</button>
        
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