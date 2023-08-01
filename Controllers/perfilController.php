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
        $this->carregarTemplate('perfil', ['funcao' => 'listar']);
    }

    public function listar()
    {
        $this->carregarTemplate('perfil', ['funcao' => 'listar']);
    }

    public function adicionar()
    {
        $this->carregarTemplate('perfil', ['funcao' => 'adicionar']);
    }

    public function update()
    {
        if (isset($_POST['editar'])){

            $data = $_POST['editar'];
            $data = explode("/", $data);
            $this->editar(['filmeID' => $data[0], 'userID' => $data[1]]);

        } else if (isset($_POST['excluir'])){

            $data = $_POST['excluir'];
            $data = explode("/", $data);
            $this->excluir(['filmeID' => $data[0], 'userID' => $data[1]]);

        } else {
            $this->index();
            // $this->console_log("Erro, Metodo não existe");
        }
    }

    public function editar($data)
    {
        $funcao = ['funcao' => 'editar'];
        extract($funcao);
        array_unshift($data, $funcao);
        // $this->console_log($data);
        $this->carregarTemplate('perfil', $data);
    }

    public function excluir($data)
    {
        $funcao = ['funcao' => 'excluir'];
        extract($funcao);
        array_unshift($data, $funcao);
        // $this->console_log($data);
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

    public function adicionarFilme($Fname, $Fyear, $Fcategoria, $Fnota, $userID)
    {
        //FAÇO A INSTANCIA DA CLASSE USUARIO PARA ACESSAR O METODO DE AUTENTICAÇÃO
        $f = new Filmes();
        //AQUI RECEBO OS DADOS PASSADOS VIA PARAMETRO PELO VIEW E PASSO PARA O METODO AUTHLOGIN USANDO A INSTANCIA DE USUARIO
        $result = $f->addFilme($Fname, $Fyear, $Fcategoria, $Fnota, $userID);

        if ($result === true){
            return true;
        } else {
            return $result;
        }
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

    public function removefilme()
    {
        if (isset($_POST['confirmar'])){

            $dados = ($_POST['confirmar']);
            $dados = explode("/", $dados);
            $data = ['idFilme' => $dados[0]];
            $data = $data + ['userID' => $dados[1]];
            extract($data);
            
            $f = new Filmes();
            $result = $f->deleteFilme($idFilme, $userID);

            if ($result === true) {
                echo "<script>window.location.href = '/CrudMVC/perfil'</script>";
            } else {
                echo "  <script>
                            alert('Erro ao excluir, tente novamente mais tarde');
                            console.log('Erro ao cadastrar -> '. $result);
                        </script>";
            }

        } else if (isset($_POST['voltar'])){

            echo "<script>window.location.href='/CrudMVC/perfil'</script>";

        } else {

            echo "<script>window.location.href='/CrudMVC/perfil'</script>";

        }
    }
}
