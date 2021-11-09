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
        selectChapterId(){
            getApi('api/words/' + this.selectChapterId).then(data => {
                console.log(data.words);
                for(word of data.words){
                    getApi('/api/means/' + word.id).then(data => {
                        console.log(data)
                    }).catch(err => {
                        console.log(err)
                    })
                }
                this.words = data.words
                this.wordExist = true
            }).catch(err => {
                console.log(err)
            })
        }
    }
}).mount('#app')

async function getApi(url){
    const res = await fetch(url);
    const data = res.json();
    return data
}