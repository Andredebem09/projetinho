<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fórum</title>
    <head>
    <!-- Outros meta e links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <link rel="stylesheet" href="style.css">
</head>
<body class="{{ session('theme', 'light-theme') }}">
    <div class="px-4 py-5 my-5 text-center">

    <h1 class="display-5 fw-bold text-body-emphasis">{{ $title ?? 'Fórum de Duvidas' }}</h1>

        <h1>Fórum de Dúvidas</h1>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">{{$subtitle ?? 'Bem-vindo ao Fórum de duvidas!'}} </p>

        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          </div>
          
</div>
        <button id="toggle-theme" class="btn btn-outline" id="theme-icon" class="fas fa-sun">Alternar Tema</button>
</div>
        </div>
    </div>
    <hr>
    @yield('corpo')
    <hr>
    <p>Desenvolvido por André de Bem. &copy; 2024, todos os direitos reservados.</p>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }

        setThemeIcon();
    });

    const toggleButton = document.getElementById('toggle-theme');
    const themeIcon = document.getElementById('theme-icon');

    function setThemeIcon() {
        if (document.body.classList.contains('dark-mode')) {
            themeIcon.classList.remove('fa-sun');
            themeIcon.classList.add('fa-moon');
        } else {
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
        }
    }

    toggleButton.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');

        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }

        setThemeIcon(); 
    });
</script>



</body>
</html>



 