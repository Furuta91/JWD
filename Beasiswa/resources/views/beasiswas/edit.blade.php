@include('layout.header',['title' => 'Edit Data'])

    <div class="container mt-4">
        <h1>Edit Data Pendaftaran</h1>
        <form action="{{route('beasiswas.update', $beasiswa->id)}}" method="post">
            @csrf
            @method('PUT') 
            <div class="mb-3">
                <label for="nama" class="form-label">Masukkan Nama</label>
                <input type="text" class="form-control" name="nama" value="{{$beasiswa->nama}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Masukkan Email</label>
                <input type="email" class="form-control" name="email" value="{{$beasiswa->email}}">
            </div>
            <div class="mb-3">
                <label for="nomor-hp" class="form-label">Masukkan Nomor HP</label>
                <input type="number" class="form-control" name="nomor_hp" value="{{$beasiswa->nomor_hp}}">
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Pilih Semester Saat Ini</label>
                <select class="form-select" name="semester">
                    <option value="" disabled selected>Pilih Semester</option>
                    <option value="Semester 1" @if($beasiswa->semester === 'Semester 1') selected @endif>1</option>
                    <option value="Semester 2" @if($beasiswa->semester === 'Semester 2') selected @endif>2</option>
                    <option value="Semester 3" @if($beasiswa->semester === 'Semester 3') selected @endif>3</option>
                    <option value="Semester 4" @if($beasiswa->semester === 'Semester 4') selected @endif>4</option>
                    <option value="Semester 5" @if($beasiswa->semester === 'Semester 5') selected @endif>5</option>
                    <option value="Semester 6" @if($beasiswa->semester === 'Semester 6') selected @endif>6</option>
                    <option value="Semester 7" @if($beasiswa->semester === 'Semester 7') selected @endif>7</option>
                    <option value="Semester 8" @if($beasiswa->semester === 'Semester 8') selected @endif>8</option>
                </select>
            </div>            
            <div class="mb-3">
                <label for="ipk" class="form-label">IPK</label>
                <input type="text" class="form-control" name="ipk" id="ipkInput" value="{{$beasiswa->ipk}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Pilihan Beasiswa</label>
                <select class="form-select" name="beasiswa" id="beasiswaSelect">
                    <option disabled selected>Pilihan Beasiswa</option>
                    <option value="akademik" @if($beasiswa->beasiswa == 'akademik') selected @endif>Beasiswa Akademik</option>
                    <option value="non-akademik" @if($beasiswa->beasiswa == 'non-akademik') selected @endif>Beasiswa Non-Akademik</option>
                </select>
            </div>            
            <div class="mb-3">
                <label for="upload-berkas" class="form-label">Upload Berkas Syarat</label>
                <input type="file" class="form-control" name="berkas" accept=".pdf, .jpg, .jpeg, .png, .zip">
            </div>            
            <div class="mb-5">
                <button type="submit" class="btn btn-primary">Daftar</button>
                <button type="reset" class="btn btn-warning">reset</button>
                <button type="button" class="btn btn-danger" id="batalButton">Batal</button>
            </div>
        </form>
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