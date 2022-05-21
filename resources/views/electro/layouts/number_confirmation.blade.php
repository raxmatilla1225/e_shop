<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body style="display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;">
<div class="row">
    <div class="container">
        <form action="{{route('auth.confirm')}}" method="post">
            @method('POST')
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">В указанный номер {{$phone}}, был отправлен код подтверждения</label>
                <input type="hidden" name="phone" value="{{$phone}}">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="confirm_code">
                <small id="emailHelp" class="form-text text-muted">Для успешной регистрации введите код</small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>
</div>
</body>
</html>


