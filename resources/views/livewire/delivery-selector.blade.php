<div>
    <div>
        <label for="name">Способ доставки</label>
        <fieldset>

            <legend>Выберите один из доступных способов доставки:</legend>
            <div class="delivery__type">
                <div>
                    <input type="radio" wire:model="deliveryType" id="sdek" value="sdek"
                    >
                    <label for="sdek">Сдэк</label>
                </div>

                <div>
                    <input type="radio" wire:model="deliveryType" id="avito" value="avito">
                    <label for="avito">Авито</label>
                </div>

                <div>
                    <input type="radio" wire:model="deliveryType" id="post" value="post">
                    <label for="post">Почта</label>
                </div>
            </div>
        </fieldset>
    </div>
</div>
