<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h3 class="text-center"><?= $title; ?></h3>

                <div class="row">
                    <div class="col-lg-8">

                        <form action="<?= base_url('gambarkayu/add_gambarkayu/' . $kayu->id_kayu); ?>" method="post"
                            class="form-horizontal" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-control">ID Kayu</label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" name="id_kayu" id="id_kayu" class="form-control"
                                            value="<?= $kayu->id_kayu?>">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="form-control">Upload Gambar Project</label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <img src="<?= base_url('assets/img/upload.png') ?>" id="gambar_load"
                                            width="100px">
                                        <br><br><br>
                                        <div class="form-group">
                                            <input type="file" name="gambar_berkahkayu" multiple class="form-control"
                                                id="preview_gambar">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?= base_url(); ?>gambarkayu" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>

                        </form>

                        <div class="row">
                            <div class="featured-cars-img" style="display: flex; flex-wrap: wrap; gap: 50px;">
                                <?php foreach ($gambar_kayu as $key => $value) { ?>
                                <div class="col-md-4" style="margin-bottom: 15px;">
                                    <div style="width: 100%; text-align: center;">
                                        <img src="<?= base_url('assets/gambarkayu/' . $value->gambar_berkahkayu) ?>"
                                            style="width: 100%; height: 150px; object-fit: cover;">
                                    </div>
                                    <button data-toggle="modal" data-target="#delete<?= $value->id_gambarkayu ?>"
                                        class="btn btn-danger btn-xs btn-block mt-2">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </div>
                                <?php } ?>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- end modal delete-->
    <?php foreach ($gambar_kayu as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_gambarkayu ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambarkayu/' . $value->gambar_berkahkayu) ?>" width="220px"
                            height="200px">
                    </div>

                    <h5>Apakah Anda Yakin Ingin Menghapus Data Ini...?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('gambarkayu/delete_gambarkayu/' . $value->id_kayu . '/' . $value->id_gambarkayu) ?>"
                        class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>

    <?php } ?>
    <!-- end modal delete-->

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