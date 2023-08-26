@include('layout.header',['title' => 'Beasiswa'])

<section class="content container mt-4">
    <h1 class="mb-3">Ketentuan Syarat Beasiswa</h1>
    <p>Beasiswa disediakan untuk siswa yang memenuhi persyaratan berikut:</p>
    <ul>
        <li>Prestasi akademik yang tinggi</li>
        <li>Penghargaan dan aktivitas ekstrakurikuler yang signifikan</li>
        <li>Kebutuhan finansial</li>
    </ul>
</section>

<section class="scholarship-options container mt-4">
    <h2 class="mb-3">Pilihan Beasiswa</h2>
    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">Beasiswa Akademik</h3>
            <p class="card-text">Beasiswa ini diberikan kepada siswa dengan prestasi akademik yang luar biasa <a href="{{route('beasiswas.create')}}">Daftar Sekarang</a>.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Beasiswa Non-Akademik</h3>
            <p class="card-text">Beasiswa ini diberikan kepada siswa yang memiliki kontribusi besar dalam aktivitas ekstrakurikuler dan sosial <a href="{{route('beasiswas.create')}}">Daftar Sekarang</a>.</p>
        </div>
    </div>
</section>

<script>
    const ipkInput = document.getElementById('ipkInput');
    const beasiswaSelect = document.getElementById('beasiswaSelect');

    ipkInput.addEventListener('input', function () {
        const ipkValue = parseFloat(ipkInput.value);
        if (ipkValue < 3) {
            alert("Maaf, IPK anda kurang dari 3.00, jika anda salah menginput silahkan refresh halaman ini");
            ipkInput.value = ''; // Clear the input
            beasiswaSelect.disabled = true;
            ipkInput.disabled = true;
            document.querySelector('input[name="berkas"]').disabled = true;
        } else {
            beasiswaSelect.disabled = false;
            ipkInput.disabled = false;
            document.querySelector('input[name="berkas"]').disabled = false;
        }
    });

    const batalButton = document.getElementById('batalButton');

    batalButton.addEventListener('click', function () {
        window.location.href = '{{ route("beasiswas.index") }}';

    });
</script>

@include('layout.footer')