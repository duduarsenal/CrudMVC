        <!-- FORMULARIO COM FILMES -->
        <div class="relative flex flex-col items-center justify-center w-[95%] md:w-[80%] gap-6 rounded-[0.5rem] p-4 border-2 border-[#ff000050] bg-[#F9F8F8] outline outline-[3px] outline-[#ff00004d] outline-offset-[.4rem] drop-shadow-[0_0_20px_rgba(255,0,0,0.3)] mb-[3rem]">
            <h1 class="w-full text-[1.5rem] font-[600] text-center">Tem certeza que deseja prosseguir?</h1>
            <form class="flex flex-col justify-center w-full h-full gap-4" method="POST" action="/CrudMVC/perfil/removefilme">
                <?php
                $getF = new perfilController();
                // $this->console_log($filmeID.', '.$userID);
                $result = $getF->listarFilme($filmeID, $userID);

                if ($result === "erro") {
                    // echo "Deu ruim";
                    $this->console_log("Error no banco de dados");
                } else if (!$result) {
                    // echo "Filme não existe";
                    $this->console_log("error: Filme não existe -->" . $result);
                }
                // $this->console_log($result);
                //ARMAZENO O OBJETO COM OS DADOS DO FILME NA VARIAVEL $FILME
                $filme = $result[0];
                // $this->console_log($filme);
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
                        <label class="w-full sm:w-max min-w-[80%] text-[1.15rem] font-[500]" for="nome" id="labelNome">Nome do Filme</label>
                        <input class="w-full sm:w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="text" name="nomefilme" title="Permitido somente letras e numeros" readonly value='<?php echo $nomeFilme ?>' />
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-full sm:w-max min-w-[80%] text-[1.15rem] font-[500]" for="username" id="labelUsername">Data de Lançamento</label>
                        <input class="w-full sm:w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="number" name="ano_lanc" readonly value='<?php echo $lançamento ?>' required />
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-full sm:w-max min-w-[80%] text-[1.15rem] font-[500]" for="email" id="labelEmail">Categoria</label>
                        <input class="w-full sm:w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="text" name="categoria" readonly value='<?php echo $categoria ?>' required />
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-full sm:w-max min-w-[80%] text-[1.15rem] font-[500]" for="password" id="labelSenha">Nota</label>
                        <input class="w-full sm:w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="number" name="nota" maxlength="2" title="Digite uma nota de 0 a 10" readonly value='<?php echo $nota ?>' required />
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center justify-end md:items-end w-full px-2 sm:px-8 gap-4">
                    <button class="cursor-pointer w-max h-[2.25rem] px-4 text-[1.25rem] uppercase font-[600] bg-[#FF785A] rounded-[0.25rem] transition-all duration-300 ease-in-out outline outline-[3px] outline-[#FF785A] hover:outline-offset-[0.15rem]" name="confirmar" value=<?php echo $filmeID.'/'.$userID ?>>Sim, excluir filme</button>
    
                    <button class="cursor-pointer w-max h-[2.25rem] px-4 text-[1.25rem] uppercase font-[600] bg-[#3a86ff] rounded-[0.25rem] transition-all duration-300 ease-in-out outline outline-[3px] outline-[#3a86ff] hover:outline-offset-[0.15rem]" name="voltar" 
                    >Não, voltar</button>
                </div>
            </form>
        </div>