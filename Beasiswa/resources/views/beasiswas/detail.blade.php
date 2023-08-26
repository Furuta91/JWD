@include('layout.header', ['title' => 'Data Pendaftar'])

<div class="container mt-4">
    <table class="table table-striped table-lg">
        <h1>Data Pendaftaran</h1>
        @foreach ($beasiswas as $beasiswa)
            <tr>
                <td><strong>Nama</strong></td>
                <td>:</td>
                <td>{{ $beasiswa['nama'] }}</td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>:</td>
                <td>{{ $beasiswa['email'] }}</td>
            </tr>
            <tr>
                <td><strong>Nomor HP</strong></td>
                <td>:</td>
                <td>{{ $beasiswa['nomor_hp'] }}</td>
            </tr>
            <tr>
                <td><strong>Semester</strong></td>
                <td>:</td>
                <td>{{ $beasiswa['semester'] }}</td>
            </tr>
            <tr>
                <td><strong>IPK</strong></td>
                <td>:</td>
                <td>{{ $beasiswa['ipk'] }}</td>
            </tr>
            <tr>
                <td><strong>Pilihan Beasiswa</strong></td>
                <td>:</td>
                <td>{{ $beasiswa['beasiswa'] }}</td>
            </tr>
            <tr>
                <td><strong>Berkas</strong></td>
                <td>:</td>
                <td>{{ $beasiswa['berkas'] }}</td>
            </tr>
            <tr>
                <td><strong>Status Ajuan</strong></td>
                <td>:</td>
                <td>
                    <strong style="background-color: orange; color: black; border-radius: 5px; padding: 2px;">
                        Belum Diverifikasi
                    </strong>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('beasiswas.edit', [$beasiswa]) }}" ><button class="btn btn-warning">Edit</button></a>
                        &nbsp;
                        <form action="{{ route('beasiswas.destroy', [$beasiswa]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        </table>
        @endforeach
    </div>

@include('layout.footer')
