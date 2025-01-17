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

                <form action="<?= base_url('kayu/editkayu_action/' . $kayujaya->id_kayu); ?>" method="post"
                    class="form-horizontal" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Jenis Kayu</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" name="jenis_kayu" id="jenis_kayu" class="form-control"
                                    value="<?= $kayujaya->jenis_kayu ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Lebar Kayu</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="number" min="0" name="lebar_kayu" id="lebar_kayu" class="form-control"
                                    value="<?= $kayujaya->lebar_kayu ?>">
                                <!-- <label class="form-control-label" for="tinggi_kayu">Per-Cm</label> -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Tinggi Kayu</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="number" min="0" name="tinggi_kayu" id="tinggi_kayu" class="form-control"
                                    value="<?= $kayujaya->tinggi_kayu ?>">
                                <!-- <label class="form-control-label" for="tinggi_kayu">Per-Cm</label> -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Harga Kayu</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="number" min="0" name="harga_kayu" id="harga_kayu" class="form-control"
                                    value="<?= $kayujaya->harga_kayu ?>">
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
                                    value="<?= $kayujaya->stok_kayu ?>">
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
                                <textarea name="keterangan_kayu" id="keterangan_kayu" class="form-control"
                                    rows="5"><?= $kayujaya->keterangan_kayu ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <img src="<?= base_url('assets/gambarkayu/' . $kayujaya->foto_kayu) ?>" id="gambar_load"
                                    width="100px">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Upload Gambar Kayu</label>
                        </div>
                        <div class="form-group">
                            <input type="file" name="foto_kayu" class="form-foto_kayu" id="preview_gambar">
                        </div>
                    </div>

                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url(); ?>kayu" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
    </script>

    <!-- <script type="text/javascript">
    $("#jenis_huruftimbul").select2({
        placeholder: "--Pilih Jenis Huruf Timbul--"
    });
    </script> -->