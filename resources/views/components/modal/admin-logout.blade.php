<dialog id="logout" class="modal">
    <div class="modal-box">
        <div class="text-center">
            <i class="ri-information-line text-warning text-9xl mx-auto"></i>
            <h3 class="font-bold text-xl">Anda Yakin ingin Keluar?</h3>
        </div>
        <div class="modal-action w-full flex justify-center">
            <form method="dialog" class="flex gap-2">
                <button type="button" onclick="logout.close()" class="btn btn-error btn-outline">Batal</button>
                <a href="{{ route('admin-logout') }}" class="btn btn-error text-white">Ya, Keluar</a>
            </form>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>