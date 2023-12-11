<!DOCTYPE html>
<html lang="hu">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Jegyvásárlás - Laravel BRDI Cinema Ticket Order</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <script
			  src="https://code.jquery.com/jquery-3.7.1.min.js"
			  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
			  crossorigin="anonymous"></script>
      <!--link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /-->
      <style>
        .free {
            background-color: green !important;
            text-align: center;
        }
        .tmp_reserved {
            background-color: yellow !important;
            text-align: center;
        }
        .sold {
            background-color:red !important;
            text-align: center;
        }

      </style>
    </head>
<body>
    <div class="container">
         @yield('main')  
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>