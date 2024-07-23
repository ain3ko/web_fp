
<nav class="fixed top-0 z-50 w-full bg-custom-dark-choco border-gray-200 ">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <a href="/admin/admin-beranda" class="flex ms-2 md:me-24">
          <img src=""/>
          <div class="text-white">
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap ">MASAKANKU</span>
          </div>
        </a>
      </div>
      <div class="flex items-center">
    <div class="flex items-center ms-3">
        <div>
            <button type="button" class="flex text-sm bg-gray-800 rounded-full" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://raw.githubusercontent.com/ain3ko/img_pemweb/main/Logo/logo.png" alt="user photo">
            </button>
        </div>
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-user">
            <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900" role="none">
                    @if (auth()->check()) 
                        {{ auth()->user()->username }}
                    @else
                        Guest
                    @endif
                </p>
            </div>
            <ul class="py-1" role="none">
                <li>
                    <a href="{{ route('admin.admin-beranda') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard</a>
                </li>

                @if (auth()->check())
    <li>
    <form action="{{ route('logout') }}" method="POST" role="menuitem">
            @csrf
            <input type="hidden" name="_token" value="{{ request()->header('X-CSRF-TOKEN') ?: csrf_token() }}">
            <button type="submit" class="block px-4 py-2 text-sm text-gray-700">Log out</button>
        </form>

    </li>
@else
    </li>
@endif
            </ul>
        </div>
    </div>
</div>

    </div>
  </div>
</nav>