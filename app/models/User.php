<?php
    class User extends Orm {
        
        public function __construct(PDO $connection) {
            parent::__construct('id', 'users', $connection);
        }
    }
