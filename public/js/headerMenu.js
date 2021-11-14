console.log('aa')
const headerMenu = Vue.createApp({
    data() {
        return {
            menu: false,
            headerMenuAaction: false,
            headerMenu: '',
        }
    },
    methods: {
        menuToggle() {
            this.headerMenuAaction = !this.headerMenuAaction
            const slideBar = document.getElementById('slide-bar');
            if (this.headerMenuAaction) {
                this.headerMenu = 'active'
                slideBar.style.transform = 'translate(0)'
            } else {
                this.headerMenu = ''
                slideBar.style.transform = 'translate(-450px)'
            }
        }
    }
}).mount('#header-menu')