
<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="icon" href="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Masakanku2-removebg-preview.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Masakanku | Resep</title>
</head>
<body class="font-montserrat">

<div class="container--resep drop-shadow-md grid grid-cols-cus-3 grid-rows-layout">

<!-- navbar -->

@include('partials.navbar')

<!-- end navbar -->

<!-- header -->
    <div class="header--name col-span-1 flex justify-center items-center font-bold mt-8">
    <div class="img-logo-header bg-[url('https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Masakanku2-removebg-preview.png')] w-32 h-32 bg-cover"></div>
    </div>
    <div class="header--serch col-span-3 flex justify-center items-center">
      <form class="w-4/5 mx-auto">
        <label for="resep-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-custom-heavy-choco" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-12 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-white focus:ring-custom-heavy-choco focus:border-custom-heavy-choco" placeholder="Mau masak apa ?" required />
        </div>
    </form>
    </div>
<!-- end header -->

<!-- sidebar -->
    <div class="sidebar col-span-4 row-span-1 md:row-span-2 md:col-span-1 flex justify-center mt-10">
      <div class="sidebox bg-custom-heavy-choco w-4/5 lg:w-7/12 xl:w-64 md:h-96 my-4 md:my-0 rounded-xl drop-shadow-md flex md:flex-col items-center overflow-hidden">
        <div class="header--sidebar flex items-center mr-1 md:mr-4">
        <h1 class="font-medium text-white my-4 ml-4 mr-1">Filter</h1>
        <img src="https://github.com/ain3ko/img_pemweb/blob/main/icons8-filter-48.png?raw=true" alt="" width="16" height="16">
        </div>
        <ul class="w-4/5 text-xs font-medium bg-transparent mx-2 flex md:flex-col">
            <li class="w-full">
                <div class="flex items-center ps-3 ">
                    <input id="list-radio-license" type="radio" value="" name="list-radio" class="w-4 h-4 text-custom-light-choco bg-white border-gray-300 focus:ring-custom-light-choco ">
                    <label for="list-radio-license" class="w-full py-3 ms-2 text-xs font-light text-white ">Backery</label>
                </div>
            </li>
            <li class="w-full">
                <div class="flex items-center ps-3">
                    <input id="list-radio-license" type="radio" value="" name="list-radio" class="w-4 h-4 text-custom-light-choco bg-white border-gray-300 focus:ring-custom-light-choco ">
                    <label for="list-radio-license" class="w-full py-3 ms-2 text-xs font-light text-white ">Snack</label>
                </div>
            </li>
            <li class="w-full">
                <div class="flex items-center ps-3">
                    <input id="list-radio-license" type="radio" value="" name="list-radio" class="w-4 h-4 text-custom-light-choco bg-white border-gray-300 focus:ring-custom-light-choco ">
                    <label for="list-radio-license" class="w-full py-3 ms-2 text-xs font-light text-white ">Snack</label>
                </div>
            </li>
            <li class="w-full">
                <div class="flex items-center ps-3">
                    <input id="list-radio-license" type="radio" value="" name="list-radio" class="w-4 h-4 text-custom-light-choco bg-white border-gray-300 focus:ring-custom-light-choco ">
                    <label for="list-radio-license" class="w-full py-3 ms-2 text-xs font-light text-white ">Asia</label>
                </div>
            </li>
            <li class="w-full">
                <div class="flex items-center ps-3">
                    <input id="list-radio-license" type="radio" value="" name="list-radio" class="w-4 h-4 text-custom-light-choco bg-white border-gray-300 focus:ring-custom-light-choco ">
                    <label for="list-radio-license" class="w-full py-3 ms-2 text-xs font-light text-white ">Westren</label>
                </div>
            </li>
            <li class="w-full">
                <div class="flex items-center ps-3">
                    <input id="list-radio-license" type="radio" value="" name="list-radio" class="w-4 h-4 text-custom-light-choco bg-white border-gray-300 focus:ring-custom-light-choco ">
                    <label for="list-radio-license" class="w-full py-3 ms-2 text-xs font-light text-white ">Minuman</label>
                </div>
            </li>
        </ul>

      </div>
    </div>
<!-- end sidebar -->

