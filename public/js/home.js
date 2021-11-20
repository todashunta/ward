const app = Vue.createApp({
    data() {
        return {
            word: 'word',
            mean: '単語',
            num: 0,
        }
    },
    methods: {
        shuffle(){
            console.log('shuffle')
        },
        leftSkip(){
            console.log('leftSkip')
        },
        start(){
            console.log('start')
        },
        rightSkip(){
            console.log('rightSkip')
        },
        repeat(){
            console.log('repeat')
        },
    }
}
).mount('#app')