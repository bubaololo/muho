<div>
    <div>
        <label for="name">Способ доставки</label>
        <fieldset>

            <legend>Выберите один из доступных способов доставки:</legend>
            <div class="delivery__type">
                <div>
                    <input type="radio" class="btn-check" name="deliveryType" wire:model="deliveryType" id="sdek" value="sdek"
                    >
                    <label class="btn btn-outline-success" for="sdek">Сдэк</label>
                    @if($cdekCalculatedDeliveryCost !== null)
                        <small class="text-muted">цена: {{  $cdekCalculatedDeliveryCost }}</small>
                    @endif

                </div>

                <div>
                    <input type="radio" class="btn-check" name="deliveryType" wire:model="deliveryType" id="post" value="post">
                    <label class="btn btn-outline-success" for="post">Почта</label>
                    @if($postCalculatedDeliveryCost !== null)
                        <small class="text-muted">цена: {{  $postCalculatedDeliveryCost }}</small>
                    @endif
                </div>
            </div>
        </fieldset>
    </div>
</div>
