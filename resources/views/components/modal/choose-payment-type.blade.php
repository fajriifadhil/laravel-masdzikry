<dialog id="payment_modal" class="modal">
    <div class="modal-box max-w-[45rem] p-0">
        <div class="p-7">
            <h3 class="font-semibold text-center text-2xl">Pilih Metode Pembayaran</h3>
            <div class="my-6 join w-full">
                <button type="button" class="btn join-item">
                    <i class="ri-search-line"></i>
                </button>
                <input type="text" id="search-method" class="input input-bordered w-full join-item" placeholder="Cari Metode Pembayaran" />
            </div>
        </div>

        <input type="hidden" name="payment-method" value="" required />
        <input type="hidden" id="temp-payment-method" value="" />

        <!-- PAYMENT METHOD -->
        <section class="p-7 bg-gray-100">
            <!-- INTERNATIONAL
            <h2 class="font-medium">PayPal/Visa/MasterCard/Discover/AmericanExpress</h2>
            <div class="grid grid-flow-row grid-cols-2 gap-4 mt-2">
                <label for="paypal" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                    <div class="w-24 mr-2">

                        <img src="{{ asset('payment/paypal.png') }}" class="h-6 object-cover" alt="paypal" />
                    </div>    
                        <h3 id="title-method-">PayPal</h3>
                    </div>
                    <input type="radio" id="paypal" name="choose-payment-method" class="radio-payment radio" value="1" />
                </label>

                <label for="visa" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                <div class="w-24 mr-2">

                    <img src="{{ asset('payment/paypal.png') }}" class="h-6 object-cover" alt="paypal" />
                </div>    
                    <input id="visa" type="radio" name="choose-payment-method" class="radio-payment radio" value="1" />
                </label>
            </div> -->

            <!-- QR CODE -->
            <h2 class="font-medium">Kode QR</h2>
            <div id="qris-list" class="mt-2">
                <label for="qris" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                        <div class="w-24 mr-2">
                            <img id="img-method-7" src="{{ asset('payment/qris.png') }}" class="h-6 object-cover" alt="qris" />
                        </div>
                        <h3 id="title-method-7">QRIS</h3>
                    </div>
                    <input type="radio" id="qris" name="choose-payment-method" class="radio-payment radio" value="7" />
                </label>
            </div>

            <!-- BANK -->
            <h2 class="font-medium mt-5">Bank Transfer / Virtual Account</h2>
            <div id="bank-transfer-list" class="flex flex-col gap-2 mt-2">

                <!-- BCA -->
                <label for="bca" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                        <div class="w-24 mr-2">
                            <img id="img-method-1" src="{{ asset('payment/bca.png') }}" class="h-6 object-cover" alt="bca" />
                        </div>
                        <h3 id="title-method-1">BCA</h3>
                    </div>
                    <input type="radio" id="bca" name="choose-payment-method" class="radio-payment radio" value="1" />
                </label>

                <!-- MANDIRI -->
                <label for="mandiri" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                        <div class="w-24 mr-2">
                            <img id="img-method-3" src="{{ asset('payment/mandiri.png') }}" class="h-6 object-cover" alt="mandiri" />
                        </div>
                        <h3 id="title-method-3">Mandiri</h3>
                    </div>
                    <input type="radio" id="mandiri" name="choose-payment-method" class="radio-payment radio" value="3" />
                </label>

                <!-- BNI -->
                <label for="bni" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                        <div class="w-24 mr-2">
                            <img id="img-method-2" src="{{ asset('payment/bni.png') }}" class="h-6 object-cover" alt="bni" />
                        </div>
                        <h3 id="title-method-2">BNI</h3>
                    </div>
                    <input type="radio" id="bni" name="choose-payment-method" class="radio-payment radio" value="2" />
                </label>

                <!-- BRI -->
                <label for="bri" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                        <div class="w-24 mr-2">
                            <img id="img-method-4" src="{{ asset('payment/bri.png') }}" class="h-6 object-cover" alt="bri" />
                        </div>
                        <h3 id="title-method-4">BRI</h3>
                    </div>
                    <input type="radio" id="bri" name="choose-payment-method" class="radio-payment radio" value="4" />
                </label>

                <!-- CIMB NIAGA -->
                <label for="cimb-niaga" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                        <div class="w-24 mr-2">
                            <img id="img-method-5" src="{{ asset('payment/cimb.png') }}" class="h-6 object-cover" alt="cimb-niaga" />
                        </div>
                        <h3 id="title-method-5">CIMB Niaga</h3>
                    </div>
                    <input type="radio" id="cimb-niaga" name="choose-payment-method" class="radio-payment radio" value="5" />
                </label>

                <!-- MAYBANK -->
                <!-- <label for="maybank" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                    <div class="w-24 mr-2">

                        <img src="{{ asset('payment/paypal.png') }}" class="h-6 object-cover" alt="maybank" />
                    </div>    
                        <h3 id="title-method-">Maybank</h3>
                    </div>
                    <input type="radio" id="maybank" name="choose-payment-method" class="radio-payment radio" value="1" />
                </label> -->

                <!-- PERMATA -->
                <label for="permata" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                        <div class="w-24 mr-2">
                            <img id="img-method-6" src="{{ asset('payment/permata.png') }}" class="h-6 object-cover" alt="permata" />
                        </div>
                        <h3 id="title-method-6">Permata Bank</h3>
                    </div>
                    <input type="radio" id="permata" name="choose-payment-method" class="radio-payment radio" value="6" />
                </label>
            </div>

            <!-- E WALLET -->
            <h2 class="font-medium mt-5">Dompet Digital</h2>
            <div id="e-wallet-list" class="flex flex-col gap-2 mt-2">
                <!-- DANA -->
                <!-- <label for="dana" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                        <div class="w-24 mr-2">

                            <img src="{{ asset('payment/dana.png') }}" class="h-6 object-cover" alt="dana" />
                        </div>
                        <h3 id="title-method-">DANA</h3>
                    </div>
                    <input type="radio" id="dana" name="choose-payment-method" class="radio-payment radio" value="8" />
                </label> -->

                <label for="gopay" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                        <div class="w-24 mr-2">
                            <img id="img-method-9" src="{{ asset('payment/gopay.png') }}" class="h-6 object-cover" alt="gopay" />
                        </div>
                        <h3 id="title-method-9">Gopay</h3>
                    </div>
                    <input type="radio" id="gopay" name="choose-payment-method" class="radio-payment radio" value="9" />
                </label>

                <!-- LINKAJA -->
                <!-- <label for="link-aja" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                        <div class="w-24 mr-2">

                            <img src="{{ asset('payment/linkaja.png') }}" class="h-10 w-16 object-cover" alt="link-aja" />
                        </div>
                        <h3 id="title-method-">LinkAja</h3>
                    </div>
                    <input type="radio" id="link-aja" name="choose-payment-method" class="radio-payment radio" value="10" />
                </label> -->

                <!-- OVO -->
                <!-- <label for="ovo" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                        <div class="w-24 mr-2">
                            <img src="{{ asset('payment/ovo.png') }}" class="h-6 object-cover" alt="ovo" />
                        </div>
                        <h3 id="title-method-">OVO</h3>
                    </div>
                    <input type="radio" id="ovo" name="choose-payment-method" class="radio-payment radio" value="11" />
                </label> -->
            </div>
        </section>

        <div class="modal-action px-7 pb-7">
            <button type="button" class="select-payment-btn btn btn-outline btn-neutral btn-block">Simpan Metode Pembayaran</button>
        </div>
    </div>
