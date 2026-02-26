export default function productDetails(id) {
    return {
        id: id,
        product: [],
        quantity: 0,
        loading: false,

        async fetchProduct() {
            this.loading = true

            try {
                const data = await window.request(`/api/products/${this.id}`)

                this.product = data.data ?? []
                this.getInCartAmount()

            } catch (e) {
                console.error('Product load error:', e)
            }

            this.loading = false
        },

        async getInCartAmount() {
            const { data } = await window.request('/ajax/cart')
            const item = data?.items?.find(i => i.product_id === this.id)

            this.quantity = item?.quantity ?? 0
        },

        init() {
            this.fetchProduct()

            window.addEventListener('cart-updated', () => {
                this.getInCartAmount()
            })
        }
    }
}
