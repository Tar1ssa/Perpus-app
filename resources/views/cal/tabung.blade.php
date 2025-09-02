<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tabung</title>
</head>
<body>
    <h1>Tabung</h1>
    <form action="" method="post">
    @csrf
<label for="">jari-jari</label>
<br>
<input type="number" name="r" id="">
<br>
<label for="">Tinggi</label>
<br>
<input type="number" name="t" id="">
<br>
<button type="submit">Submit</button>

<h3>Volume : {{ $vol ?? 0 }}</h3>
<h3>Luas Permukaan : {{ $luas ?? 0 }}</h3>
</form>
</body>
</html>
