const app = Vue.createApp({
    data(){
        return {
            selectBookId: '0',
            selectChapterId: '0',
            chapters: {},
            words: [],
            wordExist: false,
            wordBookName: '単語帳選択',
            wordBookFrameActive: false,
        }
    },
    watch:{
        selectBookId() {
            const selectBookName = document.querySelector('.word-book-input input[type="radio"]:checked + label')
            this.wordBookName = selectBookName.textContent
            getApi('/api/chapters/' + this.selectBookId).then(data => {
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
        wordBookFrame (){
            this.wordBookFrameActive = !this.wordBookFrameActive
            const wordBookInput = document.querySelector('.word-book-input')
            if(this.wordBookFrameActive){
                wordBookInput.style.display = 'flex'
            }else{
                wordBookInput.style.display = 'none'
            }
        },
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

