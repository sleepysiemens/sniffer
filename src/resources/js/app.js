import 'bootstrap'
import Alpine from 'alpinejs'
import cartList from './alpine/cart-list'
import cartToggle from './alpine/cart-toggle'
import cartCount from './alpine/cart-count'

window.Alpine = Alpine

Alpine.store('cart', cartToggle())
Alpine.data('cartList', cartList)
Alpine.data('cartCount', cartCount)
Alpine.start()
