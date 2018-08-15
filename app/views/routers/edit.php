<?php require_once APPROOT. '/views/inc/header.php' ?>
<div class="container">

  <div class="row">
    <div class="col-md-6 mx-auto mb-4">
      <div class="card card-body bg-light mt-4">
          <h2>Edit Router Details</h2>
          <form action="<?php echo URLROOT; ?>routers/edit/<?php echo $data['id']; ?>" method="POST">

            <div class="form-group">
              <label for="room">Room No: <sup>*</sup></label>
              <input type="text" name="room" class="form-control form-control-lg <?php echo (!empty($data['room_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['room']; ?>">
              <span class="invalid-feedback"><?php echo $data['room_err']; ?></span>
            </div>

            <div class="form-group">
              <label for="ip">IP Address: <sup>*</sup></label>
              <input type="text" name="ip" class="form-control form-control-lg <?php echo (!empty($data['ip_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['ip']; ?>">
              <span class="invalid-feedback"><?php echo $data['ip_err']; ?></span>
            </div>

            <div class="form-group">
              <label for="incharge">Incharge: <sup>*</sup></label>
              <input type="text" name="incharge" class="form-control form-control-lg <?php echo (!empty($data['incharge_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['incharge']; ?>">
              <span class="invalid-feedback"><?php echo $data['incharge_err']; ?></span>
            </div>

            <div class="row">
              <div class="col">
                <input type="Submit" value="Save Changes" class="btn btn-success btn-block">
              </div>
            </div>

          </form>
      </div>
    </div>
  </div>

</div>  

<?php require_once APPROOT. '/views/inc/footer.php' ?>
