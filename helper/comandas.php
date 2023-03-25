<div class="options">
</div>
<div class="container py-5">
    <?php if(mysqli_num_rows(getOrders($mysqli)) > 0) : ?>
        <form method="post" action="index.php">
            <ul class="flex-outer options">
                <input type="hidden" name="req" value="deleteorders" readonly>
                <li>
                    <input type="submit" value="Procesar comandas">
                </li>
            </ul>        
        </form>
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <ul class="list-group shadow">
                    <?php
                    $result = getOrders($mysqli);
                    while ($row = $result->fetch_assoc()) { 
                    ?>
                    <li class="list-group-item">
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                                <h5 class="mt-0 font-weight-bold mb-2">Mesa <?= $row['ntable']; ?> (id <?= $row['id']; ?>)
                                    <?= 1==$row['special']?'🧠':''; ?>
                                </h5>
                                <p class="font-italic text-muted mb-0 small"><small><?= showDatetime($row['createdAt']); ?></small></p>
                                <?= showDishes($row['dishes']); ?>
                            </div>
                        </div>
                        <form method="post">
                            <input type="hidden" name="req" value="dispachorder" readonly>
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <input type="submit" value="Procesar comanda">
                        </form>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

    <?php else: ?>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <ul class="list-group shadow">
                    <li class="list-group-item">
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <p>No hay comandas en cola</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    <?php endif; ?>
</div>
