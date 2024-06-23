@extends('layouts.admin-layout')

@section('admin-container')
<div class="form-insert flex flex-col justify-center items-center h-screen">
<form id="recipeForm" action="{{ route('admin.admin-tambah.store') }}" method = "POST" class="w-2/6 mx-auto" enctype="multipart/form-data">
@csrf
  <div class="mb-5">
    <label for="food_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Masakan</label>
    <input type="text" name="food_name" id="food_name" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
  </div>
  <div class="mb-5">
    <label label for="food_desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Masakan</label>
    <input input type="text" name="food_desc" id="food_desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
  </div>
  <div class="mb-5">
        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
        <select id="category_id" name="category_id" class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
            @foreach ($categories as $category)
                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>
  <div class="flex justify-between mb-5">
    <h2>Tambahkan Bahan</h2>
    <button class="btn-add-ingredient bg-white rounded-sm shadow w-6 text-center">&plus;</button>
  </div>
  <div div class="ingredient-input-group">
  </div>
  <div class="flex justify-between mb-5">
    <h2>Tambahkan Langkah</h2>
    <button class="btn-add-step bg-white rounded-sm shadow w-6 text-center">&plus;</button>
  </div>
  <div div class="step-input-group">
  </div>

  <div class="mb-5">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="food_img">Upload file</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="food_img" type="file" name="food_img">
    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Tambahkan foto masakan anda!</div>
</div>

  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
</form>
</div>

<!-- menaambahkan js file -->
<script>
let ingredientCounter = 0; // Mulai dari 0
let stepCounter = 0; // Mulai dari 0

// Menambahkan Bahan
document.querySelector('.btn-add-ingredient').addEventListener('click', function(e) {
    e.preventDefault();
    const inputGroup = document.querySelector('.ingredient-input-group');
    const newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = `ingredients[${ingredientCounter}]`;
    ingredientCounter++;
    newInput.placeholder = 'Masukkan bahan...';
    newInput.classList.add('form-input');
    const deleteButton = document.createElement('button');
    deleteButton.type = 'button';
    deleteButton.textContent = 'x';
    deleteButton.classList.add('delete-button'); 
    deleteButton.addEventListener('click', function() {
        this.parentNode.remove(); 
    });
    const inputContainer = document.createElement('div');
    inputContainer.appendChild(newInput);
    inputContainer.appendChild(deleteButton);
    inputGroup.appendChild(inputContainer); 
});

//menambahkan langkah-langkah
document.querySelector('.btn-add-step').addEventListener('click', function(e) {
  e.preventDefault();
  const inputGroup = document.querySelector('.step-input-group');
  const newInput = document.createElement('input');
  newInput.type = 'text';
  newInput.name = `steps[${stepCounter}]`;
  stepCounter++;

  newInput.placeholder = 'Masukkan langkah...';
  newInput.classList.add('form-input');
  const deleteButton = document.createElement('button');
  deleteButton.type = 'button';
  deleteButton.textContent = 'x';
  deleteButton.classList.add('delete-button');
  deleteButton.addEventListener('click', function() {
  this.parentNode.remove();
  });
  const inputContainer = document.createElement('div');
  inputContainer.appendChild(newInput);
  inputContainer.appendChild(deleteButton);
  inputGroup.appendChild(inputContainer);
});
</script>

@endsection
