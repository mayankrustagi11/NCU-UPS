<?php require_once APPROOT. '/views/inc/header.php' ?>

<section id="about">
    <div class="container">

        <h2 class="text-center">Frequently Asked Questions</h2>

        <?php foreach($data['questions'] as $question) :?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-1" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
                    <?php echo $question->question; ?> <i class="fas fa-angle-down"></i>
                </h5>

                <div class="collapse" id="collapse1">
                    <p class="card-text"><?php echo $question->answer; ?></p>
                </div>
            </div>
        </div>
        <?php endforeach ?>

    </div>
</section>

<?php require_once APPROOT. '/views/inc/footer.php' ?>