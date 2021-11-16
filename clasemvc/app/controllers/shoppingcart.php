<?php 
    class Shoppingcart extends System_core
    {
        //un controlador no puede
        public function __construct()
        {
            parent::__construct();
        }

        public function main()
        {
            
        }

        public function add()
        {
            //echo 'hi';
            $model = $this->load->model("cart");
            header('Content-Type: application/json; charset=utf-8');

            echo json_encode($model->add());
        }

        public function minicart()
        {
            $this->load->view("shoppingcart/minicart");
        }
    }


?>

