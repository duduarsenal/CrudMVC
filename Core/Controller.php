<?php 

    Class Controller{

        public $dados;

        public function __construct(){

            $this->dados = array();

        }

        public function carregarTemplate($nomeView, $dadosModel = array()){ //Carrega o template

            $this->dados = $dadosModel;
            require 'Views/template.php';
        }

        public function loadViewOnTemplate($nomeView, $dadosModel = array()){ //Carrega a view baseada no nome

            extract($dadosModel);
            require 'Views/'.$nomeView.'.php';

        }

    }

?>