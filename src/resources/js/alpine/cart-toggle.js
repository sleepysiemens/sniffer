export default function cartToggle() {
    Alpine.store('cart', {
        open: false,

        show() {
            this.open = true
        },

        hide() {
            this.open = false
        },
    })
}
