<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gerenciador de Atividades</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="{{ session('theme', 'light-theme') }}">

    <div class="container my-5 text-center">
        <h1 class="display-5 fw-bold text-body-emphasis">{{ $title ?? 'Fórum de Dúvidas' }}</h1>
        <p class="lead mb-4">{{ $subtitle ?? 'Bem-vindo ao Fórum de Dúvidas!' }}</p>

        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <button id="toggle-theme" class="btn btn-outline-secondary">
                <i id="theme-icon" class="fas fa-sun"></i> Alternar Tema
            </button>
        </div>
    </div>

    <hr>

    @yield('corpo')

    <hr>

    <footer class="text-center">
        <p>Desenvolvido por André de Bem Zanella. &copy; 2024, Todos os direitos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Theme Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const theme = localStorage.getItem('theme') || 'light';
            document.body.classList.toggle('dark-mode', theme === 'dark');
            setThemeIcon(theme);
        });

        const toggleButton = document.getElementById('toggle-theme');
        const themeIcon = document.getElementById('theme-icon');

        function setThemeIcon(theme) {
            if (theme === 'dark') {
                themeIcon.classList.replace('fa-sun', 'fa-moon');
            } else {
                themeIcon.classList.replace('fa-moon', 'fa-sun');
            }
        }

        toggleButton.addEventListener('click', () => {
            const isDarkMode = document.body.classList.toggle('dark-mode');
            const theme = isDarkMode ? 'dark' : 'light';
            localStorage.setItem('theme', theme);
            setThemeIcon(theme);
        });
    </script>
</body>
</html>
