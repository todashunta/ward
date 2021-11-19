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
            excelObj: '',
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
                }
                if (mode == 'word') {
                    this.word.chapters = data.chapters
                    this.word.exist = true
                    if (data.word_book == false) {
                        this.word.exist = false
                    }
                }
            }).catch(err => console.log(err))
        },
        selectFile(e) {
            var input = e.target;
            var reader = new FileReader();
            reader.onload = () => {
                var fileData = reader.result;
                var wb = XLSX.read(fileData, {type : 'binary'});
                wb.SheetNames.forEach((sheetName) => {
                    var rowObj =XLSX.utils.sheet_to_json(wb.Sheets[sheetName]);
                    this.excelObj = rowObj
                    this.excelData = rowObj
                    console.log(this.excelData)
                    postExcel('/api/excel', this.excelData)
                    .then(data => {
                        console.log(data)
                    })
                    .catch(err => {
                        console.log(err)
                    })
                })
            };
            reader.readAsBinaryString(input.files[0]);


        },
        excelUp() {
            console.log('click')
        }
    },
    watch: {
        chapterWordBook(e) {
            this.getChapter(e, 'chapter')
        },
        wordWordBook(e) {
            this.getChapter(e, 'word')
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