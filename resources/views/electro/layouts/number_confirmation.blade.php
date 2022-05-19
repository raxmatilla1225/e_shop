<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('auth.confirm')}}" method="post">
    @method('POST')
    @csrf
    <label for="confirm">В указанный номер {{$phone}}, был отправлен код подтверждения</label>
    <br>
    Для успешной регистрации введите код
    <input name="phone" value="{{$phone}}" type="hidden" >
    <input name="confirm_code" type="text" id="confirm">
    <br>
    <div>
        <button type="submit">Отправить</button>
    </div>
</form>
</body>
</html>


