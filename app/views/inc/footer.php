<footer>
    <div class="container">

        <div class="row align-items-center">
            <div class=" col-lg-3 col-md-3 col-sm-12">
                <a href="<?php echo URLROOT; ?>">
                    <img src="<?php echo URLROOT; ?>img/nculogo.png" width="130" height="60">
                </a>
            </div>

            <div class="col-lg-6 col-md-4 col-sm-12">
                <nav>
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
                        <?php if(isset($_SESSION['user_id'])) :?>
                        <li class="list-inline-item"><a class="nav-link" href="http://192.168.121.127:1880/ui/#/0" target="_blank">Dashboard</a></li>
                        <li class="list-inline-item"><a class="nav-link" href="http://192.168.125.41/dashboard/project/containers/container/IoT" target="_blank">Cloud</a></li>
                        <?php else : ?>
                        <li class="list-inline-item"><a href="<?php echo URLROOT; ?>users/login">Login</a></li>          
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-3 col-md-5 col-sm-12">
                <p class="pull-right">&copy; 2018 The NorthCap University</p>
            </div>
        </div>

    </div>
</footer>

<script src="<?php echo URLROOT; ?>/js/jquery.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.js"></script>
<script src="<?php echo URLROOT; ?>/js/main.js"></script>

</body>

</html>