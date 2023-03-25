<div class="container py-5">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <form method="post">
                <ul class="list-group shadow flex-outer">
                    <li class="list-group-item">
                        <label>MESA</label>
                        <input type="number" name="mesa" id="mesa" min="1" value="1">
                    </li>
                    <li class="list-group-item">
                        <label><?= CARTA['plato-1']; ?></label>
                        <input type="number" name="plato-1" id="plato-1" min="0" value="0">
                    </li>
                    <li class="list-group-item">
                        <label><?= CARTA['plato-2']; ?></label>
                        <input type="number" name="plato-2" id="plato-2" min="0" value="0">
                    </li>
                    <li class="list-group-item">
                        <label><?= CARTA['plato-3']; ?></label>
                        <input type="number" name="plato-3" id="plato-3" min="0" value="0">
                    </li>
                    <li class="list-group-item">
                        <label><?= CARTA['plato-4']; ?></label>
                        <input type="number" name="plato-4" id="plato-4" min="0" value="0">
                    </li>
                    <li class="list-group-item">
                        <label><?= CARTA['plato-5']; ?></label>
                        <input type="number" name="plato-5" id="plato-5" min="0" value="0">
                    </li>
                    <li class="list-group-item">
                        <label><?= CARTA['plato-6']; ?></label>
                        <input type="number" name="plato-6" id="plato-6" min="0" value="0">
                    </li>
                    <li class="list-group-item">
                        <input type="hidden" name="req" value="neworder" readonly>
                        <input type="submit" value="Comandar">
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>