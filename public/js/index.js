const app = Vue.createApp({
    data(){
        return {
            selectBookId: '0',
            chapters: [],
        }
    },
    watch:{
        selectBookId() {
            getApi('/api/book/' + this.selectBookId).then(data => {
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