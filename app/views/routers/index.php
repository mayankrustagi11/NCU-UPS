<?php require_once APPROOT. '/views/inc/header.php' ?>
<div class="container">

    <div class="row">
        <div class="col-md-6 mx-auto mt-2">
            <?php flash('add_router_success'); ?>
            <?php flash('delete_router_success'); ?>
            <?php flash('update_router_success'); ?>

            <h2 class="text-center mt-4">All Routers</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <a href="<?php echo URLROOT; ?>routers/add" class="btn btn-info" role="button">Add Router</a>
        </div>
    </div>

    <table id="router-table" class="table table-dark text-center align-middle mb-4">
        <thead>
        <tr>
            <th>Room No.</th>
            <th>Incharge</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($data['routers'] as $router): ?>
                <tr>
                    <td><?php echo $router->room; ?></td>
                    <td><?php echo $router->incharge; ?></td>
                    <td>
                        <a href="<?php echo 'http://'.$router->ip.':1880/ui/#/0'; ?>" target="_blank" class="btn btn-light" role="button" title="View Dashboard">
                            <i class="fas fa-tachometer-alt"></i>
                        </a>
                        <a href="<?php echo URLROOT; ?>routers/edit/<?php echo $router->id; ?>" role="button" class="btn btn-light" title="Edit Details">
                            <i class="far fa-edit"></i>
                        </a>
                        <form action="<?php echo URLROOT; ?>routers/delete/<?php echo $router->id; ?>" method="POST" class="d-inline-block">
                            <button type="submit" class="btn btn-light" title="Delete Details">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

<?php require_once APPROOT. '/views/inc/footer.php' ?>