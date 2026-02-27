export default function latestProducts() {
    return {
        products: [],
        loading: false,

        async fetchProducts() {
            this.loading = true

            try {
                const data = await window.request(`/api/products/latest?only_available=true`)
                this.products = data.data ?? []
            } catch (e) {
                console.error('Products load error:', e)
            }

            this.loading = false
        },
    }
}
