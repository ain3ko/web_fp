@extends('layouts.main')

@section('container')
<!-- Konten utama -->
<div class="main--content w-full flex-none md:flex md:justify-center md:m-12 bg-white">
        <!-- Kotak Foto -->
            <div class="side--left w-4/5 h-60 md:w-80 md:h-60 rounded-lg drop-shadow-lg md:mx-6 md:my-0 mx-auto my-12 overflow-hidden">
            <div class="img-resep inline-block bg-cover relative w-full h-full hover:scale-125 transition-all" style="background-image: url('{{ asset('storage/' . $recipe->food->food_img) }}');"></div>
            </div>
        <!-- End Kotak Foto -->

        <!-- Deskripsi Masakan -->
            <div class="sidebar-right-main mx-auto md:mx-6 w-4/5 md:w-2/5">
                <div class="sidebar--right bg-custom-light-choco p-6 items-center rounded-lg drop-shadow-md">
        <h2 class="text-xl font-bold mb-4">{{ $recipe->food->food_name }}</h2>
        <p>{{ $recipe->food->food_desc }}</p> 
        <br>

        <h2 class="text-xl font-semibold mb-4">Bahan Masakan</h2>
        <ul class="list-inside list-disc">
           @foreach(range(1, 8) as $i)
           <li>{{ $recipe->ingredients["ingredient_$i"] }}</li>
           @endforeach
        </ul>

         <br>
        <h2 class="text-xl font-semibold mb-4">Cara Membuat</h2>
        <ul class="list-inside list-disc">
            @foreach(range(1, 8) as $i)
            <li>{{ $recipe->steps["step_$i"] }}</li>
            @endforeach
        </ul>
    </div>
        <!-- End Deskripsi Masakan -->

            <!-- Rating -->
            <div class="rating--container w-full flex justify-center items-center mx-4 my-24">

            <!-- Text rating -->
            <div class="text--rate ml-5 mt-3 text-left mx-6">
                Jangan Lupa Beri 
                <br>
                Rating Resep Ini!
            </div>

            <!-- Rating star -->
                    <div class="rounded-lg p-4 mx-5 bg-custom-light-choco">
                            <div class="text-yellow-300 mb-2 text-2xl">
                                <div class="rate--button flex items-center ms-5">
                                    <svg class="w-5 h-5 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-300 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    <svg class="w-5 h-5 ms-1 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                </div>
                            </div>
                            <!-- fitur rating -->
                            <button class="bg-white hover:bg-custom-smoot-choco text-black font-semibold py-2 px-4 rounded-lg ms-2"
                                    style="width: 150px; height: 40px;">
                                <div class="flex items-center justify-between">
                                    <div class="flex text-center ms-6">KIRIM</div>
                                    <img src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Gambar%20Icon/Kirim%201.png" class="mr-6 w-5 h-5">
                                </div>
                            </button>
                    </div>
                </div>
        </div>
    </div>
@endsection
