<link rel="stylesheet" href="/CrudMVC/Css/perfil.css">

<?php
session_start();
if (isset($_SESSION['userData'])) {
    if (!empty($_SESSION['userData'])) {
?>
        <section class="relative w-full h-full">
            <!-- Sidebar -->
            <div class="flex-col absolute top-0 left-0 h-[100%] min-w-[16rem] hidden bg-[white]" id="mySidebar">
                <div onclick="sidebarClose()" class="flex items-center justify-end w-full h-[3.25rem] hover:bg-[gray] text-[1.5rem] cursor-pointer px-6 font-bold">
                    <span>X</span>
                </div>
                <a href="#" class="px-4 text-[1.2rem] hover:bg-[gray] py-4">Link 1</a>
                <a href="#" class="px-4 text-[1.2rem] hover:bg-[gray] py-4">Link 2</a>
                <a href="#" class="px-4 text-[1.2rem] hover:bg-[gray] py-4">Link 3</a>
            </div>

            <!-- Page Content -->
            <div class="flex w-full justify-between h-[3.25rem] bg-[white]">
                <div class="flex items-center gap-2">
                    <button class="h-full w-max px-6 font-bold text-[1.5rem] hover:bg-[gray]" onclick="sidebarOpen()">☰</button>
                    <p class="flex items-center text-[black] text-[1.3rem] h-full">
                        Seja bem vindo,
                        <?php
                        $userData = $_SESSION['userData'];
                        echo $userData['nome'];
                        ?>
                    </p>
                </div>
                <div class="h-full">
                    <form method="POST" class="h-full">
                        <input type="submit" name="close" value="Sair" class="text-[1.3rem] text-[black] px-6 h-full cursor-pointer hover:bg-[gray]">
                    </form>
                </div>
            </div>
            <script src="/CrudMVC/Js/script.js"></script>
        </section>
        <?php
        if (isset($_POST["close"])) {
            unset($_SESSION['userData']);
            echo "<script>window.location.href = './home';</script>";
        }
        ?>
<?php
    }
} else {
    unset($_SESSION['userData']);
    echo "<script>
    alert('Voce precisa estar logado para acessar esta página');.
    window.location.href = './login';
    </script>";
}
?>