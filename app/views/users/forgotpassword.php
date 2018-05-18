<?php require_once APPROOT. '/views/inc/header.php' ?>

<div class="container">

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-4">
                
                <h2>Forgot Password</h2>
                <p>Please Enter Your E-mail</p>

                <form action="<?php echo URLROOT; ?>users/forgotpassword" method="POST">
                    <div class="form-group">
                        <label for="email">Email:<sup>*</sup></label>
                        <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php if(isset($data['email'])) {echo $data['email'];} ?>">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="Submit" value="Recover Password" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<?php require_once APPROOT. '/views/inc/footer.php' ?>