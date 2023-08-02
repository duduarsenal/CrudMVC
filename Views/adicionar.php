        <!-- FORMULARIO COM FILMES -->
        <div class="relative flex items-center justify-center h-full w-full">
            <form class="flex flex-col justify-center min-w-[310px] w-[95%] md:w-[80%] gap-8 rounded-[0.5rem] p-2 md:p-4 border-2 border-[#ff000050] bg-[#F9F8F8] outline outline-[3px] outline-[#ff00004d] outline-offset-[.4rem] drop-shadow-[0_0_20px_rgba(255,0,0,0.3)] mb-[3rem]" method="POST">

                <h1 class="w-full text-[1.5rem] font-[600] text-center">Adicionar Filme</h1>

                <div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-full md:w-max min-w-[80%] text-[1.15rem] font-[500]" for="nome" id="labelNome">Nome do Filme</label>
                        <input class="w-full md:w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="text" placeholder="Exemplo: Circulo de Fogo: A Revolta" name="nomefilme" pattern="[A-Za-z0-9].{3,}" title="Permitido somente letras e numeros" required />
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-full md:w-max min-w-[80%] text-[1.15rem] font-[500]" for="username" id="labelUsername">Data de Lançamento</label>
                        <input class="w-full md:w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="number" placeholder="Exemplo: 2018" min="1901" max="2024" step="1" name="ano_lanc" title="Digite um ano válido" required />
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-full md:w-max min-w-[80%] text-[1.15rem] font-[500]" for="email" id="labelEmail">Categoria</label>
                        <input class="w-full md:w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="text" placeholder="Exemplo: Ação/Ficção Científica" name="categoria" required />
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-full md:w-max min-w-[80%] text-[1.15rem] font-[500]" for="password" id="labelSenha">Nota</label>
                        <input class="w-full md:w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="number" min="0" max="10" step="0.1" placeholder="Exemplo: 8.5" name="nota" title="Digite uma nota de 0 a 10" required />
                    </div>
                </div>

                <div class="flex justify-end items-end w-full px-8">
                    <button class="cursor-pointer w-max h-[2.25rem] px-4 text-[1.25rem] uppercase font-[600] bg-[#57cc99] rounded-[0.25rem] transition-all duration-300 ease-in-out outline outline-[3px] outline-[#57cc99] hover:outline-offset-[0.15rem]" id="btn">Adicionar</button>
                </div>

            </form>
            <?php

            if (isset($_POST)) {

                if (!empty($_POST)) {

                    $Fname = $_POST['nomefilme'];
                    $Fyear = $_POST['ano_lanc'];
                    $Fcategoria = $_POST['categoria'];
                    $Fnota = $_POST['nota'];
                    $userID = $_SESSION['userData']['id'];

                    $p = new perfilController();
                    $result = $p->adicionarFilme($Fname, $Fyear, $Fcategoria, $Fnota, $userID);

                    if ($result === true) {
                        echo "  <script>
                                    window.location.href = '/CrudMVC/perfil';
                                </script>";
                    } else {
                        echo "  <script>
                                    alert('Erro ao Cadastrar, tente novamente mais tarde');
                                    console.log('Erro ao cadastrar -> '. $result);
                                </script>";
                    }
                }
            }
            ?>
        </div>