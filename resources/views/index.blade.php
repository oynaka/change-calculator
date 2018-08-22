<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body>

    <div class="container">
        <h3>Change Calculator</h3>
        <p>
            Enter amount of money do you want, click 'Calculate' and see what you will get as a minimum bills and coins.
        </p>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <strong>Error</strong> {{$error}}
                </div>
            @endforeach
        @endif
        <div class="row">
            <div class="col col-md-6 col-lg-4">
                <form method="POST" action="">
                {{ csrf_field() }}
                    <div class="input-group">
                      <input type="text" class="form-control" name="user_input" id="user_input" value="{{$user_input}}" placeholder="Your money amount here" aria-describedby="btnCalculate">
                      <input type="hidden" name="mode" id="mode" value="calculate">
                      <div class="input-group-append">
                         <button class="btn btn-outline-primary" type="submit" id="btnCalculate">Calculate</button>
                      </div>
                    </div>
                    <small class="text-muted">Number or decimal number only</small>
                </form>
            </div>
        </div>
        @if (isset($result))
            <div class="row mt-3">
                <div class="col col-xs-12 col-sm-6 col-md-4">
                    <p>What you will get</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach($result as $key => $val)
                                <tr>
                                    <td><strong>{{$key}}</strong></td>
                                    <td class="text-right">x {{$val}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
  </body>
</html>