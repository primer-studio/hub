let loc = window.location;
let pathname = decodeURI(loc.pathname);
let service = pathname.split('/')[1];
let slug = pathname.split('/')[2]
if (service = 'بخش-اقتصاد-۷') {
    let container = document.querySelector("#news-page-article > div.article_body > div.mrgt.noprint.shadow.brdrdius > section > ul");
    let newsticker = document.querySelector("body > main > div > div > div > div.page_first_clm.printw100 > section.newssticker > ul");
    let topten = document.querySelector("body > main > div > div > div > div.page_first_clm.printw100 > div.news_body > section.editor_suggestion.news_page_textBox.container > div > ul");
    let inlineNews = document.querySelector("#echo-detail > div:nth-child(1) > section > ul.mrgt.boxpd");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(xhttp.responseText);
            title = res[0].title;
            href_one = 'https://feedmark.ir/news/'+res[0].id+'?utm_source=gostareshNews&utm_medium=NewsReadMoreBox&utm_campaign=OwnerNews';
            href_two = 'https://feedmark.ir/news/'+res[0].id+'?utm_source=gostareshNews&utm_medium=NewsTicker&utm_campaign=OwnerNews';
            href_tree = 'https://feedmark.ir/news/'+res[0].id+'?utm_source=gostareshNews&utm_medium=TopTenEconomical&utm_campaign=OwnerNews';
            href_four = 'https://feedmark.ir/news/'+res[0].id+'?utm_source=gostareshNews&utm_medium=InlineNewsBox&utm_campaign=OwnerNews';

            let node = "<div class=''><i class='fa fa-window-minimize' aria-hidden='true'></i><a href='"+href_one+"' target='_blank' title='"+title+"' itemprop='url'>"+title+"</a></div>";
            let temp = document.createElement('li');
            temp.innerHTML = node;
            container.insertBefore(temp, container.firstChild);

            let ticker = "<h3 itemprop='headLine'><a href='"+href_two+"' target='_blank' title='"+title+"' itemprop='url'>"+title+"</a></h3>";
            let temp_2 = document.createElement('li');
            temp_2.innerHTML = ticker;
            newsticker.insertBefore(temp_2, newsticker.firstChild);

            let top = "<div class='l_development_content'><i class='fa fa-window-minimize' aria-hidden='true'></i><a href='"+href_tree+"' target='_blank' title='"+title+"' itemprop='url'>"+title+"</a></div>";
            let temp_3 = document.createElement('li');
            temp_3.innerHTML = top;
            topten.insertBefore(temp_3, topten.firstChild);

            let inline = "<div class='inline_tag_box'><h4 class='title'><i class='fa fa-circle' aria-hidden='true'></i><a class='blue' href='"+href_four+"' target='_blank' title='"+title+"' itemprop='url'>"+title+"</a></h4></div>";
            let temp_4 = document.createElement('li');
            temp_4.innerHTML = inline;
            inlineNews.insertBefore(temp_4, inlineNews.firstChild);
        }
    };
    xhttp.open("GET", "https://feedmark.ir/api/v1/publisher/2/1", true);
    xhttp.send();
}
