<?php if(isset($result)) : ?>
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <?= $result ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
    
<?php endif; ?>

<div class="wrapper">
    <!-- Nav tabs -->
    <ul class="nav nav-pills nav-fill justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" data-target="#comandas">Comandas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" data-target="#menu">Menu</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="comandas" role="tabpanel" aria-labelledby="home-tab"><?php include 'helper/comandas.php'; ?></div>
        <div class="tab-pane" id="menu" role="tabpanel" aria-labelledby="profile-tab"><?php include 'helper/menu.php'; ?></div>
    </div>
</div>
