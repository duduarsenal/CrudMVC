<?php 

Class perfilController extends Controller{

    public function index()
    {
        $this->carregarTemplate('perfil');
    }

    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
    ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

    public function listarFilmes($userID){
        
        //FAÇO A INSTANCIA DA CLASSE USUARIO PARA ACESSAR O METODO DE AUTENTICAÇÃO
        $f = new Filmes();
        //AQUI RECEBO OS DADOS PASSADOS VIA PARAMETRO PELO VIEW E PASSO PARA O METODO AUTHLOGIN USANDO A INSTANCIA DE USUARIO
        $result = $f->getFilmes($userID);
        $this->console_log($result);

        if ($result === false){
            return false;
        }
        return $result;
    }
}
