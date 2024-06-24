@extends('layouts.main')

@section('container')
<!-- header -->
<div class="Header h-screen w-full px-9 mx-auto bg-[url('https://raw.githubusercontent.com/ain3ko/img_pemweb/main/banner-home-v1.jpg')] flex flex-col justify-center content-center">
  <div class="header-judul my-8">
    <h1 class="text-5xl font-bold text-center"> INGIN MASAK APA <br> HARI INI....<br></h1>
  </div>
  <div class="serchbar-home flex justify-center">
    <form class="w-4/5 h-44" id="searchForm">
      <div class="relative w-rounded-r-full">
        <input type="search" id="search-dropdown" class="block p-2.5 w-full px-12 text-sm text-gray-900 bg-white rounded-full border border-white focus:white focus:border-white h-16" placeholder="Mau Masak Apa Hari ini???" required />
        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full w-16 text-black bg-white rounded-e-full border border-white">
          <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
          <span class="sr-only">Search</span>
        </button>
      </div>
    </form>
  </div>
</div>
<!-- end header -->

<!-- start popular -->
    <div class="menu-popular mt-24">
    <div class="populer my-9">
        <h2 class="text-3xl font-bold text-center">POPULER</h2>
    </div>

    <div class="flex-none flex justify-center justify-items-center m-6 ">
    @foreach ($recipes as $recipe)
        <div class="max-w-44 md:mx-6 mx-auto mb-12 mb:mb-0 bg-gray-50 border rounded-lg overflow-hidden shadow-lg">
            <a href="{{ route('detail-resep', $recipe->recipe_id) }}">
                <div class="flex justify-center overflow-hidden w-auto h-auto">
                @if($recipe->food->food_img)
                    <div class="image-home-chart inline-block relative bg-cover w-44 md:w-40 h-40 shadow-lg hover:scale-125 transition-all" style="background-image: ('{{ asset('storage/' . $recipe->food->food_img) }}'); background-position: center; background-size: cover;"></div>
                    @else
                    <div class="image-home-chart inline-block relative bg-cover w-44 md:w-40 h-40 shadow-lg hover:scale-125 transition-all" style="background-image: url('https://via.placeholder.com/200'); background-position: center; background-size: cover;"></div>
                    @endif
                </div>
                <div class="flex-col items-center">
                    <div class="my-2">
                        <p class="mb-2 font-normal text-sm text-gray-700 text-center">{{ $recipe->food->food_name }}</p>
                    </div>
                    <div class="container-star flex justify-between px-2 items-end">
                            <div class="container-star flex items-center my-2 px-1">
                                <div class="img-sub-rate"><img class="star-img " src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Gambar%20Icon/Rating%20kuning.png" width="16px" heigth="16px"/></div>
                                <div class="text-rate ml-1 text-[10px]"><p>6.9</p></div>
                            </div>
                            <div class="container-eyes flex items-center my-2 px-1">
                                <div class="img-sub-rate"><img class="star-img " src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Gambar%20Icon/Seen.png" width="16px" heigth="16px"/></div>
                                <div class="text-rate ml-1  text-[10px]"><p>235</p></div>
                            </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    </div>
<!-- end populer -->

<!-- start Baru Ditambahkan -->
    <div class="rekomendasi mt-24">
        <div class="populer mb-14">
            <h2 class="text-3xl font-bold text-center">BARU DITAMBAHKAN</h2>
        </div>
    </div>
    <div class="makanan-scroll mb-16 ">
        <div class="flex overflow-x-hidden scroll-smooth">
                <ul class="flex px-5">
                @foreach ($newRecipes as $recipe) 
                <li class="w-auto">
                    <div class="max-w-48 mx-6 bg-gray-50 border rounded-lg overflow-hidden shadow-lg">
                        <a href="{{ route('detail-resep', $recipe->recipe_id) }}">
                        <div class="flex justify-center overflow-hidden w-auto h-auto">
                        @if($recipe->food->food_img)
                        <div class="image-home-chart inline-block relative bg-cover w-48 md:w-40 h-40 shadow-lg hover:scale-125 transition-all" style="background-image: url('{{ asset('storage/' . $recipe->food->food_img) }}');  background-position: center; background-size: cover;"></div>
                        @else
                        <div class="image-home-chart inline-block relative bg-cover w-48 md:w-40 h-40 shadow-lg hover:scale-125 transition-all" style="background-image: url('https://via.placeholder.com/200'); background-position: center; background-size: cover;"></div>
                        @endif
                        </div>
                        <div class="flex-col items-center">
                            <div class="my-2">
                            <p class="mb-2 font-normal text-sm text-gray-700 text-center">{{ $recipe->food->food_name }}</p>
                            </div>
                            <div class="container-star flex justify-between px-2 items-end">
                            <div class="container-star flex items-center my-2 px-1">
                                <div class="img-sub-rate"><img class="star-img " src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Gambar%20Icon/Rating%20kuning.png" width="16px" heigth="16px"></div>
                                <div class="text-rate ml-1 text-[10px]"><p>6.9</p></div>
                            </div>
                            <div class="container-eyes flex items-center my-2 px-1">
                                <div class="img-sub-rate"><img class="star-img " src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Gambar%20Icon/Seen.png" width="16px" heigth="16px"></div>
                                <div class="text-rate ml-1 text-[10px]"><p>235</p></div>
                            </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
            <div class=" w-full flex justify-between translate-y-[-350%]">
                <button id="prev-btn" class="btn btn-sm h-14 w-14 cursor-pointer position-absolute text-xl text-center leading-10 bg-gray-50 bg-[url('https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Gambar%20Icon/Next%20Resep.png')] bg-cover rounded-full top-2/4 translate-y-[100%] mx-2 drop-shadow-xl rotate-180"></button>
                <button id="next-btn" class="btn btn-sm h-14 w-14 cursor-pointer position-absolute text-xl text-center leading-10 bg-gray-50 bg-[url('https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Gambar%20Icon/Next%20Resep.png')] bg-cover rounded-full top-2/4 translate-y-[100%] mx-2 drop-shadow-xl"></button>
            </div>
        </div>
<!-- end baru ditambahkan -->
@endsection