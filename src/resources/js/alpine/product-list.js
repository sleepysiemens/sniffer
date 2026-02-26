export default function productList() {
    return {
        products: [],
        meta: {},
        loading: false,
        page: 1,

        async fetchProducts(page = 1) {
            this.loading = true

            try {
                const data = await window.request(`/api/products?only_available=true&page=${page}`)

                this.products = data.data ?? []
                this.meta = data.meta ?? {}
                this.page = this.meta.current_page ?? 1


                const url = new URL(window.location)
                url.searchParams.set('page', this.page)
                window.history.pushState({}, '', url)

                window.scrollTo({ top: 0, behavior: 'smooth' })
            } catch (e) {
                console.error('Products load error:', e)
            }

            this.loading = false
        },

        next() {
            if (this.page < this.meta.last_page) {
                this.fetchProducts(this.page + 1)
            }
        },

        prev() {
            if (this.page > 1) {
                this.fetchProducts(this.page - 1)
            }
        },

        goTo(page) {
            if (page >= 1 && page <= this.meta.last_page) {
                this.fetchProducts(page)
            }
        },

        init() {
            const params = new URLSearchParams(window.location.search)
            const pageFromUrl = parseInt(params.get('page'))

            this.fetchProducts(pageFromUrl || 1)
        },
    }
}
