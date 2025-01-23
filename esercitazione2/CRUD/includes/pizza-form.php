<?php

function pizzaForm(string $action, string $method = 'POST', Pizza $pizza = null): void
{
    $isCreate = !!$pizza;
    ?>
    <form action="<?=$action?>" method="<?=$method?>">

        <input type="hidden" name="id" value="<?= !$isCreate ? $pizza->id : ""?>">

        <label for="gusto">Gusto</label>
        <input type="text" value=<?=!$isCreate ? $pizza->gusto : ""?> name="gusto" id="gusto" class="form-control" placeholder="gusto">

        <label for="prezzo">Prezzo</label>
        <input type="number" value=<?=!$isCreate ? $pizza->prezzo : ""?> name="prezzo" id="prezzo" class="form-control" placeholder="prezzo">

        <label for="disponibilita">Disponibile</label>
        <select value=<?=!$isCreate ? $pizza->disponibilita : ""?> name="disponibilita" id="disponibilita" class="form-control">
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>

        <button class="mt-3 btn btn-primary">Salva</button>
    </form>
    <?php
}