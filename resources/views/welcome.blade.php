<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <button type="button" onclick="location.href='{{ url('completed') }}'" name="button">create pokemons table</button>
            <button type="button" onclick="location.href='{{ url('profile') }}'" name="button">create profiles table</button>

            <div class="content">
              <table>
                <thead>
                  <tr>
                    <th style="width:50px;">sprite(front_default)</th>
                    <th style="width:50px;">name</th>
                    <th style="width:50px;">base_experience</th>
                    <th style="width:50px;">height</th>
                    <th style="width:50px;">weight</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($profile as $prof)
                  <tr>
                    <td><img src="{{json_decode($prof->sprites, true)['front_default']}}" alt=""></td>
                    <td>{{$prof->name}}</td>
                    <td>{{$prof->base_experience}}</td>
                    <td>{{$prof->height}}</td>
                    <td>{{$prof->weight}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>


              <button type="button" id="kingbutton" name="button">pokemon King</button>

              <div id="kingdiv">

              </div>

            </div>
        </div>

        <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function(){

      $('#kingbutton').click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post('getRequest', function(data){
                console.log(data);
            });
      });

    });
  </script>
    </body>
</html>
