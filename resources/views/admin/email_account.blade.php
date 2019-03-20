<div>
    <h1>Hi, below are your account details.</h1>
    <p>Username: {{$username}}</p>
    <p>Password: {{$password}}</p>

    <p>Log in here: <a href="{{ url('/admin' ) }}">{{ config('app.name', 'Laravel') }}</a></p>

</div>