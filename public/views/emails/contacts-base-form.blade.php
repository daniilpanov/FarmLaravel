<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>

    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
<h1>Обращение со страницы контактов</h1>
<div>
    Имя: {{ $msg->name }}
</div>
<div>
    Телефон: <a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $msg->tel) }}">{{ $msg->tel }}</a>
</div>
<div>
    E-Mail: <a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a>
</div>

@if($msg->msg)
    <div>
        <span>Текст сообщения:</span>
        <blockquote>
            {{ $msg->msg }}
        </blockquote>
    </div>
@endif
</body>
</html>
