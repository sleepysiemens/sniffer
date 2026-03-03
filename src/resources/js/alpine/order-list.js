export default function orderList() {
    return {
        orders: [],
        meta: {},
        loading: false,
        page: 1,

        async fetchOrders() {
            this.loading = true

            try {
                const data = await window.request(`/ajax/order/by_user?&page=${this.page}`)

                this.orders = data.data ?? []
                this.meta = data.meta ?? {}
                this.page = this.meta.current_page ?? 1

                window.scrollTo({ top: 0, behavior: 'smooth' })
            } catch (e) {
                console.error('Orders load error:', e)
            }

            this.loading = false
        },

        next() {
            if (this.page < this.meta.last_page) {
                this.page++
                this.fetchOrders()
            }
        },

        prev() {
            if (this.page > 1) {
                this.page--
                this.fetchOrders(this.page)
            }
        },

        goTo(page) {
            if (page >= 1 && page <= this.meta.last_page) {
                this.page = page
                this.fetchOrders()
            }
        },

        init() {
            this.fetchOrders()
        },
    }
}
