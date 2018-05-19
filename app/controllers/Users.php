<?php

  class Users extends Controller {
    public function __construct() {
      $this->userModel = $this->model('User');
    }

    public function register() {

      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Validate Data
        if(empty($data['name'])) {
          $data['name_err'] = 'Please enter a Name';
        }

        if(empty($data['email'])) {
          $data['email_err'] = 'Please enter an Email';
        } else {
          // Check University Email
       /*   if(!preg_match("/[a-z]+\d{2}[a-z]+\d{3}@ncuindia\.edu/", $data['email'])) {
            $data['email_err'] = 'Enter a valid email';
          } else{ */
            // Check email
            if($this->userModel->findUserByEmail($data['email'])) {
              $data['email_err'] = 'Email is already taken';
            }
        /*  } */
        }

        if(empty($data['password'])) {
          $data['password_err'] = 'Please enter a Password';
        } elseif(strlen($data['password']) < 6) {
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        if(empty($data['confirm_password'])) {
          $data['confirm_password_err'] = 'Please enter a Confirm Password';
        } else {
          if($data['password'] != $data['confirm_password']) {
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }

        // Make sure no errors
        if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
          // Validated

          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register($data)) {
            flash('register_success', 'User is now registered.');
            redirect('users/register');
          } else {
            die('Something went wrong');
          }

        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }

      } else {
        if(!isLoggedIn()) {
          flash('register_error', 'You need to login.', 'alert alert-danger');
          redirect('users/login');
        }
        elseif( isset($_SESSION['user_role']) && $_SESSION['user_role'] == 0) {
          // Init data
          $data = [
            'name' => '',
            'email' => '',
            'password' => '',
            'confirm_password' => '',
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
          ];

          // Load view
          $this->view('users/register', $data);          
        } else {
          redirect('pages/index');
        }
      }
    }

    public function login() {

      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => ''
        ];

        // Validate Data
        if(empty($data['email'])) {
          $data['email_err'] = 'Please enter an Email';
        }

        // Validate Password
        if(empty($data['password'])) {
          $data['password_err'] = 'Please enter a Password';
        }

        // Check for user/email
        if($this->userModel->findUserByEmail($data['email'])) {
          // User found
        } else {
          $data['email_err'] = 'No user found';
        }

        // Make sure no errors
        if(empty($data['email_err']) && empty($data['password_err'])) {
          // Validated

          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser) {
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password Incorrect';
            $this->view('users/login');
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }
      } elseif(!isLoggedIn()) {
        // Init data
        $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => ''
        ];

        // Load view
        $this->view('users/login', $data);
      } else {
        redirect('pages/index');
      }
    }

    public function createUserSession($user) {
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      $_SESSION['user_role'] = $user->role;
      redirect('posts/index');
    }

    public function logout() {
      // Delete session
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      unset($_SESSION['user_role']);
      session_destroy();

      redirect('users/login');
    }

    public function forgotpassword() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
          'email' => trim($_POST['email']),
          'email_err' => ''
        ];

        // Validate Data
        if(empty($data['email'])) {
          $data['email_err'] = 'Please enter an Email';
        }

        // Check for user/email
        $user = $this->userModel->findUserByEmail($data['email']);
        if($user) {
          // User found
        } else {
          $data['email_err'] = 'No user found';
        }

        // Make sure no errors
        if(empty($data['email_err'])) {
          
          $token = md5(rand(0, 1000000));
          $_SESSION['token'] = $token;
          mailer($user->email,$user->name,$token);
          flash('recover_success', 'Please check your Email to continue.');
          redirect('users/login');

        } else {
          // Load view with errors
          $this->view('users/forgotpassword', $data);
        } 
      } else {
        $data = [
          'email' => '',
          'email_err' => '',
        ];

        // LOAD VIEW
        $this->view('users/forgotpassword', $data);
      }
    }

    public function recover() {
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
      } else if(isset($_GET['email']) && isset($_GET['token'])) {
        
        if(isset($_SESSION['token']) && $_SESSION['token'] == $_GET['token']) {    
          // DELETE TOKEN
          unset($_SESSION['token']);
          $data = [
            'password' => '',
            'confirm_password' => '',
            'password_err' => '',
            'confirm_password_err' => ''
          ];
          // LOAD VIEW
          $this->view('users/recover', $data);
        } else {
          flash('recover_error', 'The Token has expired. Try again.', 'alert alert-danger');
          redirect('users/forgotpassword');
        }
      } else {
        redirect('pages/index');
      }
    }

  }