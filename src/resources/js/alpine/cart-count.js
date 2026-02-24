export default function cartCount() {
    return {
        total_quantity: 0,
        loading: false,

        async request(url) {
            const response = await fetch(url, {
                credentials: 'same-origin',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                }
            })

            if (!response.ok) {
                throw new Error('Request failed')
            }

            return response.json()
        },

        async fetchCount() {
            this.loading = true

            try {
                const data = await this.request('/ajax/cart')

                // если JsonResource с оберткой
                const cart = data.data ?? data

                this.total_quantity = cart.total_quantity ?? 0
            } catch (e) {
                console.error('Cart indicator error:', e)
            }

            this.loading = false
        },

        init() {
            // загрузка при старте
            this.fetchCount()

            // обновление после любых изменений
            window.addEventListener('cart-updated', () => {
                this.fetchCount()
            })
        }
    }
}
