<?php

  class Pages extends Controller {
    public function __construct() {
    }

    public function index() {

      /*
      if(isLoggedIn()) {
        redirect('posts');
      }
      */
      $this->view('pages/index');
    }

    public function about() {

      $this->view('pages/about');
    }

  }
