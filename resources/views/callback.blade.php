<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://ehd4.f3322.net/youtube/bootstrap337/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form method="POST" action='http://localhost:8000/oauth/token'>
            {{ csrf_field() }}
            <div class="form-group">
                <label for="grant-type" class="control-label">Grant Type:</label>
                <input type="text" id="grant-type" name="grant_type" class="form-control" value="{{ $authData['grant_type'] }}" />
            </div>
            <div class="form-group">
                <label for="client_id" class="control-label">Client ID:</label>
                <input type="text" id="client_id" name="client_id" class="form-control" value="{{ $authData['client_id'] }}" />
            </div>
            <div class="form-group">
                <label for="client-secret" class="control-label">Client Secret:</label>
                <input type="text" id="client-secret" name="client_secret" class="form-control" value="{{ $authData['client_secret'] }}" />
            </div>
            <div class="form-group">
                <label for="redirect-uri" class="control-label">Redirect-Uri:</label>
                <input type="text" id="redirect-uri" name="redirect_uri" class="form-control" value="{{ $authData['redirect_uri'] }}" />
            </div>
            <div class="form-group">
                <label for="code" class="control-label">Code:</label>
                <input type="text" id="code" name="code" class="form-control" value="{{ $authData['code'] }}" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
