<?php

  class Developer {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    // Get developers
    public function getDevelopers() {
      $this->db->query('SELECT * FROM developers ORDER BY name');

      $results = $this->db->resultSet();
      return $results;
    }
  }
