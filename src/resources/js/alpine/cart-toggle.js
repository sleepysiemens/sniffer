export default function cartToggle() {
    Alpine.store('cart', {
        open: false,

        show() {
            if(! window.location.pathname.includes('cart')) {
                this.open = true
            }
        },

        hide() {
            this.open = false
        },
    })
}
