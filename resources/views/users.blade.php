<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://ehd4.f3322.net/youtube/bootstrap337/css/bootstrap.min.css">
</head>
<body>
    @foreach ($users as $user)
        <li>{{ $user->name }}</li>
    @endforeach
    
    {{ $users->links() }

</body>
</html>
