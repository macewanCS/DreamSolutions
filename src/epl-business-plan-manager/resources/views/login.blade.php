<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8"></meta>
    <title>Business Plan Manager</title>
    <link rel="stylesheet" type="text/css" href="/css/bpm.css"></link>
  </head>
  
  <body>
    <div id="login-area">
      
      <header id="login-header">
      	<img id="epl-logo" src="images/epl-logo.jpg" alt="EPL Logo"></img>
      	<h1 id="login-title">Business Plan<br>Manager</h1>
      </header>
      
      
    	{!! Form::open() !!}
        
        <b>{!! Form::label('Username:') !!}</b>
    	  {!! Form::text('username', null, ['class' => 'form-control']) !!}

        <br>

        <b>{!! Form::label('password:') !!}</b>
        {!! Form::text('password') !!}

        <br><br>

        
        {!! Form::submit('Login', ['id' => "login-submit-button"]) !!}
        

      {!! Form::close() !!}
      
      @yield('content')


    </div>
  </body>
  
</html>