<a href="" class="mx-3" @click.prevent="$store.cart.show()" x-data="cartCount()">
    <i class="fa-solid fa-cart-shopping fs-4"></i>
    <span x-show="total_quantity > 0"
          x-text="total_quantity"
          class="position-absolute translate-middle badge rounded-circle bg-primary">
    </span>
</a>
