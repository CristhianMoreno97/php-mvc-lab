<?php
    class Customer extends Orm {
        
        public function __construct(PDO $connection) {
            parent::__construct('id', 'customers', $connection);
        }
    }
