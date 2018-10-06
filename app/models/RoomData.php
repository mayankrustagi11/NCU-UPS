<?php

  class RoomData {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    // Add Router
    public function add($data) {
      $this->db->query('INSERT INTO roomdata(room, timestamp, temp) VALUES(:room, :timestamp, :temp)');

      // Bind value
      $this->db->bind(':room', $data['room']);
      $this->db->bind(':timestamp', $data['timestamp']);
      $this->db->bind(':temp', $data['temp']);

      // Execute query
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

  }