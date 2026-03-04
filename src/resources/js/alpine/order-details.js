export default function orderDetails(id) {
    return {
        id: id,
        order: [],
        loading: false,

        async fetchProduct() {
            this.loading = true

            try {
                const data = await window.request(`/ajax/order/${this.id}`)

                this.order = data.data ?? []
            } catch (e) {
                console.error('Product load error:', e)
            }

            this.loading = false
        },

        init() {
            this.fetchProduct()
        }
    }
}
