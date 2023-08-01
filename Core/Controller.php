<?php 

    Class Controller{

        public $dados;

        public function __construct(){

            $this->dados = array();

        }

        function console_log($output, $with_script_tags = true) {
            $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
        ');';
            if ($with_script_tags) {
                $js_code = '<script>' . $js_code . '</script>';
            }
            echo $js_code;
        }

        public function carregarTemplate($nomeView, $dadosModel = array()){ //Carrega o template

            $this->dados = $dadosModel;
            require 'Views/template.php';
        }

        public function loadViewOnTemplate($nomeView, $dadosModel = array()){ //Carrega a view baseada no nome

            // $this->console_log($dadosModel);
            extract($dadosModel);
            // $this->console_log($editar);
            require 'Views/'.$nomeView.'.php';

        }

    }

?>