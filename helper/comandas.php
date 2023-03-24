<div class="container py-5">
    <?php if(mysqli_num_rows(getOrders($mysqli)) > 0) : ?>

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
                                <h5 class="mt-0 font-weight-bold mb-2">Fecha/hora última comanda</h5>
                                <p class="font-italic text-muted mb-0 small"><small><?= showDatetime($row['createdAt']); ?></small></p>
                            </div>
                        </div>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

    <?php else: ?>

        <div class="row">
            <p>No orders found</p>
        </div>

    <?php endif; ?>
</div>
