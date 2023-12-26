<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($organizations as $or )
    {{$or->id}}
    'organizationName', {{$or->organizationName}} <br>
    'organizationAddress', {{$or->organizationAddress}}<br>
    'organizationPhoneNumber',{{$or->organizationPhoneNumber}}<br>
    'organizationEmail',{{$or->organizationEmail}}<br>
    'organizationPanNumber', {{$or->organizationPanNumber}}<br>
    'organizationVatNumber'{{$or->organizationVatNumber}}<br>
    @endforeach

    <button class="btn btn-success ">
        <a href="{{route ('organization.create')}}">
            create
        </a>
    </button>
</body>
</html>
