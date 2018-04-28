<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="container">

    <a class="navbar-brand" href="<?php echo URLROOT; ?>">
      <img src="<?php echo URLROOT; ?>img/nculogo.png" width="130" height="60" class="d-inline-block align-top">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">

      <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['user_id'])) :?>
          <li class="nav-item">
            <a class="nav-link" href="http://192.168.121.127:1880/ui/#/0" target="_blank">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://192.168.125.41/dashboard/project/containers/container/IoT" target="_blank">Cloud</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><?php echo 'Welcome, '.$_SESSION['user_name']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>users/logout">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>users/login">Login</a>
          </li>
        <?php endif ?>
      </ul>

    </div>

  </div>

</nav>
