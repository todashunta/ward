const app = Vue.createApp({
    data(){
        return {
            selectBookId: '0',
            chapters = [],
        }
    },
    created(){
        getApi('https://localhost/book/' + selectBookId).then(data => {
            console.log(data)
        })
    },
    watch:{

    }
}).mount('#app')

async function getApi(url){
    const res = await fetch(url);
    const data = res.json();
    return data
}