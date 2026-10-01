@extends('layouts.app')

@section('content')
<div class="bg-black min-h-screen">
    <x-navbar />

    {{-- Hero Section --}}
    <section class="relative py-24 overflow-hidden bg-gradient-to-b from-black to-gray-900">
        {{-- Separator Border --}}
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    Terms & Conditions
                </h1>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">
                    Please read these terms and conditions carefully before purchasing tickets
                </p>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="py-16 bg-gradient-to-b from-gray-900 to-black">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white/5 backdrop-blur-sm rounded-3xl border border-white/10 p-8 md:p-12">
                    {{-- Intro --}}
                    <div class="mb-12">
                        <p class="text-gray-300 leading-relaxed text-lg">
                            Pelanggan pembeli <span class="text-white font-bold">TIKETNONTON.COM</span> sebelum anda membeli tiket acara di TIKETNONTON.COM, sebaiknya anda harus memperhatikan SYARAT DAN KETENTUAN yang berlaku di TIKETNONTON.COM dimana Pembeli Tiket maupun Pemegang Tiket harus mengikuti semua Syarat dan ketentuan umum yang dikeluarkan TIKETNONTON.COM dan atau atas nama Penyelenggara Acara (Promotor), Pemilik Acara, dan Tempat Acara.
                        </p>
                    </div>

                    {{-- Main Terms --}}
                    <div class="space-y-8">
                        <div>
                            <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                                <span class="w-2 h-8 bg-gradient-to-b from-purple-500 to-pink-500 rounded-full"></span>
                                Syarat dan Ketentuan Umum
                            </h2>

                            <div class="space-y-6">
                                {{-- Point 1 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-purple-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        <span class="text-white font-semibold">TIKETNONTON.COM</span> adalah sebagai agen penjual tiket untuk dan atas nama Penyelenggara yang bertanggung jawab atas Tiket Acara yang dijual. Semua tiket pesanan atau pembelian bergantung pada jumlah tiket yang tersedia, TIKETNONTON.COM berhak untuk menerima atau menolak pemesanan tiket karena alasan apapun, apabila tiket sudah tidak tersedia.
                                    </p>
                                </div>

                                {{-- Point 2 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-purple-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        <span class="text-purple-400 font-semibold">Siapkan Tanda Pengenal Anda</span> dalam melakukan pembelian tiket di TIKETNONTON.COM. Pastikan bahwa pemegang Tiket yang anda beli tersebut adalah orang yang melakukan pembelian sesuai Tanda Pengenal anda (KTP/SIM/paspor) dan Kartu Tanda Terakhir Vaksin COVID 19.
                                    </p>
                                </div>

                                {{-- Point 3 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-purple-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        Bila Pemegang Tiket bukan Pembeli maka Pemegang Tiket harus melengkapi dan menyerahkan <span class="text-white font-semibold">"Surat Kuasa"</span> yang telah ditandatangani oleh Pembeli Tiket di atas Materai dan disertai dengan salinan Identitas Diri Pembeli Tiket yang sah (KTP / SIM / Paspor).
                                    </p>
                                </div>

                                {{-- Point 4 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-purple-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        TIKETNONTON.COM hanya mengeluarkan <span class="text-purple-400 font-semibold">E-Voucher</span> yang akan diterima pembeli setelah transaksi resmi. E-Voucher ini akan dikirim kepada pembeli melalui email. E-Voucher akan ditukar dengan tiket resmi sebelum acara, ketentuannya paling lambat 2 hari sebelum pertunjukan atau saat acara.
                                    </p>
                                </div>

                                {{-- Point 5 --}}
                                <div class="pl-5 border-l-2 border-red-500/50 hover:border-red-500 transition-colors bg-red-500/5 rounded-r-lg py-4 pr-4">
                                    <p class="text-gray-300 leading-relaxed">
                                        <span class="text-red-400 font-semibold">Tiket yang telah dibeli tidak dapat ditukarkan atau dikembalikan</span> karena alasan apapun tanpa pengecualian. Dan Tidak ada pengembalian berupa uang tiket dalam keadaan apapun kecuali jika dalam kondisi tertentu, seperti; Acara ditunda atau dibatalkan dan diberitahukan dalam pernyataan terbuka atau pemberitahuan penundaan Acara yang dibuat secara publik oleh Penyelenggara Acara (Promotor) atau Pemilik Acara melalui TIKETNONTON.COM ataupun media terbuka lainnya yang bersifat resmi.
                                    </p>
                                </div>

                                {{-- Point 6 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-purple-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        Jika Pemegang Tiket / Pembeli Tiket tidak membawa E-Vaucher pada saat penukaran tiket, maka dapat mencetak E-Voucher dengan dikenakan biaya cetak senilai <span class="text-white font-semibold">Rp. 20.000,- (Dua Puluh Ribu Rupiah)</span> per transaksi (Kebijakan ini bergantung pada ketersediaan fasilitas dan sesuai dengan peraturan yang berlaku di Tempat Acara). Dengan menunjukan KTP/ SIM/paspor atas nama pemegang tiket/pembeli.
                                    </p>
                                </div>

                                {{-- Point 7 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-purple-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        Tiket hanya berlaku untuk <span class="text-white font-semibold">1 (satu) Orang dan 1 (satu) kali penggunaan</span> sesuai dengan kategori atau kelas, waktu & tanggal acara, atau dengan peraturan yang diatur oleh Penyelenggara Acara (Promotor) atau Operator Acara.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Special Terms --}}
                        <div class="pt-8 border-t border-white/10">
                            <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                                <span class="w-2 h-8 bg-gradient-to-b from-pink-500 to-purple-500 rounded-full"></span>
                                Ketentuan Khusus
                            </h2>

                            <div class="space-y-6">
                                {{-- Special Point 1 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-pink-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        <span class="text-pink-400 font-semibold">Batas Usia</span> untuk memasuki Tempat acara, seperti: Apabila konser untuk orang dewasa atau 18 th keatas, pengunjung Anak-anak tanpa tiket tidak diizinkan memasuki Acara.
                                    </p>
                                </div>

                                {{-- Special Point 2 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-pink-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        Pada beberapa hal/kejadian tertentu, penundaan tidak berlaku ketika Pemegang Tiket telah diinformasikan agar dapat memasuki tempat Acara pada waktu yang ditentukan atau ketika sedang jeda istirahat berlangsung.
                                    </p>
                                </div>

                                {{-- Special Point 3 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-pink-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        Setiap Pemegang Tiket yang memasuki Acara diwajibkan untuk patuh pada peraturan, ketentuan dan kondisi yang berlaku di Tempat Acara.
                                    </p>
                                </div>

                                {{-- Special Point 4 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-pink-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        <span class="text-red-400 font-semibold">Perangkat fotografi, Perangkat Rekaman Audio ataupun Video tidak diizinkan</span> selama Acara berlangsung, kecuali terdapat pernyataan dari Pemilik Acara atau Penyelenggara Acara (Promotor).
                                    </p>
                                </div>

                                {{-- Special Point 5 --}}
                                <div class="pl-5 border-l-2 border-red-500/50 hover:border-red-500 transition-colors bg-red-500/5 rounded-r-lg py-4 pr-4">
                                    <p class="text-gray-300 leading-relaxed">
                                        <span class="text-red-400 font-semibold">Dilarang membawa</span> makanan, minuman, rokok dan korek api, senjata tajam, pistol dan sejenisnya masuk kedalam area pertunjukan.
                                    </p>
                                </div>

                                {{-- Special Point 6 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-pink-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        Penyelenggara Acara atau Tempat Acara berhak untuk menolak atau dilarang masuk ke arena gedung pertunjukan bagi Pemegang Tiket atau Pengunjung Acara, apabila ditemukan bahwa Pemegang Tiket atau Pengunjung Acara bertindak tidak sesuai dengan aturan atau tidak pantas atau menyebabkan ancaman bagi keamanan atau mengganggu ketertiban umum. Atas perlakuan tersebut Pemegang tiket akan dapat sangsi tanpa pengembalian uang atau kompensasi apapun.
                                    </p>
                                </div>

                                {{-- Special Point 7 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-pink-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        Penyelenggara Acara atau Operator Acara berhak dan dapat menunda, membatalkan, menyela, atau menghentikan Acara, menghentikan layanan yang terkait dengan Acara, menolak akses ke Tempat Acara dengan alasan situasi berbahaya, cuaca buruk, faktor alam, permintaan dari Badan Hukum Pemerintah dan atau karena alasan penyebab lainnya yang berada diluar kendali dan kekuasaan Pemilik Acara, Penyelenggara Acara, Operator Acara maupun Tempat Acara.
                                    </p>
                                </div>

                                {{-- Special Point 8 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-pink-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        Segala sesuatu yang terjadi, baik semua risiko, kecelakaan, kehilangan atau hal-hal lain yang tidak diinginkan, baik sebelum, selama atau sesudah Acara / Peristiwa yang terjadi yang berada diluar kemampuan Penyelenggara Acara atau Operator Acara adalah <span class="text-white font-semibold">tanggung jawab sepenuhnya dari Pemegang Tiket</span>.
                                    </p>
                                </div>

                                {{-- Special Point 9 --}}
                                <div class="pl-5 border-l-2 border-white/10 hover:border-pink-500/50 transition-colors">
                                    <p class="text-gray-300 leading-relaxed">
                                        Setiap keluhan mengenai Acara akan disampaikan kepada pihak Penyelenggara Acara (Promotor) serta setiap keluhan mengenai Tempat Acara akan diarahkan dan ditangani oleh Pemilik Tempat Acara atau Manajemen Tempat Acara.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Footer Note --}}
                    <div class="mt-12 pt-8 border-t border-white/10">
                        <div class="bg-purple-500/10 border border-purple-500/20 rounded-2xl p-6">
                            <div class="flex items-start gap-4">
                                <svg class="w-6 h-6 text-purple-400 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h3 class="text-white font-bold mb-2">Important Notice</h3>
                                    <p class="text-gray-300 leading-relaxed">
                                        Dengan melakukan pembelian tiket di TIKETNONTON.COM, Anda dianggap telah membaca, memahami, dan menyetujui semua syarat dan ketentuan yang berlaku.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer />
</div>
@endsection
