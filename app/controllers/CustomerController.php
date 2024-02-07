<?php
    require_once(__DIR__ . '/../models/Customer.php');

    class CustomerController extends Controller {
        
        private $customerModel;

        public function __construct(PDO $connection) {
            $this->customerModel = new Customer($connection);
        }

        public function home() {
            $this->render('customer');
        }

        public function table() {
            $res = new Result();
            $customers = $this->customerModel->getAll();

            $res->success = true;
            $res->result = $customers;
            echo json_encode($res);
        }
    }
