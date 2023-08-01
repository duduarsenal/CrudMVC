<?php 

Class cadastroController extends Controller{

    public function index()
    {
        //CARREGO O TEMPLATE DE CADASTRO (VIEWS)
        $this->carregarTemplate('cadastro');
    }

    public function cadastrar($name, $user, $email, $pass){

        //FAÇO A INSTANCIA DA CLASSE USUARIO PARA ACESSAR O METODO DE AUTENTICAÇÃO
        $u = new Usuario();
        //AQUI RECEBO OS DADOS PASSADOS VIA PARAMETRO PELO VIEW E PASSO PARA O METODO AUTHCADASTRO USANDO A INSTANCIA DE USUARIO
        $dados = $u->AuthCadastro($name, $user, $email, $pass);
        
        //RECEBO A RESPOSTA DA FUNÇÃO SENDO TRUE = CADASTRO COM SUCESS, FALSE = USUARIO JA EXISTE, STRING == ERRO NO BANCO
        if ($dados === "erro"){
            return $dados;
        } else if($dados == true){
            return true;
        } else {
            return false;
        }
    }

}

?>