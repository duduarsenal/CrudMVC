        <!-- FORMULARIO COM FILMES -->
        <div class="relative flex flex-col items-center justify-center w-[80%] gap-8 rounded-[0.5rem] p-4 border-2 border-[#ff000050] bg-[#F9F8F8] outline outline-[3px] outline-[#ff00004d] outline-offset-[.4rem] drop-shadow-[0_0_20px_rgba(255,0,0,0.3)] mb-[3rem]">
            <h1 class="w-full text-[1.5rem] font-[600] text-center">Lista de Filmes</h1>
            <form class="flex flex-col justify-center w-full" method="POST" action="/CrudMVC/perfil/update">
                <table class="border border-solid border-[black]">
                    <tr class="h-12">
                        <th>#</th>
                        <th>Filme</th>
                        <th>Data de Lançamento</th>
                        <th>Categoria</th>
                        <th>Nota</th>
                        <th>Ações</th>
                    </tr>
                    <?php

                    $getF = new perfilController();
                    $idUser = $_SESSION['userData']['id'];
                    $result = $getF->listarFilmes($idUser);
                    // $result = $getF->listarFilmes('1');

                    if ($result === false) {
                    ?>
                        <tr class='border border-solid border-[black] h-8'>
                            <td class='border border-solid border-[black] text-center'></td>
                            <td class='border border-solid border-[black] text-center'></td>
                            <td class='border border-solid border-[black] text-center'></td>
                            <td class='border border-solid border-[black] text-center'></td>
                            <td class='border border-solid border-[black] text-center'></td>
                        </tr>
                    <?php } else {
                        // unset($_SESSION['parametros']);
                        $filmes = $result->fetchall(PDO::FETCH_OBJ);
                        $row = sizeof($filmes);
                        // console_log(sizeof($filmes));
                        // console_log($filmes);
                        $count = 0;
                        foreach ($filmes as $valor) {
                            $count++;
                            echo "<tr class='border border-solid border-[black] h-8'>";
                                echo "<td class='border border-solid border-[black] text-center p-2'>$count</td>";
                                echo "<td class='border border-solid border-[black] text-center'>$valor->nome</td>";
                                echo "<td class='border border-solid border-[black] text-center'>$valor->dt_lanc</td>";
                                echo "<td class='border border-solid border-[black] text-center'>$valor->categoria</td>";
                                echo "<td class='border border-solid border-[black] text-center'>$valor->nota</td>";
                                echo "<td class='flex justify-center gap-4 p-[4px]'>
                                        <button name='editar' value='$valor->idfilme/1' class='btn-editar bg-[#FFD25A] px-4 font-[600] text-[1.1rem] rounded border-2 border-[#11111180] hover:bg-[#FFD25A90]'>Editar</button>
                                        <button name='excluir' value='$valor->idfilme/1' class='btn-excluir bg-[#FF785A] px-4 font-[600] text-[1.1rem] rounded border-2 border-[#11111180] hover:bg-[#FF785A90]'>Excluir</button>
                                    </td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </form>
            <div class="flex justify-end items-end w-full">
                <button onclick="location.href='/CrudMVC/perfil/adicionar';" class="cursor-pointer w-max h-[2.25rem] px-4 text-[1.25rem] uppercase font-[600] bg-[#3a86ff] rounded-[0.25rem] transition-all duration-300 ease-in-out outline outline-[3px] outline-[#3a86ff] hover:outline-offset-[0.15rem]" id="btn">Novo Filme</button>
            </div>
        </div>