<?php

    class Orm {
        protected $db;
        protected $id;
        protected $table;

        public function __construct($id, $table, PDO $connection) {
            $this->id = $id;
            $this->table = $table;
            $this->db = $connection;
        }

        public function getAll() {
            $stmt = $this->db->prepare("SELECT * FROM {$this->table}");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function getById($id) {
            $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        }

        public function deleteById() {
            $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }

        public function updateById($id, $data) {
            $query = "UPDATE {$this->table} SET ";
            
            foreach ($data as $key => $value) {
                $query .= "{$key} = :{$key},";
            }
            
            $query = rtrim($query, ",");
            $query .= " WHERE id = :id";
            
            $stmt = $this->db->prepare($query);
            
            foreach ($data as $key => $value) {
                $stmt->bindValue(":{$key}", $value);
            }

            $stmt->bindValue(":id", $id);
            $stmt->execute();
        }

        public function insert($data) {
            $query = "INSERT INTO {$this->table} (";
            
            foreach ($data as $key => $value) {
                $query .= "{$key},";
            }

            $query = trim($query, ",") . ") VALUES ( ";

            foreach ($data as $key => $value) {
                $query .= ":{$key},";
            }

            $query = trim($query, ",") . ")";

            $stmt = $this->db->prepare($query);

            foreach ($data as $key => $value) {
                $stmt->bindValue(":{$key}", $value);
            }

            $stmt->execute();
        }

        public function paginate($page, $limit) {
            $offset = ($page -1) * $limit;

            $rows_query = "SELECT COUNT(*) FROM {$this->table}";
            $rows = $this->db->query($rows_query)->fetchColumn();

            $query = "SELECT * FROM {$this->table} LIMIT {$offset},{$limit}";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            $pages = ceil($rows / $limit);
            $data = $stmt->fetchAll();

            return [
                'data' => $data,
                'page' => $page,
                'limit' => $limit,
                'pages' => $pages,
                'rows' => $rows,
            ];
        }
    }
