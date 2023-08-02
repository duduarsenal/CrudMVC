        <!-- FORMULARIO COM FILMES -->
        <div class="relative flex items-center justify-center h-full w-full">
            <form class="flex flex-col justify-center w-[80%] gap-8 rounded-[0.5rem] p-4 border-2 border-[#ff000050] bg-[#F9F8F8] outline outline-[3px] outline-[#ff00004d] outline-offset-[.4rem] drop-shadow-[0_0_20px_rgba(255,0,0,0.3)] mb-[3rem]" method="POST" action="/CrudMVC/perfil/editarfilme">

                <h1 class="w-full text-[1.5rem] font-[600] text-center">Editar Filme</h1>

                <?php

                $getF = new perfilController();

                $this->console_log($filmeID . $userID);

                $result = $getF->listarFilme($filmeID, $userID);

                if ($result === "erro") {
                    echo "Deu ruim";
                } else if (!$result) {
                    echo "Filme não existe";
                }

                // $this->console_log($result);
                //ARMAZENO O OBJETO COM OS DADOS DO FILME NA VARIAVEL $FILME
                $filme = $result[0];
                //ARMAZENO OS DADOS DO FILME INDIVIDUALMENTE
                $nomeFilme = $filme->nome;
                $lançamento = $filme->dt_lanc;
                $categoria = $filme->categoria;
                $nota = $filme->nota;
                // $nomeFilme = "Vingadores";
                // $lançamento = '2092';
                // $categoria = "Coco";
                // $nota = '2';
                // $getF -> console_log($filme);

                ?>

                <div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-max min-w-[80%] text-[1.15rem] font-[500]" for="nome" id="labelNome">Nome do Filme</label>
                        <input class="w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="text" placeholder="Exemplo: Circulo de Fogo: A Revolta" name="nomefilme" pattern="[A-Za-z0-9].{3,}" title="Permitido somente letras e numeros" value='<?php echo $nomeFilme ?>' required />
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-max min-w-[80%] text-[1.15rem] font-[500]" for="username" id="labelUsername">Data de Lançamento</label>
                        <input class="w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="number" placeholder="Exemplo: 2018" min="1900" max="2024" step="1" name="ano_lanc" title="Digite um ano válido" value='<?php echo $lançamento ?>' required />
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-max min-w-[80%] text-[1.15rem] font-[500]" for="email" id="labelEmail">Categoria</label>
                        <input class="w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="text" placeholder="Exemplo: Ação/Ficção Científica" name="categoria" value='<?php echo $categoria ?>' required />
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-max min-w-[80%] text-[1.15rem] font-[500]" for="password" id="labelSenha">Nota</label>
                        <input class="w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="number" min="0" max="10" step="0.1" placeholder="Exemplo: 8.5" name="nota" title="Digite uma nota de 0 a 10" value='<?php echo $nota ?>' required />
                    </div>
                </div>

                <div class="flex justify-end items-end w-full px-8">
                    <button class="cursor-pointer w-max h-[2.25rem] px-4 text-[1.25rem] uppercase font-[600] bg-[#FFD25A] rounded-[0.25rem] transition-all duration-300 ease-in-out outline outline-[3px] outline-[#FFD25A] hover:outline-offset-[0.15rem]" id="btn" 
                    name="editarfilme" value=<?php echo $filmeID ?>>Salvar alteração</button>
                </div>

            </form>

            <?php



            ?>

        </div>