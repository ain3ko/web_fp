<div class="navbar col-span-4 border-gray-200 bg-custom-dark-choco text-white">
      <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto py-4 px-8 md:h-24 h-auto">
      <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
          <span class="self-center text-2xl font-semibold whitespace-nowrap">Masakanku</span>
      </a>
      <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-stone-800" aria-controls="navbar-solid-bg" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
        <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">
        <li>
            <a href="/" class="block py-2 px-3 md:p-0 rounded-lg hover:bg-yellow-50 md:hover:bg-transparent md:text-white {{ ($title==='Beranda') ? 'text-black' : 'md:border-0 md:hover:text-yellow-50 md:font-light text-gray-900' }}" aria-current="page">Home</a>
          </li>
          <li>
            <a href="/resep" class="block py-2 px-3 md:p-0 rounded-lg hover:bg-yellow-50 md:hover:bg-transparent md:text-white {{ ($title==='Resep') ? 'text-black' : 'md:border-0 md:hover:text-yellow-50 md:font-light text-gray-900' }}">Resepku</a>
          </li>
          <li>
            <a href="/tentang-kami" class="block py-2 px-3 md:p-0 rounded-lg hover:bg-yellow-50 md:hover:bg-transparent md:text-white {{ ($title==='Tentang Kami') ? 'text-black' : 'md:border-0 md:hover:text-yellow-50 md:font-light text-gray-900' }}">Tentang Kami</a>
          </li>
        </ul>
      </div>
      </div>
    </div>