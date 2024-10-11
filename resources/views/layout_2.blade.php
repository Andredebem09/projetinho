<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fórum</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="forms.css">
</head>
<body>
    <div class="px-4 py-5 my-5 text-center">

        <h1 class="display-5 fw-bold text-body-emphasis">{{ $title ?? 'Fórum de Duvidas' }}</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">{{$subtitle ?? 'Bem-vindo ao Fórum de duvidas!'}} </p>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          </div>
        </div>
      </div>
    <hr>
        @yield('corpo_2')
    <hr>
    <p>Desenvolvido por André de Bem. &copy; 2024, todos os direitos reservados.</p>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>