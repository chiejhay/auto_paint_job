<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juan's Paint Job</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    {{-- CSS Declarations --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    
    <script type="text/javascript">
        $.job_paint_url      =   "{{ env('JOB_PAINT_URL') }}";
    </script>

    @yield('page-css')
    

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>


    @yield('page-scripts')
</head>
<body>
    <div class="main-container">
    @yield('content')
</body>
</html>