let loc = window.location;
let pathname = decodeURI(loc.pathname);
let service = pathname.split('/')[1];
let slug = pathname.split('/')[2]
let container = document.querySelector("#echo-detail > div.news-bottom-link.noprint > ul");
var xhttp = new XMLHttpRequest();
if (service = 'بخش-شبکه-های-اجتماعی-78') {
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(xhttp.responseText);
            title = res[0].title;
            href = 'https://feedmark.ir/news/'+res[0].id+'?utm_source=rokna&utm_medium=NewsHelperLinks&utm_campaign=OwnerNews';

            let node = "<a href='"+href+"' target='_blank' title='"+title+"' itemprop='url'>"+title+"</a>";
            let temp = document.createElement('li');
            temp.innerHTML = node;
            container.insertBefore(temp, container.childNodes[4]);
        }
    };
    xhttp.open("GET", "https://feedmark.ir/api/v1/publisher/9/1", true);
    xhttp.send();
}
