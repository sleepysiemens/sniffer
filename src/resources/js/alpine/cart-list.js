export default function cartList() {
    return {
        items: [],
        total_price: 0,
        total_quantity: 0,
        loading: false,
        error: null,

        /**
         * Универсальный AJAX helper
         */
        async request(url, options = {}) {
            const response = await fetch(url, {
                credentials: 'same-origin',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        ?.getAttribute('content'),
                    ...(options.headers || {})
                },
                ...options
            })

            if (!response.ok) {
                let errorData = null

                try {
                    errorData = await response.json()
                } catch (e) {}

                console.error('AJAX ERROR:', errorData)

                throw errorData ?? new Error('Request failed')
            }

            return response.json()
        },

        /**
         * Получение корзины
         */
        async fetchCart() {
            this.loading = true
            this.error = null

            try {
                const data = await this.request('/ajax/cart')
                
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
         * Увеличить количество
         */
        async increment(id) {
            try {
                await this.request(`/ajax/cart/${id}/increment`, {
                    method: 'POST'
                })

                window.dispatchEvent(new Event('cart-updated'))
            } catch (e) {
                alert(e?.message ?? 'Ошибка увеличения количества')
            }
        },

        /**
         * Уменьшить количество
         */
        async decrement(id) {
            try {
                await this.request(`/ajax/cart/${id}/decrement`, {
                    method: 'POST'
                })

                window.dispatchEvent(new Event('cart-updated'))
            } catch (e) {
                alert('Ошибка уменьшения количества')
            }
        },

        /**
         * Удалить товар
         */
        async remove(id) {
            try {
                await this.request(`/ajax/cart/${id}`, {
                    method: 'DELETE'
                })

                window.dispatchEvent(new Event('cart-updated'))
            } catch (e) {
                alert('Ошибка удаления')
            }
        },

        /**
         * Очистить корзину
         */
        async clear() {
            try {
                await this.request(`/ajax/cart`, {
                    method: 'DELETE'
                })

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
