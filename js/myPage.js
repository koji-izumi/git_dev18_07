// データベースに登録されている書籍の数だけ繰り返し処理
for (let i = 0; i < js_bm_ISBN.length; i++) {
    // Google books APIからISBNコードで検索し取得
    let bm_search = "https://www.googleapis.com/books/v1/volumes?q=isbn:" + js_bm_ISBN[i];
    $.getJSON(bm_search, function (data) {
        let title = data.items[0].volumeInfo.title;
        let authors;
        if (data.items[0].volumeInfo.authors) {
            authors = data.items[0].volumeInfo.authors;
        }
        let thumbnail;
        if (data.items[0].volumeInfo.imageLinks) {
            thumbnail = data.items[0].volumeInfo.imageLinks.thumbnail;
        }
        // amazonのURLを取得
        let amazon = "https://www.amazon.co.jp/s?k="+js_bm_ISBN[i];
        $(".main-bm").append(
            `<div class="book">
                <div class="book-img">
                    <img src="${thumbnail}">
                </div>
                <div class="book-info">
                    <p class="title">${title}</p>
                    <p class="authors">${authors}</p>
                    <button class="amazon">Amazon</button>
                </div>
            </div>`);
            $(".amazon").on("click",function(){
                window.open(`${amazon}`,"_blank");
            })

    })
}