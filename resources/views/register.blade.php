<!-- register.blade.php -->
{{-- @extends('layouts.app') <!-- Assuming you have a layout file with Bootstrap included --> --}}

{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Register Customer') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <div class="form-group">
                                <label for="cname">{{ __('Customer Name') }}</label>
                                <input id="cname" type="text" class="form-control" name="cname" required autofocus>
                            </div>
    
                            <div class="form-group">
                                <label for="caddress">{{ __('Address') }}</label>
                                <input id="caddress" type="text" class="form-control" name="caddress" required>
                            </div>
    
                            <div class="form-group">
                                <label for="cphone">{{ __('Phone') }}</label>
                                <input id="cphone" type="text" class="form-control" name="cphone" required>
                            </div>
    
                            
    
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                             @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
</body>
</html>
