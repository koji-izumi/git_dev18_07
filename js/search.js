// 検索ワードをGoogle books APIで検索
let searchURL = "https://www.googleapis.com/books/v1/volumes?q=" + js_searchWord;

$.getJSON(searchURL, function (data) {
    if (!data.totalItems) {
        $(".main").append(`<p>該当する書籍がありません</p>`)

    } else {

        // 該当書籍が存在した場合、JSONから値を取得して入力項目のデータを取得する
        for (let i = 0; i < data.items.length; i++) {
            if (data.items[i].volumeInfo.industryIdentifiers.length == 1) {
                ;
            } else {
                let title = data.items[i].volumeInfo.title;
                let authors;
                if (data.items[i].volumeInfo.authors){
                authors = data.items[i].volumeInfo.authors;
                }
                let thumbnail;
                if (data.items[i].volumeInfo.imageLinks) {
                    thumbnail = data.items[i].volumeInfo.imageLinks.thumbnail;
                }
                let description;
                if (data.items[i].volumeInfo.description) {
                    description = data.items[i].volumeInfo.description;
                }
                const ISBN = data.items[i].volumeInfo.industryIdentifiers[1].identifier;
                let amazon = "https://www.amazon.co.jp/s?k="+ISBN;
                // 登録フォームを表示
                $(".main").append(`
                <form action="insert.php" method ="post" class="book">
                    <div class="book-img">
                        <img src="${thumbnail}">
                    </div>
                    <div class="book-info-search">
                        <p class="title">${title}</p>
                        <p class="authors">${authors}</p>
                        <p class="description">${description}</p>
                        <div>
                        <button type="button" class="amazon">Amazon</button>
                        <label><input type="hidden" name="ISBN" value="${ISBN}"></label>
                        <input type="submit" value="ブックマークに登録" class="bookmark">
                        </div>
                    </div>
                    
                </form>
                `
                )
                $(".amazon").on("click",function(){
                    window.open(`${amazon}`,"_blank");
                    return fasle
                })
            }
        }
    }

    $(".bookmark").on("click",function() {
        alert("ブックマークに登録しました");
    })


}
);