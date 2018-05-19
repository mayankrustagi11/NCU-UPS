<?php require_once APPROOT. '/views/inc/header.php' ?>

<div class="container">

  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-4">
        <?php flash('register_error'); ?>
        <h2>Recover Account</h2>
        <form action="<?php echo URLROOT; ?>users/recover" method="POST">

            <div class="form-group">
              <label for="password">Password: <sup>*</sup></label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>

            <div class="form-group">
              <label for="confirm_password">Confirm Password: <sup>*</sup></label>
              <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
              <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
            </div>

          <div class="row">
            <div class="col">
              <input type="Submit" value="Change Password" class="btn btn-success btn-block">
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>  

<?php require_once APPROOT. '/views/inc/footer.php' ?>
