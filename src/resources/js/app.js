import 'bootstrap'
import Alpine from 'alpinejs'
import cartList from './alpine/cart-list'
import cartToggle from './alpine/cart-toggle'
import cartCount from './alpine/cart-count'
import productList from './alpine/product-list'
import productDetails from './alpine/product-details'
import latestProducts from "./alpine/latest-products";
import deliveryInfo from "./alpine/delivery-info";
import orderList from "./alpine/order-list";
import orderDetails from "./alpine/order-details";

window.Alpine = Alpine

window.request = async function(url, options = {}) {
    const xsrfToken = decodeURIComponent(
        document.cookie
            .split('; ')
            .find(row => row.startsWith('XSRF-TOKEN='))
            ?.split('=')[1] || ''
    )

    const response = await fetch(url, {
        credentials: 'same-origin',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            'X-XSRF-TOKEN': xsrfToken,
            ...(options.headers || {})
        },
        ...options
    })

    if (! response.ok) {
        let errorData = null
        try { errorData = await response.json() } catch (e) {}
        throw errorData ?? new Error('Request failed')
    }

    if (response.status === 204) {
        return null
    }

    return response.json()
}

window.cartItemIncrement = async function (id) {
    try {
        await window.request(`/ajax/cart/${id}/increment`, {
            method: 'POST'
        })

        window.dispatchEvent(new Event('cart-updated'))
    } catch (e) {
        //console.error('Increment error:', e)
    }
}

window.cartItemDecrement = async function (id) {
    try {
        await window.request(`/ajax/cart/${id}/decrement`, {
            method: 'POST'
        })

        window.dispatchEvent(new Event('cart-updated'))
    } catch (e) {
        //console.error('Decrement error:', e)
    }
}

window.cartItemDelete = async function (id) {
    try {
        await window.request(`/ajax/cart/${id}`, {
            method: 'DELETE'
        })
        window.dispatchEvent(new Event('cart-updated'))
    } catch (e) {
        console.error('Delete error:', e)
    }
}

Alpine.store('cart', cartToggle())
Alpine.data('cartList', cartList)
Alpine.data('cartCount', cartCount)
Alpine.data('productList', productList)
Alpine.data('productDetails', productDetails)
Alpine.data('latestProducts', latestProducts)
Alpine.data('deliveryInfo', deliveryInfo)
Alpine.data('orderList', orderList)
Alpine.data('orderDetails', orderDetails)

Alpine.start()
