<!doctype html>
<html lang="fa-IR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $news->title }}</title>
    <meta name="robots" content="index, nofollow">
</head>
<body>
<iframe src='{{ $news->url }}' style='width:100%; overflow:visible; height: 100vh !important;' frameborder='0' title='{{ $news->title }}' ></iframe>
</body>
</html>
