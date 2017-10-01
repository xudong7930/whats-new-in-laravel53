@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Account Setting</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="/account/setting">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="name" class="control-label">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') ?? $user->name }}" />
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Email:</label>
                            <input type="text" id="email" name="email" class="form-control" value="{{ old('email') ?? $user->email }}" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Update MyAccount</button>
                        </div>
                    </form>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
