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
  <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 id="food_img" type="file" name="food_img">
  <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Tambahkan foto masakan anda!</div>
</div>

  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
</form>
</div>

<!-- menaambahkan js file -->
 <script>
let ingredientCounter = 1;
let stepCounter = 1;

// Menambahkan Bahan
document.querySelector('.btn-add-ingredient').addEventListener('click', function(e) {
    e.preventDefault();
    const inputGroup = document.querySelector('.ingredient-input-group');
    const newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = `ingridient_${ingredientCounter}`;
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

    ingredientCounter++;
});

// Menambahkan Langkah-langkah
document.querySelector('.btn-add-step').addEventListener('click', function(e) {
    e.preventDefault();
    const inputGroup = document.querySelector('.step-input-group');
    const newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = `step_${stepCounter}`;
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

    stepCounter++;
});

document.getElementById('recipeForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData();

    // 2. Ambil Data dari Formulir (termasuk gambar)
    formData.append('food_name', document.querySelector('input[name="food_name"]').value);
    formData.append('food_desc', document.querySelector('input[name="food_desc"]').value);
    formData.append('category_id', document.querySelector('select[name="category_id"]').value);
    // Ambil file gambar (pastikan input file memiliki name="food_img")
    const foodImgInput = document.querySelector('input[name="food_img"]');
    if (foodImgInput.files.length > 0) {
        formData.append('food_img', foodImgInput.files[0]);
    }

    // Kumpulkan data bahan
    const ingredientInputs = document.querySelectorAll('input[name^="ingridient_"]');
    ingredientInputs.forEach(input => {
        formData.append(input.name, input.value);
    });

    // Kumpulkan data langkah-langkah
    const stepInputs = document.querySelectorAll('input[name^="step_"]');
    stepInputs.forEach(input => {
        formData.append(input.name, input.value);
    });

    // Kirim data ke backend (menggunakan fetch atau metode lain)
    fetch('/admin/admin-tambah', { // Ganti dengan URL yang benar
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: formData
})
.then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok.'); // Tangani respons yang tidak berhasil
    }
    return response.json(); // Parse respons menjadi JSON
})
.then(data => {
    if (data.success) {
        alert(data.success);
        // ... (tindakan lainnya) ...
    } else {
        alert('Error: ' + data.error); // Tampilkan pesan error dari backend
    }
})
.catch(error => {
    console.error('Error:', error);
    alert('Terjadi kesalahan saat mengirim data.'); // Tampilkan pesan error umum
});
});
</script>


@endsection
