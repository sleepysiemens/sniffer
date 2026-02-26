export default function cartCount() {
    return {
        total_quantity: 0,
        loading: false,

        async fetchCount() {
            this.loading = true

            try {
                const data = await window.request('/ajax/cart')
                const cart = data.data ?? data

                this.total_quantity = cart.total_quantity ?? 0
            } catch (e) {
                console.error('Cart indicator error:', e)
            }

            this.loading = false
        },

        init() {
            this.fetchCount()

            // обновление после любых изменений
            window.addEventListener('cart-updated', () => {
                this.fetchCount()
            })
        }
    }
}