</dialog>

<script src="{{ asset('js/choosePaymentMethod.js') }}"></script>
<script>
    let qris = [{
        id: 7,
        name: 'QRIS',
        img: '<?= asset('payment/qris.png') ?>'
    }];

    let bank_transfer = [{
            id: 1,
            name: 'BCA',
            img: '<?= asset('payment/bca.png') ?>'
        },
        {
            id: 3,
            name: 'Mandiri',
            img: '<?= asset('payment/mandiri.png') ?>'
        },
        {
            id: 2,
            name: 'BNI',
            img: '<?= asset('payment/bni.png') ?>'
        },
        {
            id: 4,
            name: 'BRI',
            img: '<?= asset('payment/bri.png') ?>'
        },
        {
            id: 5,
            name: 'CIMB Niaga',
            img: '<?= asset('payment/cimb.png') ?>'
        },
        {
            id: 6,
            name: 'Permata Bank',
            img: '<?= asset('payment/permata.png') ?>'
        }
    ];

    let e_wallet = [{
        id: 9,
        name: 'Gopay',
        img: '<?= asset('payment/gopay.png') ?>'
    }];

    const method_component = (id, name, img) => {
        return `<label for="method-${id}" class="border p-6 bg-white flex items-center justify-between cursor-pointer">
                    <div class="flex items-center gap-2">
                        <div class="w-24 mr-2">
                            <img id="img-method-${id}" src="${img}" class="h-6 object-cover" alt="${name}" />
                        </div>
                        <h3 id="title-method-${id}">${name}</h3>
                    </div>
                    <input type="radio" id="method-${id}" name="choose-payment-method" class="radio-payment radio" value="${id}" />
                </label>`
    }

    $('#search-method').keyup(function() {
        let keyword = this.value.toLowerCase();

        let filtered_qris = qris.filter(function(e) {
            return e.name.toLowerCase().match(keyword)
        });

        let filtered_bank = bank_transfer.filter(function(e) {
            return e.name.toLowerCase().match(keyword)
        });

        let filtered_wallet = e_wallet.filter(function(e) {
            return e.name.toLowerCase().match(keyword)
        });

        // CLEARING PREVIOUS PAYMENT METHOD
        $('#qris-list').html('');
        $('#bank-transfer-list').html('');
        $('#e-wallet-list').html('');

        // APPENDING COMPONENT
        if (keyword != "") {

            filtered_qris.forEach(method => $('#qris-list').append(method_component(method.id, method.name, method.img)));
            filtered_bank.forEach(method => $('#bank-transfer-list').append(method_component(method.id, method.name, method.img)));
            filtered_wallet.forEach(method => $('#e-wallet-list').append(method_component(method.id, method.name, method.img)));
        } else {
            qris.forEach(method => $('#qris-list').append(method_component(method.id, method.name, method.img)));
            bank_transfer.forEach(method => $('#bank-transfer-list').append(method_component(method.id, method.name, method.img)));
            e_wallet.forEach(method => $('#e-wallet-list').append(method_component(method.id, method.name, method.img)));
        }


    })
</script>