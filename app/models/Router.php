<?php

  class Router {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    // Get Routers
    public function getRouters() {
        $this->db->query('SELECT * FROM routers');

        $results = $this->db->resultSet();
        return $results;
      }

    // Add Router
    public function add($data) {
      $this->db->query('INSERT INTO routers(room, ip, incharge) VALUES(:room, :ip, :incharge)');

      // Bind value
      $this->db->bind(':room', $data['room']);
      $this->db->bind(':ip', $data['ip']);
      $this->db->bind(':incharge', $data['incharge']);

      // Execute query
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    // Find Router by Room No.
    public function findRouterByRoomNo($room) {
      $this->db->query('SELECT * FROM routers WHERE room = :room');

      // Bind value
      $this->db->bind(':room', $room);

      $row = $this->db->single();
      return $row;
    }

    // Find Router by IP Address
    public function findRouterByIp($ip) {
      $this->db->query('SELECT * FROM routers WHERE ip = :ip');

      // Bind value
      $this->db->bind(':ip', $ip);

      $row = $this->db->single();
      return $row;
    }

    public function getRouterById($id) {
      $this->db->query('SELECT * FROM routers WHERE id = :id');

      // Bind value
      $this->db->bind(':id', $id);

      $row = $this->db->single();
      return $row;
    }

    public function updateRouter($data) {
      $this->db->query('UPDATE routers SET room = :room, ip = :ip, incharge = :incharge WHERE id = :id');

      // Bind value
      $this->db->bind(':room', $data['room']);
      $this->db->bind(':ip', $data['ip']);
      $this->db->bind(':incharge', $data['incharge']);
      $this->db->bind(':id', $data['id']);

      // Execute query
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function deleteRouter($id) {
      $this->db->query('DELETE FROM routers WHERE id = :id');

      // Bind value
      $this->db->bind(':id', $id);

      // Execute query
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
  }
