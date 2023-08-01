        <!-- FORMULARIO COM FILMES -->
        <div class="relative flex items-center justify-center h-full w-full">
            <form class="flex flex-col justify-center w-[80%] gap-8 rounded-[0.5rem] p-4 border-2 border-[#ff000050] bg-[#F9F8F8] outline outline-[3px] outline-[#ff00004d] outline-offset-[.4rem] drop-shadow-[0_0_20px_rgba(255,0,0,0.3)] mb-[3rem]" method="POST">

                <h1 class="w-full text-[1.5rem] font-[600] text-center">Tem certeza que deseja prosseguir?</h1>
                <div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-max min-w-[80%] text-[1.15rem] font-[500]" for="nome" id="labelNome">Nome do Filme</label>
                        <input class="w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="text" name="nomefilme" pattern="[A-Za-z0-9]+" title="Permitido somente letras e numeros" required />
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-max min-w-[80%] text-[1.15rem] font-[500]" for="username" id="labelUsername">Data de Lançamento</label>
                        <input class="w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="date" name="dt_lanc" required />
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-max min-w-[80%] text-[1.15rem] font-[500]" for="email" id="labelEmail">Categoria</label>
                        <input class="w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="text" name="categoria" required />
                    </div>
                    <div class="flex flex-col items-center justify-start">
                        <label class="w-max min-w-[80%] text-[1.15rem] font-[500]" for="password" id="labelSenha">Nota</label>
                        <input class="w-max min-w-[80%] h-[2.5rem] py-0 px-2 text-[1.2rem] border-2 border-solid border-[#5f5f5f70] rounded-[.25rem]" type="number" name="nota" maxlength="2" title="Digite uma nota de 0 a 10" required />
                    </div>
                </div>

                <div class="flex justify-end items-end w-full px-8">
                    <button class="cursor-pointer w-max h-[2.25rem] px-4 text-[1.25rem] uppercase font-[600] bg-[#FF785A] rounded-[0.25rem] transition-all duration-300 ease-in-out outline outline-[3px] outline-[#FF785A] hover:outline-offset-[0.15rem]" id="btn">Excluir</button>
                </div>

            </form>
        </div>