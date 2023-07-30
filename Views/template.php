<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/CrudMVC/Css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?php 
    
    //Pega o URL da pagina para colocar como TITLE
    $url = $_GET['pag'];
    echo ucfirst($url);

    ?></title>
</head>

<body>
    <!-- CABEÇALHO MEU PARCEIRO -->
    <nav class="navbar w-[100%] flex items-center bg-[#fffdfd] border-b-[2px] border-b-[#FF000070] h-max min-h-[3rem] px-8">
        <div class="flex justify-between w-[100%] h-full">
            <h1 class="flex items-center font-[600] text-[1.5rem] h-full px-4 transition-all hover:scale-[1.03]">Crud PHP/MySQL</h1>
            <ul class="flex items-center gap-16">
                <li class="h-full transition-all hover:bg-[#1f1f1f30]">
                    <a class="h-full flex items-center px-4 text-[1.1rem]" aria-current="page" href="./home">Home</a>
                </li>
                <li class="h-full transition-all hover:bg-[#1f1f1f30]">
                    <a class="h-full flex items-center px-4 text-[1.1rem]" href="./login">Login</a>
                </li>
                <li class="h-full transition-all hover:bg-[#1f1f1f30]">
                    <a class="h-full flex items-center px-4 text-[1.1rem]" href="./cadastro">Cadastro</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="custom-shape-divider-top-1690413573">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M1200 0L0 0 892.25 114.72 1200 0z" class="shape-fill"></path>
        </svg>
    </div>
    <main>
        <?php

            $this->loadViewOnTemplate($nomeView, $dadosModel);
        
        ?>
    </main>
    <div class="custom-shape-divider-bottom-1690413374">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M1200 0L0 0 892.25 114.72 1200 0z" class="shape-fill"></path>
        </svg>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>