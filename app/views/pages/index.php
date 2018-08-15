<?php require_once APPROOT. '/views/inc/header.php' ?>

<section class="d-flex align-items-center" id="hero">
  <div class="container clearfix">

    <div class="row justify-content-center">
      <h1 class="text-center">UPS Monitoring System</h1>
    </div>

    <div class="row justify-content-center">
      <p class="lead">Monitor Campus on the Go</p>
    </div>

  </div>
</section>

<section id="optin">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 col-sm-12 col-md-12">
        <p class="lead text-center">
          <strong>Want to know More?</strong> We'll tell our story.
        </p>
      </div>

      <div class="col-lg-4 col-sm-12 col-md-12">
        <a href="<?php echo URLROOT; ?>pages/about" class="btn btn-success btn-lg btn-block">Click to know more</a>
      </div>

    </div>
  </div>
</section>

<section id="project-features">
  <div class="container text-center">

    <h2 class="text-center">Project Features</h2>
    <p class="lead">
      An online real-time monitoring tool for monitoring status of equipment installed in University such as UPSs, computer systems
      in the lab, pronters, etc. and real-time message alerts for any critical condition. 24x7 Automated Monitoring and Alerted
      for UPs's installed for various labs and utilities in the University with smart sensors and base units.
    </p>

    <div class="row">

      <div class="col-lg-4 col-md-12 col-sm-12">
        <img src="<?php echo URLROOT; ?>/img/icon-design.png" alt="Design">
        <h3>Internet of Things</h3>
        <p>The
          <strong>Internet of things (IoT)</strong> is a computing concept that describes the idea of everyday physical objects being
          connected to the internet and being able to identify themselves to other devices</p>
      </div>

      <div class="col-lg-4 col-md-12 col-sm-12">
        <img src="<?php echo URLROOT; ?>/img/icon-cms.png" alt="Cloud">
        <h3>Openstack</h3>
        <p>
          <strong>OpenStack</strong> is a free and open-source software platform for cloud computing, mostly deployed as infrastructure-as-a-service,
          whereby virtual servers and other resources are made available to customers</p>
      </div>

      <div class="col-lg-4 col-md-12 col-sm-12">
        <img src="<?php echo URLROOT; ?>/img/icon-code.png" alt="Application">
        <h3>Android &amp; Web</h3>
        <p>
          <strong>Mobile</strong> and
          <strong>Web</strong> Platforms are provided to provide real-time visualizations and to notify of issues from multiple sensors
          and base units in a centralized dashboard.</p>
      </div>

    </div>

  </div>
</section>

<section id="developers">
  <div class="container text-center">
    <div class="row">

      <div class="col-md-8 col-sm-12 offset-md-2">

        <h2 class="text-center">Developers</h2>

        <?php foreach($data['developers'] as $developer) : ?>

        <div class="row testimonial">
          <div class="col-lg-4 col-md-12">
            <img src="<?php echo URLROOT; ?>/img/developers/<?php echo $developer->profilepic; ?>" alt="<?php echo $developer->name; ?>">
          </div>
          <div class="col-lg-8 col-md-12">

            <blockquote>
              <?php echo $developer->description; ?>
              <br>
              <cite>&mdash;
                <?php echo $developer->name; ?>
              </cite>
            </blockquote>

            <div id="social-items">
              <a href="https://github.com/<?php ?>" target="_blank" class="badge social github">
                <i class="fab fa-github"></i>
              </a>
              <a href="https://www.linkedin.com<?php ?>" target="_blank" class="badge social linkedin">
                <i class="fab fa-linkedin-in"></i>
              </a>
              <a href="https://twitter.com<?php ?>" target="_blank" class="badge social twitter">
                <i class="fab fa-twitter"></i>
              </a>
            </div>

          </div>
        </div>

        <?php endforeach ?>

      </div>

    </div>
  </div>
</section>

<?php require_once APPROOT. '/views/inc/footer.php' ?>