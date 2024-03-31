<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Transaction </title>
</head>
<body>
    <!-- transaction.blade.php -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Add Transaction') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store-transaction') }}">
                        @csrf

                        <div class="form-group">
                            <label for="cid">{{ __('Customer ID') }}</label>
                            <input id="cid" type="text" class="form-control" name="cid" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="particular">{{ __('Particular') }}</label>
                            <input id="particular" type="text" class="form-control" name="particular" required>
                        </div>

                        <div class="form-group">
                            <label for="debit">{{ __('Debit') }}</label>
                            <input id="debit" type="number" class="form-control" name="debit" required>
                        </div>

                        <div class="form-group">
                            <label for="credit">{{ __('Credit') }}</label>
                            <input id="credit" type="number" class="form-control" name="credit" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Add Transaction') }}
                        </button>
                        @if(session('success'))
                        <div class="alert alert-success">
                         {{ session('success') }}
                        </div>
                        @endif
                      @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
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