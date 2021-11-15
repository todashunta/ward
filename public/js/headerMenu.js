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
            const cover = document.getElementById('cover');
            if (this.headerMenuAaction) {
                this.headerMenu = 'active'
                slideBar.style.transform = 'translate(0)'
                cover.style.left = '0'
            } else {
                this.headerMenu = ''
                slideBar.style.transform = 'translate(500px)'
                cover.style.left = '100%'
            }
        }
    }
}).mount('#header-menu')