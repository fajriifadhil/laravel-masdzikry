<aside id="sidebar" class="p-8 bg-white h-screen fixed md:sticky top-0 text-white -translate-x-full md:translate-x-0 z-10 flex flex-col justify-between min-w-[18rem] border-r">
    <div class="flex flex-col items-start gap-8">
        <a href="{{ route('dashboard') }}" class="text-center mx-auto py-3">
            <img src="{{ asset('full-logo.png') }}" alt="company logo" class="h-8 object-cover" />
        </a>

        <div class="flex flex-col items-start w-full gap-5">
            <a href="{{ route('dashboard') }}" class="btn btn-block justify-start {{ $page_name == 'dashboard' ? 'btn-primary' : 'text-black btn-ghost' }}">
                <i class="ri-dashboard-fill"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('sales.index') }}" class="btn btn-block justify-start {{ $page_name == 'sales' ? 'btn-primary' : 'text-black btn-ghost' }}">
                <i class="ri-shopping-cart-fill"></i>
                <span>Penjualan</span>
            </a>
            <a href="{{ route('users.index') }}" class="btn btn-block justify-start {{ $page_name == 'users' ? 'btn-primary' : 'text-black btn-ghost' }}">
                <i class="ri-user-fill"></i>
                <span>Pelanggan</span>
            </a>
        </div>
    </div>
    <button type="button" onclick="logout.showModal()" class="btn btn-block btn-ghost text-error justify-start">
        <i class="ri-logout-box-r-line"></i>
        <span>Keluar</span>
    </button>

    <button id="close-sidebar" class="absolute md:hidden top-5 right-5 btn btn-sm btn-square">
        <i class="ri-close-line"></i>
    </button>
</aside>
<button id="open-sidebar" class="fixed md:hidden top-5 right-5 btn btn-sm btn-square btn-outline">
    <i class="ri-menu-line"></i>
</button>

<x-modal.admin-logout />

<script src="{{ asset('js/toggleSidebar.js') }}"></script>