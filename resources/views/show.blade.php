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
    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Customer Details</h3>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $customer->cname }}</p>
                <p><strong>Phone:</strong> {{ $customer->cphone }}</p>
                <p><strong>Address:</strong> {{ $customer->caddress }}</p>
            </div>
        </div>
    
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Transactions</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Particular</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Transaction Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->trn_date }}</td>
                                <td>{{ $transaction->particular }}</td>
                                <td>{{ $transaction->debit }}</td>
                                <td>{{ $transaction->credit }}</td>
                                <td>{{ $transaction->trn_balance }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>