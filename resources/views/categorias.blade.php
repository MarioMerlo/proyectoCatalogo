<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorias</title>
</head>
<body>
    <h1>Categorías</h1>

    <ol>
        @foreach($categorias as $categoria)
        <li>{{$categoria->catNombre}}</li>
        @endforeach
    </ol>
</body>
</html>
