@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <passport-clients></passport-clients>
            <passport-auth-clients></passport-auth-clients>
            <passport-personal-acesstokens></passport-personal-acesstokens> 
            <example></example>   
        </div>
    </div>
</div>
@endsection
