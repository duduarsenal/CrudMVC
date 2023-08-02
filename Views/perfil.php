<style>
    nav {
        display: none !important;
    }
</style>

<?php
// $this->console_log($_SESSION['userData']);
session_start();
    if (isset($_SESSION['userData'])) {
        if (!empty($_SESSION['userData'])) {
?>
<section class="flex flex-col fixed w-full h-full ">
    <!-- Header -->
    <div class="z-[1] hidden md:flex w-full items-center justify-center lg:justify-between h-[3.25rem] bg-[#191919] pr-2 pl-0 lg:pl-[256px]">
        <p class="hidden lg:block font-[600] text-[1.3rem] w-full text-[whitesmoke] text-center">
            Essa é sua pagina de Perfil
        </p>
        <div class="flex items-center gap-2">
            <p class="font-[500] w-max text-[whitesmoke] h-full text-[1.3rem]">Seja bem vindo,</p>
            <?php
            $nameUser = $_SESSION['userData']['nome'];
            echo "<p class='font-[600] w-max h-full text-[1.3rem] text-[whitesmoke]'>$nameUser</p>";
            ?>
            <!-- <p class="font-[600] w-max h-full text-[1.3rem] text-[whitesmoke]">Dudu</p> -->
        </div>
    </div>

    <!-- Page Content -->
    <div class="w-full h-full flex flex-col md:flex-row items-center gap-8 pb-4 md:pb-0 md:gap-0 justify-between">
        <!-- Nav Sidebar -->
        <div class="flex flex-col justify-start sm:justify-between sm:h-[100%] text-[whitesmoke] w-full md:w-[10rem] min-w-[16rem] bg-[#191919] md:drop-shadow-[0_0_20px_rgba(255,0,0,0.50)]">
            <ul class="w-full h-max flex flex-col font-[400]">
                <a href="/CrudMVC/perfil/listar" class="px-4 text-[1.2rem] hover:bg-[#D0535380] py-4">Listar Filmes</a>
                <a href="/CrudMVC/perfil/adicionar" class="px-4 text-[1.2rem] hover:bg-[#D0535380] py-4">Adicionar novo Filme</a>
                <!-- <a href="#" class="px-4 text-[1.2rem] hover:bg-[#D0535380] py-4">Opção 3</a>
                <a href="#" class="px-4 text-[1.2rem] hover:bg-[#D0535380] py-4">Opção 4</a> -->
            </ul>
            <div class="flex items-center w-full h-max">
                <div class="w-full">
                    <form method="POST" class="w-full">
                        <input type="submit" name="close" value="Sair" class="w-full text-[1.3rem] font-[600] text-[whitesmoke] h-full cursor-pointer hover:bg-[#2f2f2f] text-left p-4">
                    </form>
                </div>
                <?php
                if (isset($_POST["close"])) {
                    unset($_SESSION['userData']);
                    echo "<script>window.location.href = '/CrudMVC/login'</script>";
                }
                ?>
            </div>
        </div>
        <?php 
            $funcao = (!empty($dadosModel[0])) ? $dadosModel[0] : $dadosModel['funcao'];
            // $this->console_log($funcao);
            array_shift($dadosModel);
            // $this->console_log($dadosModel);
            $this->carregarTemplate($funcao == 'listar' ? 'listar' : $funcao, $dadosModel);
        ?>
        <footer class="absolute bottom-0 pl-[256px] left-0 w-full h-[3rem] hidden md:flex items-center justify-center pointer-events-none">
            <p class="text-[black] text-[1.1rem]">Feito com ♥ por <span class=font-[600]>Dudu</span></p>
        </footer>
    </div>
    <script src="/CrudMVC/Js/script.js"></script>
</section>
<?php
     }
 } else {
     unset($_SESSION['userData']);
     echo "<script>
     alert('Voce precisa estar logado para acessar esta página');
     window.location.href = './login';
     </script>";
 }
?>