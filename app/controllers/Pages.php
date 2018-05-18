<?php

  class Pages extends Controller {
    public function __construct() {
      $this->devModel = $this->model('Developer');
      $this->quesModel = $this->model('About');
    }

    public function index() {
      $developers = $this->devModel->getDevelopers();

      $data = [
        'developers' => $developers
      ];

      $this->view('pages/index', $data);
    }

    public function about() {
      $questions = $this->quesModel->getQuestions();

      $data = [
        'questions' => $questions
      ];

      $this->view('pages/about', $data);
    }

  }
