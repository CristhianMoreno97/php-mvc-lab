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

        public function new() {
            $this->render('newCustomer');
        }

        public function create() {
            $res = new Result();
            $data = file_get_contents('php://input');
            $body = json_decode($data, true);

            if (!isset($body['firstName'], $body['lastName'], $body['address'])) {
                $res->success = false;
                $res->message = 'Invalid data';
                echo json_encode($res);
                return;
            }

            try {
                $this->customerModel->insert([
                    'first_name' => $body['firstName'],
                    'last_name' => $body['lastName'],
                    'address' => $body['address'],
                ]);

                $res->success = true;
                $res->message = 'Customer created';
            } catch (Exception $e) {
                $res->success = false;
                $res->message = $e->getMessage();
            }

            echo json_encode($res);
        }

        public function table() {
            $res = new Result();
            $customers = $this->customerModel->getAll();

            $res->success = true;
            $res->result = $customers;
            echo json_encode($res);
        }
    }
