<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<style>
.form-group {
    display: flex;
    align-items: center;
}

.form-group input {
    margin-right: 10px;
}

.form-group .form-control-label {
    white-space: nowrap;
}
</style>

<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h3 class="text-center"><?= $title; ?></h3>

                <form action="<?= base_url(); ?>pesanankayu/tambahdata_pesanankayuaction" method="post"
                    class="form-horizontal" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Jenis Kayu</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <select name="id_kayu" id="id_kayu" class="form-control" required>
                                    <option value="">--Pilih Jenis Kayu--</option>
                                    <?php foreach ($kayujaya as $key => $value) { ?>
                                    <option value="<?= $value->id_kayu ?>" data-lebar="<?= $value->lebar_kayu ?>"
                                        data-tinggi="<?= $value->tinggi_kayu ?>" data-harga="<?= $value->harga_kayu ?>"
                                        data-gambar="<?= base_url('assets/gambarkayu/' . $value->foto_kayu) ?>"
                                        data-stok="<?= $value->stok_kayu ?>">
                                        <?= $value->jenis_kayu ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Nama Pelanggan</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" name="nama_customer" id="nama_customer" class="form-control"
                                    placeholder="Nama Pelanggan">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <label class="form-control-label">Gambar Kayu</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <img src="<?= base_url('assets/img/gambarkayu.png') ?>" id="gambar_load" width="100px">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Lebar</label>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input type="text" name="lebar_kayu" id="lebar_kayu" class="form-control"
                                    placeholder="Lebar" readonly>
                                <label class="form-control-label" for="lebar_kayu">Per-M</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Tinggi</label>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input type="text" name="tinggi_kayu" id="tinggi_kayu" class="form-control"
                                    placeholder="Tinggi" readonly>
                                <label class="form-control-label" for="tinggi_kayu">Per-M</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Stok Kayu</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="number" min="0" name="stok_kayu" id="stok_kayu" class="form-control"
                                    placeholder="Stok Kayu">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Harga</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" name="harga_kayu" id="harga_kayu" class="form-control"
                                    placeholder="Rp." readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Jumlah</label>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <input type="number" min="0" name="jumlah" id="jumlah" class="form-control"
                                    placeholder="Jumlah">
                                <label class="form-control-label" for="tinggi_kayu">Per-Batang</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Total Harga</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" name="total_harga" id="total_harga" class="form-control"
                                    placeholder="Rp." readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Keterangan</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="5"
                                    placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">No Hp / Email</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" name="no_hp" id="no_hp" class="form-control"
                                    placeholder="No Hp / Email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Alamat Pesanan</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <textarea name="alamat_pesanan" id="alamat_pesanan" class="form-control" rows="5"
                                    placeholder="Alamat Pesanan"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Tanggal Pesanan</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="date" name="tanggal_pesankayu" id="tanggal_pesankayu" class="form-control"
                                    placeholder="tanggal_pesankayu" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url(); ?>pesanankayu" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
    document.getElementById('id_kayu').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];

        var lebarKayu = parseFloat(selectedOption.getAttribute('data-lebar')) || 0;
        var tinggiKayu = parseFloat(selectedOption.getAttribute('data-tinggi')) || 0;
        var hargaKayu = parseFloat(selectedOption.getAttribute('data-harga')) || 0;
        var stokKayu = parseInt(selectedOption.getAttribute('data-stok')) || 0;
        var fotoKayu = selectedOption.getAttribute('data-gambar');

        document.getElementById('lebar_kayu').value = lebarKayu;
        document.getElementById('tinggi_kayu').value = tinggiKayu;
        document.getElementById('harga_kayu').value = hargaKayu;
        document.getElementById('stok_kayu').value = stokKayu;
        document.getElementById('gambar_load').src = fotoKayu || '<?= base_url('assets/img/gambarkayu.png') ?>';

        calculateTotal();
    });

    document.getElementById('jumlah').addEventListener('input', function() {
        var jumlah = parseInt(this.value) || 0;
        var stokAwal = parseInt(document.getElementById('stok_kayu').value) || 0;

        // Kurangi stok dengan jumlah input
        var stokTersisa = stokAwal - jumlah;

        // Validasi stok tidak boleh negatif
        if (stokTersisa < 0) {
            alert('Jumlah kayu melebihi stok yang tersedia!');
            this.value = stokAwal; // Reset ke nilai maksimum yang diizinkan
            stokTersisa = 0;
        }

        document.getElementById('stok_kayu').value = stokTersisa;
        calculateTotal();
    });

    function calculateTotal() {
        var lebar = parseFloat(document.getElementById('lebar_kayu').value) || 0;
        var tinggi = parseFloat(document.getElementById('tinggi_kayu').value) || 0;
        var harga = parseFloat(document.getElementById('harga_kayu').value) || 0;
        var jumlah = parseInt(document.getElementById('jumlah').value) || 0;

        var totalHarga = (lebar + tinggi + harga) * jumlah;

        document.getElementById('total_harga').value = formatRupiah(totalHarga);
    }

    function formatRupiah(angka) {
        return angka.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
    }

    document.querySelector('form').addEventListener('submit', function() {
        var totalHarga = document.getElementById('total_harga').value;

        // Hapus semua karakter kecuali angka
        totalHarga = totalHarga.replace(/[^\d]/g, '');
        document.getElementById('total_harga').value = totalHarga;
    });
    </script>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date(); // Mendapatkan tanggal saat ini
        var day = String(today.getDate()).padStart(2, '0'); // Menambahkan 0 di depan jika hanya 1 digit
        var month = String(today.getMonth() + 1).padStart(2,
            '0'); // Menambahkan 0 di depan jika hanya 1 digit (karena bulan di JavaScript dimulai dari 0)
        var year = today.getFullYear();

        var currentDate = year + '-' + month + '-' + day; // Menggabungkan menjadi format 'YYYY-MM-DD'
        document.getElementById('tanggal_pesankayu').value = currentDate; // Mengisi nilai input tanggal

        // Jika ingin mengizinkan pengguna mengedit, hilangkan atau sesuaikan 'disabled'
        document.getElementById('tanggal_pesankayu').removeAttribute('disabled');
    });
    </script>