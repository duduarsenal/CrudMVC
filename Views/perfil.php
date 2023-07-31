<link rel="stylesheet" href="/CrudMVC/Css/perfil.css">

<?php
session_start();
    if (isset($_SESSION['userData'])) {
        if (!empty($_SESSION['userData'])) {
?>
<section class="flex flex-col fixed w-full h-full ">
    <!-- Header -->
    <div class="z-[1] flex w-full items-center justify-between h-[3.25rem] bg-[#191919] pr-2 pl-[256px]">
        <p class="font-[600] text-[1.3rem] w-full text-[whitesmoke] text-center">
            Essa é sua pagina de Perfil
        </p>
        <div class="flex items-center gap-2">
            <p class="flex items-center text-[whitesmoke] h-full w-max">
                <p class="font-[500] w-max text-[whitesmoke] h-full text-[1.3rem]">Seja bem vindo,</p>
                <?php
                $userData = $_SESSION['userData'];
                // echo $userData['nome'];
                ?>
                <p class="font-[600] w-max h-full text-[1.3rem] text-[whitesmoke]">Dudu</p>
            </p>
        </div>
    </div>

    <!-- Page Content -->
    <div class="w-full h-full flex items-center justify-between">
        <!-- Nav Sidebar -->
        <div class="sidebar flex flex-col justify-between h-[100%] text-[whitesmoke] w-[10rem] min-w-[16rem] bg-[#191919]">
            <ul class="w-full h-max flex flex-col font-[400]">
                <a href="#" class="px-4 text-[1.2rem] hover:bg-[#D0535380] py-4">Listar Filmes</a>
                <a href="#" class="px-4 text-[1.2rem] hover:bg-[#D0535380] py-4">Adicionar novo Filme</a>
                <a href="#" class="px-4 text-[1.2rem] hover:bg-[#D0535380] py-4">Opção 3</a>
                <a href="#" class="px-4 text-[1.2rem] hover:bg-[#D0535380] py-4">Opção 4</a>
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
                    echo "<script>window.location.href = './home'</script>";
                }
                ?>
            </div>
        </div>
        <!-- FORMULARIO COM FILMES -->
        <div class="relative flex items-center justify-center h-full w-full">
            <form class="formWrapper flex flex-col justify-center w-[80%] gap-8 rounded-[0.5rem] p-4 border-2 border-[#ff000050] bg-[#F9F8F8] drop-shadow-[0_0_20px_rgba(255,0,0,0.3)] mb-[3rem]" method="POST">
                <h1 class="w-full text-[1.5rem] font-[600] text-center">Lista de Filmes</h1>
                <table class="border border-solid border-[black] m-8">
                    <tr class="h-12">
                        <th>Filme</th>
                        <th>Data de Lançamento</th>
                        <th>Categoria</th>
                        <th>Nota</th>
                        <th>Ações</th>
                    </tr>
                    <?php 
                    
                    $getF = new perfilController();
                    $result = $getF->listarFilmes($userData['id']);

                    if ($result === false){
                    ?>
                        <tr class='border border-solid border-[black] h-8'>
                            <td class='border border-solid border-[black] text-center'></td>
                            <td class='border border-solid border-[black] text-center'></td>
                            <td class='border border-solid border-[black] text-center'></td>
                            <td class='border border-solid border-[black] text-center'></td>
                        </tr>
                    <?php } else {
                        $filmes = $result->fetchall(PDO::FETCH_OBJ);
                        $row = sizeof($filmes);
                        console_log(sizeof($filmes));
                        console_log($filmes);
                        foreach ($filmes as $valor){
                            echo "<tr class='border border-solid border-[black] h-8'>";
                                echo "<td class='border border-solid border-[black] text-center'>$valor->nome</td>";
                                echo "<td class='border border-solid border-[black] text-center'>$valor->dt_lanc</td>";
                                echo "<td class='border border-solid border-[black] text-center'>$valor->categoria</td>";
                                echo "<td class='border border-solid border-[black] text-center'>$valor->nota</td>";
                                echo "<td class='flex justify-center gap-4 p-[4px]'>
                                    <button class='btn-editar bg-[#FFD25A] px-4 font-[600] text-[1.1rem] rounded border-2 border-[#11111180] hover:bg-[#FFD25A90]'>Editar</button>
                                    <button class='btn-excluir bg-[#FF785A] px-4 font-[600] text-[1.1rem] rounded border-2 border-[#11111180] hover:bg-[#FF785A90]'>Excluir</button>
                                </td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
                <!-- <button class="cursor-pointer w-[15%] h-[2.25rem] text-[1.25rem] uppercase font-[600] bg-[#ff2323] mx-auto rounded-[0.25rem] transition-all duration-300 ease-in-out outline outline-[3px] outline-[#ff2323] hover:outline-offset-[0.15rem]" id="btn">Enviar</button> -->
            </form>
            <!-- FOOTER -->
            <footer class="absolute bottom-0 left-0 w-full h-[3rem] flex items-center justify-center">
                <p class="text-[#19191980] text-[1.1rem]">Feito com ♥ por <span class=font-[600]>Dudu</span></p>
            </footer>
        </div>
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