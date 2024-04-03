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
        <h1>Customer List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>CID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->cname }}</td>
                    <td>{{ $customer->cid }}</td>
                    <td>
                        <a href="{{ route('transaction.show', ['cid' => $customer->cid]) }}" class="btn btn-primary">View Transactions</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</body>
</html>