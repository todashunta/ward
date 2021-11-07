const chapterApp = Vue.createApp({
    data() {
        return {
            wordBook: 0,
            chapters: [],
            exist: false
        }
    },
    created() {
        this.getChapter(this.wordBook)
    },
    methods: {
        getChapter(id) {
            getApi('/api/book/' + id).then(data => {
                console.log(data)
                this.chapters = data.chapters
                this.exist = true
                if (data.word_book == false) {
                    this.exist = false
                }
            }).then(err => console.log(err))
        }
    },
    watch: {
        wordBook(e) {
            this.getChapter(e)
        }
    }
}).mount('#create-chapter')

async function getApi(url) {
    const res = await fetch(url);
    const data = res.json()
    return data
}