<!-- content -->
    <div class="content col-span-4 md:col-span-3 row-span-2 mr-16 ml-16 md:ml-0">
      <div class="content-terkait w-full h-6 mb-4 flex justify-end">
      <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-custom-heavy-choco hover:bg-custom-light-choco font-medium rounded-md text-xs px-4 py-2.5 text-center inline-flex items-center h-6" type="button">Terkait<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>
    </button>
    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
          <li>
            <a href="#" class="block px-4 py-2 hover:bg-custom-light-choco hover:text-white">Terkait</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 hover:bg-custom-light-choco hover:text-white">Terbaru</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 hover:bg-custom-light-choco hover:text-white">A-Z</a>
          </li>
        </ul>
    </div>
      </div>

      <div class="content-main w-full h-full mb-4">
      <!-- content -->
      @foreach ($recipes as $recipe)
      <div class="resep-card w-full h-24 bg-white rounded-md shadow-lg flex overflow-hidden mb-4">
          <div class="content-img overflow-hidden">
            <div class="img-resep inline-block bg-cover relative min-w-24 h-full hover:scale-125 transition-all" style="background-image: url({{ $recipe->food->food_img }})"></div>
          </div>
          <a href="{{ route('recipe.show', $recipe->food_id) }}" class="content-text-main ml-4 w-4/5 flex flex-col justify-around py-2">
          <div class="content--title">{{ $recipe->food->food_name }}</div>
          <div class="content--desc">{{ $recipe->food->food_desc }}</div>

            <div class="content--rate h-4 flex items-center">
              <img src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/icons8-star-30.png" alt="" width="16" height="16">
              <p class = "text-xs mx-1">4.9</p>
              <img src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/icons8-eyes-32.png" alt="" width="16" height="16" class="ml-4">
              <p class = "text-xs mx-1">69K</p>
            </div>
          </a>
        </div>
        @endforeach
      <!-- end content -->
      
        </div>
      
    </div>
<!-- end content -->

<!-- footer -->
    <div class="footer bg-green-400 col-span-4 h-auto">
    <footer class="bg-custom-dark-choco">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
          <div class="grid grid-cols-2 gap-4 sm:gap-12 sm:grid-cols-4 justify-items-center">
            <div>
                <h2 class="mb-6 text-sm font-semibold text-white uppercase">Tentang Kami</h2>
                <p class="text-white">Yummy adalah platform digital yang menghadirkan ribuan resep makanan dari berbagai kategori dan selera kuliner. </p>
            </div>
                <div>
                  <h2 class="mb-6 text-sm font-semibold text-white uppercase">Follow Us</h2>
                  <p class ="mb-5 text-white">Ikuti akun-akun kami di media sosial:</p>
                  <ul class="text-gray-300 dark:text-gray-500 font-medium">
                      <li class="flex justify-around gap-4">
                          <a href="#" class="hover:underline"><img class="w-9 h-9 " src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Gambar%20Icon/Instagram.png" alt="#"></a>
                          <a href="#" class="hover:underline"> <img class="w-9 h-9 " src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Gambar%20Icon/Youtube.png" alt="#"></a>
                          <a href="#" class="hover:underline"> <img class="w-9 h-9 " src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Gambar%20Icon/Tiktok.png" alt="#"></a>
                          <a href="#" class="hover:underline"> <img class="w-9 h-9 " src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Gambar%20Icon/X.png" alt="#"></a>
                          <a href="#" class="hover:underline"> <img class="w-9 h-9 " src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Gambar%20Icon/Facebook.png" alt="#"></a>
                      </li>
                  </ul>
              </div>
             <div>
                 <div>
                        <h2 class="mb-6 text-sm font-semibold text-white uppercase">Hubungi Kami</h2>
                        <ul class="text-white font-medium">
                            <li class="mb-4">
                                <p class="font-semibold">Telepon :</p>
                                <p>0856-7890-4432</p>
                            </li>
                            <li class="mb-4">
                                <p class="font-semibold">Email :</p>
                                <p>info@yummyweb.com</p>
                            </li>
                        </ul>
                    </div>
             </div>
             <div>
                  <ul class="text-white font-medium grid grid-cols-2 gap-4 sm:gap-4 sm:grid-cols-1">
                      <li>
                          <a href="/" class="hover:underline">Beranda</a>
                      </li>
                      <li>
                          <a href="/resep" class="hover:underline">Resepku</a>
                      </li>
                      <li>
                          <a href="/tentang-kami" class="hover:underline">Tentang Kami</a>
                      </li>
                      <li>
                          <a href="/kebijakan" class="hover:underline">Kebijakan Privasi</a>
                      </li>
                  </ul>
              </div>
          </div>
          </div>
      </div>
    </div>
    </footer>
<!-- end footer -->
</div>

</body>
</html>