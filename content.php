<div class="wrapper">
    <!-- Nav tabs -->
    <ul class="nav nav-pills nav-fill justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" data-target="#comandas">Comandas</a>
        </li>
    </ul>

    <form method="post" action="index.php">
        <input type="hidden" name="req" value="generateneworder" readonly>
        <input type="submit" value="Agregar nueva comanda">
    </form>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="comandas" role="tabpanel" aria-labelledby="home-tab"><?php include 'helper/comandas.php'; ?></div>
    </div>
</div>
