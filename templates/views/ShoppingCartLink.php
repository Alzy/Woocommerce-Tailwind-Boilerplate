<a href="/cart" class="relative block">
    <?php
    global $woocommerce;
    ?>
    CART (
    <span class="cart-size text-base" data-length="<?= $woocommerce->cart->cart_contents_count ?>">
        <?= $woocommerce->cart->cart_contents_count ?>
    </span>
    )
</a>