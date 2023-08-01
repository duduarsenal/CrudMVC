<?php 
require_once 'Conexao.php';

Class Filmes{

    private $con;

    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function getFilmes($userID){

        $sql_cmd = "SELECT f.idfilme, f.nome, f.dt_lanc, f.categoria, f.nota
        from filmesFav as f join cadastro as c
        on f.iduser = c.id
        where f.iduser = '$userID';";

        $sql_query = $this->con->query($sql_cmd); //prepara e executa o comando SQL

        function console_log($output, $with_script_tags = true) {
            $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
        ');';
            if ($with_script_tags) {
                $js_code = '<script>' . $js_code . '</script>';
            }
            echo $js_code;
        }


        $qnt = $sql_query->rowCount();
        if ($qnt == 0){
            return false;
        }

        return $sql_query;
    }

    public function getFilme($idFilme, $user){

        $sql_cmd = "SELECT f.nome, f.dt_lanc, f.categoria, f.nota
        FROM filmesFav as f join cadastro as c
        ON f.iduser = c.id
        WHERE f.idFilme = '$idFilme' AND f.iduser = '$user';";

        $sql_query = $this->con->query($sql_cmd);

        $qnt = $sql_query->rowCount(); // Armazena o numero de linhas retornado USANDO PDO STATEMENT

        if ($qnt > 1) // VERIFICA SE EXISTE MAIS DE UM CADASTRO COM ESSE USUARIO/EMAIL
        { 
            return "erro";
        } 
        else if ($qnt == 1) // CASO RETORNE 1 LINHA (CAMPO COMPATIVEL) ENVIA OS DADOS PARA O CONTROLLER
        { 
            $dados = $sql_query->fetchall(PDO::FETCH_OBJ); //"TRANSFORMA" UM RESULTADO SQL EM UM ARRAY
            //PDO::FETCH_ASSOC, associa a coluna com o index do array, exemplo: ['nome'] = 'Eduardo, ['usuario'] = 'dudu';
            return $dados;
        } 
        else //CASO NÃO RETORNE NENHUMA LINHA, ENTÃO USUARIO OU SENHA INCORRETA
        {
            return false;
        }


    }

}
?>