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
            this.wordBookFrameActive = false
            const wordBookInput = document.querySelector('.word-book-input')
            wordBookInput.style.display = 'none'
            this.chapterFrameActive = false
            const chapterInput = document.querySelector('.chapter-input')
            chapterInput.style.display = 'none'
            const resetCover = document.getElementById('reset-cover')
            resetCover.style.height = '0'
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
                resetCover.style.height = '0'
            }
        },
        chapterFrame(){
            this.chapterFrameActive = !this.chapterFrameActive
            const chapterInput = document.querySelector('.chapter-input')
            const resetCover = document.getElementById('reset-cover')
            if(this.chapterFrameActive){
                chapterInput.style.display = 'flex'
                resetCover.style.height = '100%'
            }else{
                chapterInput.style.display = 'none'
                resetCover.style.height = '0'
            }
        },
        async getWords() {
            await fetch('api/words/' + this.selectChapterId)
                .then(res => {
                    return res.json()
                })
                .then(data => {
                    this.words = data.words
                    console.log(this.words)
                    this.wordExist = true
                }).catch(err => {
                    console.log(err)
                });
        },
        dlExcel(){
            let wopts = {
                bookType: 'xlsx',
                bookSST: false,
                type: 'binary'
            };
            let workbook = {SheetNames: [], Sheets: {}};
            document.querySelectorAll('table.table-to-export').forEach(function (currentValue, index) {
                // sheet_to_workbook()の実装を参考に記述
                let n = currentValue.getAttribute('data-sheet-name');
                if (!n) {
                    n = 'Sheet' + index;
                }
                workbook.SheetNames.push(n);
                workbook.Sheets[n] = XLSX.utils.table_to_sheet(currentValue, wopts);
            });
            let wbout = XLSX.write(workbook, wopts);
            function s2ab(s) {
                let buf = new ArrayBuffer(s.length);
                let view = new Uint8Array(buf);
                for (let i = 0; i != s.length; ++i) {
                view[i] = s.charCodeAt(i) & 0xFF;
                }
                return buf;
            }
            saveAs(new Blob([s2ab(wbout)], {type: 'application/octet-stream'}), 'test.xlsx');
            }
            }
}).mount('#app')

async function getApi(url){
    const res = await fetch(url);
    const data = res.json();
    return data
}