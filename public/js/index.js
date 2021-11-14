const app = Vue.createApp({
    data(){
        return {
            selectBookId: '0',
            selectChapterId: '0',
            chapters: [],
            words: [],
            wordExist: false,
        }
    },
    watch:{
        selectBookId() {
            getApi('/api/chapters/' + this.selectBookId).then(data => {
                console.log(data)
                this.chapters = data.chapters
            }).catch(err => {
                console.log(err)
            })
        },
        selectChapterId() {
             this.getWords()
        }
    },
    methods: {
        async getWords() {
            await fetch('api/words/' + this.selectChapterId)
                .then(res => {
                    return res.json()
                })
                .then(data => {
                    this.words = data.words
                    this.wordExist = true
                }).catch(err => {
                    console.log(err)
                });
            for ([index, word] of this.words.entries()) {
                await fetch('/api/means/' + word.id)
                    .then(res => {
                        return res.json()
                    })
                    .then(data => {
                        this.words[index].means = data.means
                    }).catch(err => {
                        console.log(err)
                    })
            
            }
        }
    }
}).mount('#app')

async function getApi(url){
    const res = await fetch(url);
    const data = res.json();
    return data
}

