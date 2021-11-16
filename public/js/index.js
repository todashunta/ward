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
            chapterFrameActive: false,
            chapterName: 'チャプター選択',
            selectReset: false,
        }
    },
    watch:{
        selectBookId() {
            const selectBookName = document.querySelector('.word-book-input input[type="radio"]:checked + label')
            this.wordBookName = selectBookName.textContent
            this.chapterName = 'チャプター選択'
            getApi('/api/chapters/' + this.selectBookId).then(data => {
                this.chapters = data.chapters
            }).catch(err => {
                console.log(err)
            })
        },
        selectChapterId() {
            const selectChapterName = document.querySelector('.chapter-input input[type="radio"]:checked + label')
            this.chapterName = selectChapterName.textContent
             this.getWords()
        }
    },
    methods: {
        reset(){
            console.log('reset')
            this.wordBookFrameActive = false
            const wordBookInput = document.querySelector('.word-book-input')
            wordBookInput.style.display = 'none'
            this.chapterFrameActive = false
            const chapterInput = document.querySelector('.chapter-input')
            chapterInput.style.display = 'none'
        },
        wordBookFrame (){
            this.wordBookFrameActive = !this.wordBookFrameActive
            const wordBookInput = document.querySelector('.word-book-input')
            const resetCover = document.getElementById('reset-cover')
            if(this.wordBookFrameActive){
                wordBookInput.style.display = 'flex'
                resetCover.style.height = '100%'

            }else{
                wordBookInput.style.display = 'none'
            }
        },
        chapterFrame(){
            this.chapterFrameActive = !this.chapterFrameActive
            const chapterInput = document.querySelector('.chapter-input')
            if(this.chapterFrameActive){
                chapterInput.style.display = 'flex'
            }else{
                chapterInput.style.display = 'none'
            }
        },
        async getWords() {
            await fetch('api/words/' + this.selectChapterId)
                .then(res => {
                    return res.json()
                })
                .then(data => {
                    this.words = data.words
                    console.log(data)
                    this.wordExist = true
                }).catch(err => {
                    console.log(err)
                });
        }
    }
}).mount('#app')

async function getApi(url){
    const res = await fetch(url);
    const data = res.json();
    return data
}

