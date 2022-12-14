let loc = window.location;
let pathname = decodeURI(loc.pathname);
let service = pathname.split('/')[1];
let slug = pathname.split('/')[2];
let container = document.querySelector("#rssbank");
var xhttp = new XMLHttpRequest();
if (service = 'بخش-پول-سرمایه-12') {
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(xhttp.responseText);
            title = res[0].title;
            href = 'https://feedmark.ir/news/'+res[0].id+'?utm_source=eghtesad100&utm_medium=RssBank&utm_campaign=OwnerNews';

            let node = "<svg xmlns='http://www.w3.org/2000/svg' aria-hidden='true' role='img' width='18' height='18' preserveAspectRatio='xMidYMid meet' viewBox='0 0 512 512'><path fill='#00adef' d='M256 504C119 504 8 393 8 256S119 8 256 8s248 111 248 248s-111 248-248 248zm28.9-143.6L209.4 288H392c13.3 0 24-10.7 24-24v-16c0-13.3-10.7-24-24-24H209.4l75.5-72.4c9.7-9.3 9.9-24.8.4-34.3l-11-10.9c-9.4-9.4-24.6-9.4-33.9 0L107.7 239c-9.4 9.4-9.4 24.6 0 33.9l132.7 132.7c9.4 9.4 24.6 9.4 33.9 0l11-10.9c9.5-9.5 9.3-25-.4-34.3z'></path></svg>\n" +
                "<div class='detail'><h2 class='title' itemprop='headLine'><a href='"+href+"' target='_blank' title='"+title+"'>"+title+"</a></h2></div>";
            let temp = document.createElement('li');
            temp.innerHTML = node;
            container.insertBefore(temp, container.childNodes[4]);
        }
    };
    xhttp.open("GET", "https://feedmark.ir/api/v1/publisher/17/1", true);
    xhttp.send();
}
