<?php

  class About {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    // Get developers
    public function getQuestions() {
      $this->db->query('SELECT * FROM questions');

      $results = $this->db->resultSet();
      return $results;
    }
  }
