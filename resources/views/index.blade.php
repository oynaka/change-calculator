<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Calculator</title>

  </head>
  <body>
    <h2>Calculator</h2>
    <form method="POST" action="">
    {{ csrf_field() }}
    <input type="text" name="user_input" id="user_input" value="{{$user_input}}">
    <br/><br/>
    <input type="hidden" name="mode" id="mode" value="calculate">
    <input type="submit" value="Submit">
    </form>
    
    @if (isset($result))
        
        Your change is 
        <table>
        @foreach($result as $key => $val)
        <tr>
            <td>{{$key}}</td>
            <td>{{$val}}</td>
        </tr>
        @endforeach
        </table>
    @endif
  </body>
</html>