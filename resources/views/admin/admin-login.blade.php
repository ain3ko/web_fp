
<!DOCTYPE html>
<html lang="en">
<head>
@vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Masakanku2-removebg-preview.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin | {{$title}} </title>
</head>
<body>
<div class ="form-login flex flex-col justify-center items-center h-screen"
      <form class="w-2/6 mx-auto">
        <div class="mb-5">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
          <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600" placeholder="username" required />
        </div>
        <div class="mb-5">
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
          <input type="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
        </div>
        <div class="mb-5">
          <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat password</label>
          <input type="password" id="repeat-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5" required />
        </div>
        <div class="flex items-start mb-5">
          <div class="flex items-center h-5">
            <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 " required />
          </div>
          <label for="terms" class="ms-2 text-sm font-medium text-gray-900 ">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a></label>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm block w-2/6 p-2.5">Login</button>
      </form>

</div>
</body>
</html>