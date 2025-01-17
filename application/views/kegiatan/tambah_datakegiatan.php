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

                <form action="<?= base_url(); ?>kegiatan/tambahdata_kegiatanaction" method="post"
                    class="form-horizontal" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="form-control-label">Deskripsi</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <textarea name="deskripsi_kegiatan" id="deskripsi_kegiatan" class="form-control"
                                    rows="5" placeholder="Deskripsi"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <img src="<?= base_url('assets/img/upload.png') ?>" id="gambar_load" width="100px">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Upload Gambar Kegiatan</label>
                        </div>
                        <div class="form-group">
                            <input type="file" name="upload_kegiatan" class="form-upload_kegiatan" id="preview_gambar">
                        </div>
                    </div>

                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url(); ?>kegiatan" class="btn btn-secondary">Cancel</a>
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