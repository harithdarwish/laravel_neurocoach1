<!DOCTYPE html>
<html>
<head>
    <title>show_payment</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale-1">
    <title></title>
</head>
<body>
    {{$data->name}}
    {{$data->description}}

    <iframe height="400" width="400" src="/invoiceandpayment/{{$data->file}}"></iframe>
</body>
</html>