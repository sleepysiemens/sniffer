export default function deliveryInfo() {
    return {
        loading: false,
        delivery_types: [],
        selected_delivery: null,
        payment_methods: [],
        selected_payment: null,

        async fetchDeliveryTypes() {
            try {
                const data = await window.request(`/api/delivery_types`)

                this.delivery_types = data.data ?? []

                if (this.delivery_types.length) {
                    this.selected_delivery = this.delivery_types[0].value
                }
            } catch (e) {
                console.error('Delivery types load error:', e)
            }
        },

        async fetchPaymentMethods() {
            try {
                const data = await window.request(`/api/payment_methods`)

                this.payment_methods = data.data ?? []

                if (this.payment_methods.length) {
                    this.selected_payment = this.payment_methods[0].value
                }
            } catch (e) {
                console.error('Payment methods load error:', e)
            }
        },

        init() {
            this.loading = true

            this.fetchDeliveryTypes()
            this.fetchPaymentMethods()

            this.loading = false
        },

    }
}
