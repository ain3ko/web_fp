<!DOCTYPE html>
<html lang="en">
<head>
@vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="icon" href="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Masakanku2-removebg-preview.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Masakanku | {{$title}} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
    window.addEventListener('DOMContentLoaded', function() {
        // Ambil token CSRF dari meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Perbarui token CSRF di semua formulir
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            const csrfField = form.querySelector('input[name="_token"]');
            if (csrfField) {
                csrfField.value = csrfToken;
            }
        });
    });
    </script>
</head>
<body class="font-montserrat">
@include('partials.navbar')
  <div>
    @yield('container')
  </div>
@include('partials.footer')
<script src="js/script.js"></script>
</body>
</html>
