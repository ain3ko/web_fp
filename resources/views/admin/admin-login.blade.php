<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <!-- link source -->
        <link rel="stylesheet" href="/css/style.css">
        <link rel="icon" href="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Masakanku2-removebg-preview.png">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- end link source -->
    <title>Admin | Login</title>
</head>
<body>
    <form action="/admin/admin-login" method="post">
    @csrf
        <div class="flex justify-center items-center h-screen bg-custom-light-choco">
            <div class="p-6 shadow-lg bg-white rounded-md w-96 h-auto">
                <div>
                    <h1 class="text-3xl block text-center font-semibold"><i class="fa-solid fa-user"></i>Login</h1>
                    <hr class="mt-3 border-gray-200 " />
                </div>
                <div class="mt-3">
                    <label for="username" class="block text-base mb-2" >Username</label>
                    <input type="username" id="username" name= "username" class="border @error('username') is-invalid @enderror w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-700" placeholder="Username....."/>
                    @error('username')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="password" class="block text-base mb-2">Password</label>
                    <input type="password" id="password" name= "password" class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-700" placeholder="Password....." autofocus required/>
                </div>

                <div class="mt-5">
                    <button type="submit" class="borde-2 border-custom-heavy-choco bg-custom-heavy-choco text-white py-2 w-full">Login</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
