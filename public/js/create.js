const app = Vue.createApp({
    data() {
        return {
            chapterWordBook: 0,
            chapter: {
                chapters: [],
                exist: false
            },
            wordWordBook: 0,
            word: {
                chapters: [],
                exist: false
            },
            excelWordBook: '',
            excelChapter: '',
            excel: {
                chapters: [],
                exist: false,
            },
            excelData: ''
        }
    },
    methods: {
        getChapter(id, mode) {
            getApi('/api/chapters/' + id).then(data => {
                console.log(data)
                if (mode == 'chapter') {
                    this.chapter.chapters = data.chapters
                    this.chapter.exist = true
                    if (data.word_book == false) {
                        this.chapter.exist = false
                    }
                }else if (mode == 'word') {
                    this.word.chapters = data.chapters
                    this.word.exist = true
                    if (data.word_book == false) {
                        this.word.exist = false
                    }
                }else if (mode == 'excel') {
                    this.excel.chapters = data.chapters
                    this.excel.exist = true
                    if (data.word_book == false) {
                        this.excel.exist = false
                    }
                }
            }).catch(err => console.log(err))
        },
        selectFile(e) {
            let input = e.target;
            let reader = new FileReader();
            reader.onload = () => {
                let fileData = reader.result;
                let wb = XLSX.read(fileData, {type : 'binary'});
                wb.SheetNames.forEach((sheetName) => {
                    let rowObj =XLSX.utils.sheet_to_json(wb.Sheets[sheetName]);
                    this.excelData = rowObj
                    console.log(this.excelData)
                })
            };
            reader.readAsBinaryString(input.files[0]);


        },
        excelUp() {
            if (this.excelData[0].word_book_id == null) {
                this.excelData.unshift({
                'word_book_id': this.excelWordBook,
                'chapter_id': this.excelChapter
            })
            }
            postExcel('/api/excel', this.excelData)
                .then(data => {
                    console.log(data)
                })
                .catch(err => {
                    console.log(err)
                })
        }
    },
    watch: {
        chapterWordBook(e) {
            this.getChapter(e, 'chapter')
        },
        wordWordBook(e) {
            this.getChapter(e, 'word')
        },
        excelWordBook(e) {
            this.getChapter(e, 'excel')
        }
    }
}).mount('#create')

async function getApi(url) {
    const res = await fetch(url);
    const data = res.json()
    return data
}

async function postExcel(url, postData){
    const res = await fetch(url ,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json, charset=utf-8',
        },
        body: JSON.stringify(postData)
    })
    const data = res.json()
    return data
}