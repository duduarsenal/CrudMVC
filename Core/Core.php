<?php 

    Class Core{

        public function __construct()
        {
            $this->run();
        }

        public function run()
        {
            if(isset($_GET['pag'])){ //Verifica se existe algum parametro no link usando o metodo get
                $url = $_GET['pag'];
            }

            $parametros = array();
            //tem url meu bom, depois do dominio 'xvideos.com/classe/metodo/parametro'
            if (!empty($url)){
                $url = explode('/', $url);
                $controller = $url[0].'Controller'; //Classe
                array_shift($url); //JOGA O PRIMEIRO ITEM DO ARRAY NO LIXO LIXOOOOOOOOOOOOOOOOOOOOOOOOO

                if (isset($url[0]) && !empty($url[0])){
                    $metodo = $url[0]; //Metodo/Função
                    array_shift($url); //JOGA O PRIMEIRO ITEM DO ARRAY NO LIXO LIXOOOOOOOOOOOOOOOOOOOOOOOOO
                } else {
                    //Sem metodo só classe meu parcero 
                    $metodo = 'index';
                }

                if (count($url) > 0){
                    //TEM COISA ALI MEU MANO
                    $parametros = $url;
                }
            } else { //o $url ta vazio, então é de HOMES E HOMES
                $controller = 'homeController';
                $metodo = 'index';
            }

            $caminho = 'CrudMVC/Controllers/'.$controller.'.php';

            if (!file_exists($caminho) && !method_exists($controller, $metodo)){
                $controller = 'homeController';
                $metodo = 'index';
            }
            $c = new $controller;
            call_user_func_array(array($c, $metodo), $parametros);
        }
    }

?>