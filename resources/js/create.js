const chapterApp = Vue.createApp({
    data() {
        return {
            wordBook: 0,
            chapters: []
        }
    },
    created() {
        this.getChapter()
    },
    methods: {
        getChapter() {
            getApi('/api/book/' + this.wordBook).then(data => {
                this.chapters = data
            }).then(err => console.log(err))
        }
    }
}).mount('#create-chapter')

async function getApi(url) {
    const res = await fetch(url);
    const data = res.json()
    return data
}