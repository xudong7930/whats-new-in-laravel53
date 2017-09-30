<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://ehd4.f3322.net/youtube/bootstrap337/css/bootstrap.min.css">
</head>
<body>
    <img src="{{ asset('storage/avatars/1/avatar.png') }}">
    <form method="post" action='/avatar' enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="avatar" class="control-label">Avatar:</label>
            <input type="file" id="avatar" name="avatar" class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary">upload now</button>
    </form>
</body>
</html>
