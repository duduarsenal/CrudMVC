<?php 

    Class Conexao{

        private static $instancia; //variavel para fazer a conexão com o banco;

        private function __construct(){}

        public static function getConexao(){
            
            //VERIFICO SE A CONEXÃO JA NÃO FOI FEITA, CASO NÃO TENHA SIDO FEITA, IRA INICIAR UMA CONEXÃO
            if (!isset(self::$instancia)){

                //DADOS DO DATABASE
                $database = 'usuarios';
                $hostname = 'localhost';
                $username = 'root';
                $password = '';

                try {
                    //COMO SE FOSSE UM NEW OBJECT DE INSTANCIA, para criar a conexão com o banco
                    self::$instancia = new PDO('mysql:dbname='.$database.';host='.$hostname,$username,$password); 

                } catch (Exception $e){
                    echo 'Erro: '.$e;
                }
                
                return self::$instancia;
            }
        }
    }
