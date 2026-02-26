export default function cartList() {
    return {
        items: [],
        total_price: 0,
        total_quantity: 0,
        loading: false,
        error: null,

        /**
         * Получение корзины
         */
        async fetchCart() {
            this.loading = true
            this.error = null

            try {
                const data = await window.request('/ajax/cart')

                this.items = data.data?.items ?? []
                this.total_price = data.data?.total_price ?? 0
                this.total_quantity = data.data?.total_quantity ?? 0

            } catch (e) {
                this.error = 'Ошибка загрузки корзины'
                console.error(e)
            }

            this.loading = false
        },

        /**
         * Очистить корзину
         */
        async clear() {
            try {
                const data = await window.request(`/ajax/cart`, {
                    method: 'DELETE'
                })
                console.log(data)

                window.dispatchEvent(new Event('cart-updated'))
            } catch (e) {
                alert('Ошибка очистки корзины')
            }
        },

        /**
         * Инициализация компонента
         */
        init() {
            this.$watch('$store.cart.open', value => {
                if (value) {
                    this.fetchCart()
                }
            })

            window.addEventListener('cart-updated', () => {
                this.fetchCart()
            })
        }
    }
}
