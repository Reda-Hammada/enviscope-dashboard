<?php


    class Pages extends Controller {

     

        public function index(){

            $this->view('pages/index');

        }  


        public function setting () {



            $this->view('pages/setting');

        }

    }