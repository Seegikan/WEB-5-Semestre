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
            $data = [];
            $shopping = $this->load->model("cart");
            $data["cart"] = $_SESSION["Cart"]; //_SESION
            $utilities = new Utilities_layout();
            $utilities->top();
            $this->load->view("shoppingcart/list", $data );
            $bottom = [
            "JSLibs" => [
                URL.'/js/shoppingcart/shoppingcart.js'
            ]
        ];
        $utilities->bottom($bottom);
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

        public function delete()
        {
              //echo 'hi';
            $model = $this->load->model("cart");
            header('Content-Type: application/json; charset=utf-8');

            echo json_encode($model->delete());
        }
    }


?>

