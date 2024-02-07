<?php

    class PageController extends Controller{
        
        public function __construct(PDO $connection) {
            
        }        

        public function home(){
            $this->render('page/home');
        }

        public function list(){
            $this->render('page/list');
        }

        public function modify(){
            $this->render('page/modify');
        }

        public function new(){
            $this->render('page/new');
        }

        public function delete(){
            $this->render('page/delete');
        }
    }
