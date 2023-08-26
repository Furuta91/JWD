@include('layout.header',['title' => 'Daftar'])

    @php
        $existingData = App\Models\Beasiswa::first();
    @endphp

    <div class="container mt-4">
        <h1>Pendaftaran Beasiswa</h1>

        @if ($existingData)
            <p>Data Anda Sudah Tersedia!</p>
            <p>Silahkan Edit atau Hapus Data Untuk Menginput Ulang</p>
        @else

        <form action="{{ route('beasiswas.store') }}" method="post">
                @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Masukkan Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Masukkan Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="nomor-hp" class="form-label">Masukkan Nomor HP</label>
                <input type="number" class="form-control" name="nomor_hp" required>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Pilih Semester Saat Ini</label>
                <select class="form-select" name="semester" required>
                    <option value="" disabled selected>Pilih Semester</option>
                    <option value="Semester 1">1</option>
                    <option value="Semester 2">2</option>
                    <option value="Semester 3">3</option>
                    <option value="Semester 4">4</option>
                    <option value="Semester 5">5</option>
                    <option value="Semester 6">6</option>
                    <option value="Semester 7">7</option>
                    <option value="Semester 8">8</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="text" class="form-control" name="ipk" id="ipkInput" value="3.50">
            </div>
            <div class="mb-3">
                <label class="form-label">Pilihan Beasiswa</label>
                <select class="form-select" name="beasiswa" id="beasiswaSelect">
                    <option disabled selected>Pilihan Beasiswa</option>
                    <option value="akademik">Beasiswa Akademik</option>
                    <option value="non-akademik">Beasiswa Non-Akademik</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="upload-berkas" class="form-label">Upload Berkas Syarat</label>
                <input type="file" class="form-control" name="berkas" accept=".pdf, .jpg, .jpeg, .png, .zip" required>
            </div>
            <div class="mb-5">
                <button type="submit" class="btn btn-primary">Daftar</button>
                <button type="reset" class="btn btn-warning">reset</button>
                <button type="button" class="btn btn-danger" id="batalButton">Batal</button>
            </div>
        </form>
        @endif
    </div>

            <script>
                const ipkInput = document.getElementById('ipkInput');
                const beasiswaSelect = document.getElementById('beasiswaSelect');

                ipkInput.addEventListener('input', function () {
                    const ipkValue = parseFloat(ipkInput.value);
                    if (ipkValue < 3) {
                        alert("Maaf, Anda belum memiliki cukup IPK untuk mengikuti beasiswa ini.");
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