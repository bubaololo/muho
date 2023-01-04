@if ($cart_count == 0)
    <span>пусто</span>
@elseif ($cart_count == 1)
    <span> <strong class="cart-accent">{{ $cart_count }}</strong> товар</span>
@elseif  ($cart_count > 1 && $cart_count < 5)
    <span><strong class="cart-accent" >{{ $cart_count }}</strong> товара</span>
@else
    <span><strong class="cart-accent" >{{ $cart_count }}</strong> товаров</span>
@endif



