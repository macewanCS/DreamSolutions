<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8"></meta>
    <title>Business Plan Manager</title>
    <link rel="stylesheet" href="css/bpm.css">
  </head>
  
  <body>
    <div id="login-area">
      
      <header id="login-header">
      	<img id="epl-logo" src="images/epl-logo.jpg" alt="EPL Logo"></img>
      	<h1 id="login-title">Business Plan<br>Manager</h1>
      </header>
      
      
    	{!! Form::open(['url' => 'login']) !!}
        
        <div id="login-field">
        {!! Form::label('Username') !!}
    	  {!! Form::text('username', null, ['class' => 'form-control']) !!}
        </div>

        <div class="login-field">
        {!! Form::label('Password') !!}
        {!! Form::password('password') !!}
        </div>

        
        {!! Form::submit('Login', ['id' => "login-submit-button"]) !!}
        

      {!! Form::close() !!}
      
      @yield('content')


    </div>
  </body>
  
</html>