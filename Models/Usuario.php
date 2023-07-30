<?php 
require_once 'Conexao.php';

Class Usuario{

    private $con;

    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function AuthLogin($userEmail, $senha){

        $dados = array();
        $sql_cmd = "SELECT * FROM cadastro WHERE usuario = '$userEmail' AND senha = '$senha' OR email = '$userEmail' AND senha = '$senha'";
        $sql_query = $this->con->query($sql_cmd); //prepara e executa o comando SQL

        $qnt = $sql_query->rowCount(); // Armazena o numero de linhas retornado USANDO PDO STATEMENT

        if ($qnt > 1) // VERIFICA SE EXISTE MAIS DE UM CADASTRO COM ESSE USUARIO/EMAIL
        { 
            return "erro";
        } 
        else if ($qnt == 1) // CASO RETORNE 1 LINHA (CAMPO COMPATIVEL) ENVIA OS DADOS PARA O CONTROLLER
        { 
            $dados = $sql_query->fetchall(PDO::FETCH_ASSOC); //"TRANSFORMA" UM RESULTADO SQL EM UM ARRAY
            //PDO::FETCH_ASSOC, associa a coluna com o index do array, exemplo: ['nome'] = 'Eduardo, ['usuario'] = 'dudu';
            return $dados;
        } 
        else //CASO NÃO RETORNE NENHUMA LINHA, ENTÃO USUARIO OU SENHA INCORRETA
        {
            return false;
        }
    }

    
    public function AuthCadastro($name, $user, $email, $pass){

        $sql_cmd = "SELECT * FROM cadastro WHERE usuario = '$user' OR email = '$email'";
        $sql_query = $this->con->query($sql_cmd); //prepara e executa o comando SQL

        $qnt = $sql_query->rowCount(); // Armazena o numero de linhas retornado USANDO PDO STATEMENT

        if ($qnt >= 1) // VERIFICA SE EXISTE ALGUM CADASTRO COM ESSE USUARIO E SE OS CAMPOS ESTÃO CORRETOS
        {  
            return false;
        } 
        else// CASO RETORNE 0 LINHAS (NENHUM CADASTRO) EFETUA UM NOVO INSERT NO BANCO
        { 
            $sql_cad = "INSERT INTO cadastro(id, nome, usuario, email, senha) values (id, '$name', '$user', '$email', '$pass')";
            $result = $this->con->query($sql_cad);

            //CASO A OPERAÇÃO SEJA BEM SUCEDIDA, RETORNA TRUE, CASO FALHE RETORNA STRING
            if ($result){
                return true;
            } else {
                return "erro";
            }
        } 

    }

}

?>