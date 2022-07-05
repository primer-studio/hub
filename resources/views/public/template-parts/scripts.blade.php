@if(\Request::route()->getName() == 'Public > Real time')
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
            xhttp.open("GET", "http://localhost:8000/real-time/news/timestamp/100", true);
            xhttp.send();
        }
    </script>
@endif
