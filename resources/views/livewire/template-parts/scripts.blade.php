<script>
    function update_dataset() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("update_dataset").innerHTML = this.responseText;
       }
    };
    xhttp.open("GET", "{{ route('Jobs > Update > News') }}", true);
    document.getElementById("update_dataset").innerHTML = 'in process ...';
    xhttp.send();
}

@if (session('message'))
UIkit.notification({
    message: '{{ session("message") }}',
    status: 'primary',
    pos: 'bottom-right',
    timeout: 5000
});
@endif
@php
    session()->forget('message');
@endphp

</script>