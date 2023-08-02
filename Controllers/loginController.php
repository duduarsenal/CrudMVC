<?php 

Class loginController extends Controller{

    public function index()
    {
        session_start();
        //CARREGO O TEMPLATE DE LOGIN (VIEWS)
        $this->carregarTemplate('login');
    }

    // function console_log($output, $with_script_tags = true) {
    //     $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
    // ');';
    //     if ($with_script_tags) {
    //         $js_code = '<script>' . $js_code . '</script>';
    //     }
    //     echo $js_code;
    // }

    public function logar($userEmail, $pass)
    {
        //FAÇO A INSTANCIA DA CLASSE USUARIO PARA ACESSAR O METODO DE AUTENTICAÇÃO
        $u = new Usuario();
        //AQUI RECEBO OS DADOS PASSADOS VIA PARAMETRO PELO VIEW E PASSO PARA O METODO AUTHLOGIN USANDO A INSTANCIA DE USUARIO
        $dados = $u->AuthLogin($userEmail, $pass);
        // $this->console_log($dados);
        
        //RECEBO A RESPOSTA DA FUNÇÃO SENDO TRUE = USUARIO AUTENTICADO, FALSE = USUARIO OU SENHA INCORRETOS
        if ($dados === "erro"){
            return $dados;
        } else if($dados == true){
            $_SESSION['userData'] = ['id' => $dados[0]['id'], 'nome' => $dados[0]['nome'], 'user' => $dados[0]['usuario']];
            // $this->console_log($_SESSION['userData']);
            return true;
        }else {
            return false;
        }
    }

}

?>