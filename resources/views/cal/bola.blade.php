<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bola</title>
</head>
<body>
    <h1>Bola</h1>
    <form action="" method="post">
    @csrf
<label for="">jari-jari</label>
<br>
<input type="number" name="r" id="">
<br>
<button type="submit">Submit</button>

<h3>Volume : {{ $vol ?? 0 }}</h3>
<h3>Luas Permukaan : {{ $luas ?? 0 }}</h3>
</form>
</body>
</html>
