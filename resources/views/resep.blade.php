
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
      <form action="{{ route('resep') }}" method="GET" class="w-4/5 mx-auto">
        <label for="resep-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-custom-heavy-choco" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search"  name="search" class="block w-full p-4 ps-12 text-sm text-gray-900 border border-gray-300 rounded-3xl bg-white focus:ring-custom-heavy-choco focus:border-custom-heavy-choco" placeholder="Mau masak apa ?" value="{{ $search ?? '' }}" required />
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
    
    <form action="{{ route('resep') }}" method="GET" class="w-4/5 text-xs font-medium bg-transparent mx-2 flex md:flex-col" id="categoryForm"> 
        <input type="hidden" name="search" value="{{ request('search') }}"> 
        <input type="hidden" name="orderBy" value="{{ request('orderBy') }}"> 

        @foreach ($categories as $category) 
            <li class="w-full list-none p-0">
                <div class="flex items-center ps-3">
                    <input id="category-{{ $category->category_id }}" type="radio" value="{{ $category->category_id }}" name="category" class="w-4 h-4 text-custom-light-choco bg-white border-gray-300 focus:ring-custom-light-choco" {{ request('category') == $category->category_id ? 'checked' : '' }} onchange="document.getElementById('categoryForm').submit()">
                    <label for="category-{{ $category->category_id }}" class="w-full py-3 ms-2 text-xs font-light text-white">{{ $category->category_name }}</label>
                </div>
            </li>
        @endforeach
    </form>
</div>

    </div>
<!-- end sidebar -->

<!-- content -->
    <div class="content col-span-4 md:col-span-3 row-span-2 mr-16 ml-16 md:ml-0">
    <div class="content-terkait w-full h-6 mb-4 flex justify-end">
    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-custom-heavy-choco hover:bg-custom-light-choco font-medium rounded-md text-xs px-4 py-2.5 text-center inline-flex items-center h-6" type="button">
        {{ $orderBy == 'latest' ? 'Terbaru' : ($orderBy == 'a-z' ? 'A-Z' : 'Z-A') }} 
        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
    </button>
    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
            <li>
                <a href="{{ route('resep', ['search' => request('search'), 'orderBy' => 'latest']) }}" class="block px-4 py-2 hover:bg-custom-light-choco hover:text-white">Terbaru</a>
            </li>
            <li>
                <a href="{{ route('resep', ['search' => request('search'), 'orderBy' => 'a-z']) }}" class="block px-4 py-2 hover:bg-custom-light-choco hover:text-white">A-Z</a>
            </li>
            <li>
                <a href="{{ route('resep', ['search' => request('search'), 'orderBy' => 'z-a']) }}" class="block px-4 py-2 hover:bg-custom-light-choco hover:text-white">Z-A</a>
            </li>
        </ul>
    </div>
</div>

      <div class="content-main w-full h-full mb-4">
      <!-- content -->
      @foreach ($recipes as $recipe)
      <div class="resep-card w-full h-24 bg-white rounded-md shadow-lg flex overflow-hidden mb-4">
    <div class="content-img overflow-hidden">
        <img src="{{ asset('storage/' . $recipe->food->food_img) }}" alt="{{ $recipe->food->food_name }}" class="inline-block bg-cover relative w-28 h-full hover:scale-125 transition-all">
    </div>
    <a href="{{ route('detail-resep', $recipe->recipe_id) }}" class="content-text-main ml-4 w-full flex flex-col justify-around py-2">
        <div class="content--title font-semibold">{{ $recipe->food->food_name }}</div>
        <div class="content--desc text-yellow-700">{{ Str::limit($recipe->food->food_desc, 100) }}</div>
        <div class="content--category text-xs">
        @if ($recipe->food->category)
        {{ $recipe->food->category->category_name }}
        @else
        Kategori Tidak Tersedia
        @endif
        </div>
    </a>
</div>

        @endforeach
        <nav aria-label="Page navigation example">
    <ul class="flex items-center -space-x-px h-8 text-sm">

        @if ($recipes->onFirstPage())
            <li>
                <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg cursor-not-allowed opacity-50">
                    <span class="sr-only">Previous</span>
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                </span>
            </li>
        @else
            <li>
                <a href="{{ $recipes->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
                    <span class="sr-only">Previous</span>
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                </a>
            </li>
        @endif

        @foreach ($recipes->getUrlRange(1, $recipes->lastPage()) as $page => $url)
            <li>
                @if ($recipes->currentPage() == $page)
                    <span aria-current="page" class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $page }}</a>
                @endif
            </li>
        @endforeach

        @if ($recipes->hasMorePages())
            <li>
                <a href="{{ $recipes->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">
                    <span class="sr-only">Next</span>
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </a>
            </li>
        @else
            <li>
                <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg cursor-not-allowed opacity-50">
                    <span class="sr-only">Next</span>
                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round"stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                </span>
            </li>
        @endif
        </ul>
        </nav>
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