<?php

class perfilController extends Controller
{

    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
    ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

    public function index()
    {
        session_start();
        $this->carregarTemplate('perfil', ['funcao' => 'listar']);
    }

    public function listar()
    {
        $this->carregarTemplate('perfil', ['funcao' => 'listar']);
    }

    public function adicionar()
    {
        // $_SESSION['funcao'] = 'adicionar';
        $this->carregarTemplate('perfil', ['funcao' => 'adicionar']);
    }

    public function update()
    {
        if (isset($_POST['editar'])){

            $data = $_POST['editar'];
            $data = explode("/", $data);
            $this->editar(['filmeID' => $data[0], 'userID' => $data[1]]);
            // $this->console_log($_POST['editar']);

        } else if (isset($_POST['excluir'])){

            $data = $_POST['excluir'];
            $data = explode("/", $data);
            $this->excluir(['filmeID' => $data[0], 'userID' => $data[1]]);

        } else {
            $this->console_log("Erro, Metodo não existe");
        }
    }

    public function editar($data)
    {
        // $_SESSION['funcao'] = 'editar';
        $funcao = ['funcao' => 'editar'];
        extract($funcao);
        array_unshift($data, $funcao);
        $this->console_log($data);
        $this->carregarTemplate('perfil', $data);
    }

    public function excluir($data)
    {
        $funcao = ['funcao' => 'editar'];
        extract($funcao);
        array_unshift($data, $funcao);
        $this->carregarTemplate('perfil', $data);
    }

    public function listarFilmes($userID)
    {
        //FAÇO A INSTANCIA DA CLASSE USUARIO PARA ACESSAR O METODO DE AUTENTICAÇÃO
        $f = new Filmes();
        //AQUI RECEBO OS DADOS PASSADOS VIA PARAMETRO PELO VIEW E PASSO PARA O METODO AUTHLOGIN USANDO A INSTANCIA DE USUARIO
        $result = $f->getFilmes($userID);
        // $this->console_log($result);

        if ($result === false) {
            return false;
        }
        return $result;
    }

    public function listarFilme($idFilme, $user)
    {
        //FAÇO A INSTANCIA DA CLASSE USUARIO PARA ACESSAR O METODO DE AUTENTICAÇÃO
        $f = new Filmes();
        //AQUI RECEBO OS DADOS PASSADOS VIA PARAMETRO PELO VIEW E PASSO PARA O METODO AUTHLOGIN USANDO A INSTANCIA DE USUARIO
        $result = $f->getFilme($idFilme, $user);
        // $this->console_log($result);

        if ($result === "erro"){
            return "erro";
        } else if ($result == true) {
            return $result;
        } else {
            return false;
        }
    }
}
