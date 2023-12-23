<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>
        <b>Full Name: {{ $select }}</b>
    </p>
    <p>
        <b>Last Name: {{ $remark }}</b>
    </p>
    <p>
        <b>Uplode File: <img src="{{ ($imagePath) }}" alt="Image"></b>
    </p>


</body>

</html>
