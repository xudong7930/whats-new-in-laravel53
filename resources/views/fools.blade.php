<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://ehd4.f3322.net/youtube/bootstrap337/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        @foreach ($fools as $fool)
            @ if ($loop->index % 4 == 0)
            <li class="{{ $loop->first ? 'first' : '' }}">{{ $fool->name }}</li>
            @endif
        @endforeach
        <form method="POST" action="">
            {{ csrf_field() }}
            {{ method_feild('POST') }}
            <div class="form-group">
                 <label for="one" class="control-label">One:</label>
                 <input type="text" id="one" name="onename" class="form-control" value="{{ old('onename') }}" />
             </div> 
            <button class="btn btn-primary">ok</button>
        </form>

    </div>
</body>
</html>
