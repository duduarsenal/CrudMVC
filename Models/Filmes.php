<?php 
require_once 'Conexao.php';

Class Filmes{

    private $con;

    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function getFilmes($userID){

        $sql_cmd = "SELECT f.nome, f.dt_lanc, f.categoria, f.nota
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

}
?>