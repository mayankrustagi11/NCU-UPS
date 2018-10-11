<?php

  class Routers extends Controller {
    public function __construct() {
      $this->routerModel = $this->model('Router');
      $this->firebaseObject = new FirebaseDatabase();
    }

    public function index() {
      $routers = $this->routerModel->getRouters();

      $data = [
        'routers' => $routers
      ];

      $this->view('routers/index', $data);
    }

    public function add() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
          'room' => trim($_POST['room']),
          'ip' => trim($_POST['ip']),
          'incharge' => trim($_POST['incharge']),
          'room_err' => '',
          'ip_err' => '',
          'incharge_err' => ''
        ];

        // Validate Data
        if(empty($data['room'])) {
          $data['room_err'] = 'Please enter a Room No';
        } else if(strlen($data['room']) < 3 || strlen($data['room']) > 3) {
          $data['room_err'] = 'Please enter a valid Room No';
        } else if($this->routerModel->findRouterByRoomNo($data['room'])) {
          $data['room_err'] = 'Entry for this room already exists.';
        }

        if(empty($data['ip'])) {
          $data['ip_err'] = 'Please enter an IP Address';
        } else if(strlen($data['ip']) < 7 || strlen($data['ip']) > 15) {
          $data['ip_err'] = 'Please enter a valid IP Address';
        } else if($this->routerModel->findRouterByIP($data['ip'])) {
          $data['ip_err'] = 'IP Address is already taken';
        }

        if(empty($data['incharge'])) {
          $data['incharge_err'] = 'Please enter a Incharge Name';
        } else if(strlen($data['incharge']) > 40) {
          $data['incharge_err'] = 'Incharge Name can be upto 40 characters';
        }

        // Make sure no errors
        if(empty($data['room_err']) && empty($data['ip_err']) && empty($data['incharge_err'])) {
          // Validated

          // Add Router
          if($this->routerModel->add($data)) {
            flash('add_router_success', 'Router Added.');
            redirect('routers/index');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('routers/add', $data);
        }
        
      } else {
        if(!isLoggedIn()) {
          redirect('users/login');
        }
        elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 0) {
          // Init data
          $data = [
            'room' => '',
            'ip' => '',
            'incharge' => '',
            'room_err' => '',
            'ip_err' => '',
            'incharge_err' => ''
          ];

          // Load view
          $this->view('routers/add', $data);          
        } else {
          redirect('pages/index');
        }
      }
    }

    public function edit($id) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize Post array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'id' => $id,
          'room' => trim($_POST['room']),
          'ip' => trim($_POST['ip']),
          'incharge' => trim($_POST['incharge']),
          'room_err' => '',
          'ip_err' => '',
          'incharge_err' => ''
        ];

        // Validate Data
        if(empty($data['room'])) {
          $data['room_err'] = 'Please enter a Room No';
        } else if(strlen($data['room']) < 3 || strlen($data['room']) > 3) {
          $data['room_err'] = 'Please enter a valid Room No';
        }

        if(empty($data['ip'])) {
          $data['ip_err'] = 'Please enter an IP Address';
        } else if(strlen($data['ip']) < 7 || strlen($data['ip']) > 15) {
          $data['ip_err'] = 'Please enter a valid IP Address';
        }

        if(empty($data['incharge'])) {
          $data['incharge_err'] = 'Please enter a Incharge Name';
        } else if(strlen($data['incharge']) > 40) {
          $data['incharge_err'] = 'Incharge Name can be upto 40 characters';
        }

        // Make sure no errors
        if(empty($data['room_err']) && empty($data['ip_err']) && empty($data['incharge_err'])) {
          // Validated
          if($this->routerModel->updateRouter($data)) {
            flash('update_router_success', 'Router Details Updated');
            redirect('routers/index');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('routers/edit',$data);
        }
      } else {
        if(!isLoggedIn()) {
          redirect('users/login');
        } else {
          // Get Router Details
          $router = $this->routerModel->getRouterById($id);
          
          if(!$router) {
            flash('fetch_router_fail', 'Router Does Not Exist', 'alert alert-danger');
            redirect('routers/index');
          } 

          $data = [
            'id' => $router->id,
            'room' => $router->room,
            'ip' => $router->ip,
            'incharge' => $router->incharge,
            'room_err' => '',
            'ip_err' => '',
            'incharge_err' => ''
          ];
  
          $this->view('routers/edit', $data);
        }
      }
    }

    public function delete($id = null) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if($this->routerModel->deleteRouter($id)) {
          flash('delete_router_success', 'Router Details Removed');
          redirect('routers/index');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('routers/index');
      }
    }

    public function fetch($id = null) {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {

      } else {
        // No Room Entered
        if($id == null) {
          flash('fetch_router_fail', 'No Router Entered', 'alert alert-danger');
          redirect('routers/index');
        } 
        // Get Router Details
        $router = $this->routerModel->getRouterById($id);
        
        if(!$router) {
          flash('fetch_router_fail', 'Router Does Not Exist', 'alert alert-danger');
          redirect('routers/index');
        }

        $data = $this->firebaseObject->get();
        $this->view('routers/fetch', $data);
      }
    }

  }