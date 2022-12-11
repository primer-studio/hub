@if(!is_null(\Request::route()) && \Request::route()->getName() == 'Public > Real time')
    <script>
        var intervalID = window.setInterval(getLates, 3000);

        function getLates() {
            var xhttp = new XMLHttpRequest();
            var container = document.getElementById('realtime-container');
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    container.innerHTML = xhttp.responseText;
                }
            };
            xhttp.open("GET", "{{ Route('Real Time > News', ['timestamp', 100]) }}", true);
            xhttp.send();
        }
    </script>
@endif

@if(!is_null(\Request::route()) && \Request::route()->getName() == 'Public > Index')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            tippy('a.news-title', {
                content(reference) {
                    const id = reference.getAttribute('data-template');
                    const template = document.getElementById(id);
                    return template.innerHTML;
                },
                allowHTML: true,
            });
        });
    </script>
@endif

<script>
    let mobile_sticky = document.querySelector('#position-sticky');
    let mobile_sticky_close = document.querySelector('#position-sticky-close');
    mobile_sticky_close.addEventListener('click', () => {
        mobile_sticky.classList.toggle('uk-hidden');
    });
</script>

<script>
    cookie = getCookie('theme-mode');
    body = document.querySelector('body');
    body.classList.toggle(cookie);

    function switchTheme(dispatcher) {
        body = document.querySelector('body');
        body.classList.toggle('dark-mode');
        body.classList.toggle('light-mode');
        setCookie('theme-mode', body.classList.toString())
    }

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        let expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
</script>

@if(!is_null(\Request::route()) && \Request::route()->getName() == 'Public > Show > News')
    <script>
        /**
         * Main form request handler
         * */
        function SetDummyTag(dispatcher, tag_id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    let msg = JSON.parse(this.responseText);
                    UIkit.notification({
                        message: msg.message,
                        status: msg.type,
                        pos: 'bottom-right',
                        timeout: 3000
                    });
                    dispatcher.style.background = '#fff !important';
                }
            };
            xhttp.open("POST", "{{ route('Admin > Ajax > SetDummyTag') }}", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
            xhttp.send("id=" + tag_id);
        }

    </script>
@endif
