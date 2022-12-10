let loc = window.location;
let pathname = decodeURI(loc.pathname);
let service = pathname.split('/')[1];
let slug = pathname.split('/')[2]
if (service = 'بخش-اقتصاد-۷') {
    let container = document.querySelector("#news-page-article > div.article_body > div.mrgt.noprint.shadow.brdrdius > section > ul");
    let newsticker = document.querySelector("body > main > div > div > div > div.page_first_clm.printw100 > section.newssticker > ul");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(xhttp.responseText);
            title = res[0].title;
            href_one = 'https://feedmark.ir/news/'+res[0].id+'?utm_source=gostareshNews&utm_medium=NewsReadMoreBox&utm_campaign=OwnerNews';
            href_two = 'https://feedmark.ir/news/'+res[0].id+'?utm_source=gostareshNews&utm_medium=NewsTicker&utm_campaign=OwnerNews';
            // let node = "<div class='l_development_content'><i class='fa fa-window-minimize' aria-hidden='true'></i><a href='"+href+"' target='_blank' title='"+title+"' itemprop='url'>"+title+"</a></div>";
            let node = "<div class=''><i class='fa fa-window-minimize' aria-hidden='true'></i><a href='"+href_one+"' target='_blank' title='"+title+"' itemprop='url'>"+title+"</a></div>";
            let ticker = "<h3 itemprop='headLine'><a href='"+href_two+"' target='_blank' title='"+title+"' itemprop='url'>"+title+"</a></h3>";
            let temp = document.createElement('li');
            temp.innerHTML = node;
            container.insertBefore(temp, container.firstChild);

            temp.innerHTML = ticker;
            ticker.insertBefore(temp, ticker.firstChild);
        }
    };
    xhttp.open("GET", "https://feedmark.ir/api/v1/publisher/2/1", true);
    xhttp.send();
}
