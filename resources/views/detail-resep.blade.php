@extends('layouts.main')

@section('container')
<!-- Konten utama -->
<div class="main--content w-full flex-none md:flex md:justify-center md:m-12 bg-white">
        <!-- Kotak Foto -->
            <div class="side--left w-4/5 h-60 md:w-80 md:h-60 rounded-lg drop-shadow-lg md:mx-6 md:my-0 mx-auto my-12 overflow-hidden">
            <div class="img-resep inline-block bg-cover relative w-full h-full hover:scale-125 transition-all" style="background-image: url('{{ asset('storage/' . $recipe->food->food_img) }}');" loading="lazy"></div>
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

            <div class="rating--container w-full flex justify-center items-center mx-4 my-24">

            <div class="text--rate ml-5 mt-3 text-left mx-6">
                Jangan Lupa Beri
                <br>
                Rating Resep Ini!
            </div>

            <div class="rounded-lg p-4 mx-5 bg-custom-light-choco text-center">
            <form action="{{ route('rate.recipe') }}" method="POST">
    @csrf
    <input type="hidden" name="recipe_id" value="{{ $recipe->recipe_id }}">
    <div class="flex items-center justify-center mb-2" id="rating-container">
        @for ($i = 1; $i <= 5; $i++)
            <input type="radio" name="rating" id="rating-{{ $i }}" value="{{ $i }}" class="hidden" {{ ($recipe->rating == $i) ? 'checked' : '' }} />
            <label for="rating-{{ $i }}" class="cursor-pointer star-rating" data-rating="{{ $i }}">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                    <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
                </svg>
            </label>
        @endfor
            </div>
            <button type="submit" class="bg-white hover:bg-custom-smoot-choco text-black font-semibold py-2 px-4 rounded-lg ms-2" style="width: 150px; height: 40px;">
                <div class="flex items-center justify-between">
                    <div class="flex text-center ms-6">KIRIM</div>
                    <img src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Gambar%20Icon/Kirim%201.png" class="mr-6 w-5 h-5">
                </div>
            </button>
        </form>
                    </div>
            </div>
    </div>

<style>
input[type="radio"]:checked + label svg {
fill: #D22B2B !important;
}
</style>
@endsection
