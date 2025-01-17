<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h3 class="text-center"><?= $title; ?></h3>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <?= form_error('deskripsi_kegiatan', '<div class="alert alert-danger" role="alert">', '</div>') ?>

                            <?= $this->session->flashdata('message'); ?>

                            <a href="<?= base_url('kegiatan/tambah_datakegiatan') ?>" type="button"
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"> Tambah Data</i></a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Gambar Kegiatan</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($kegiatankayu as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $value->deskripsi_kegiatan ?></td>
                                            <td>
                                                <center>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#gambarModal<?= $value->id_kegiatan ?>">
                                                        <img src="<?= base_url('assets/gambarkegiatan/' . $value->upload_kegiatan) ?>"
                                                            width="100px" id="gambar_load" data-toggle="tooltip"
                                                            data-placement="top" title="Klik untuk tampilkan gambar">
                                                    </a>
                                                </center>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('kegiatan/edit_kegiatan/' . $value->id_kegiatan) ?>"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deletekegiatan<?= $value->id_kegiatan ?>"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Modal untuk menampilkan gambar -->

    <?php foreach ($kegiatankayu as $key => $value) { ?>
    <div class="modal fade" id="gambarModal<?= $value->id_kegiatan ?>" tabindex="-1" role="dialog"
        aria-labelledby="gambarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gambarModalLabel">Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url('assets/gambarkegiatan/' . $value->upload_kegiatan) ?>" class="img-fluid"
                        alt="Gambar Kegiatan">
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('assets/gambarkegiatan/' . $value->upload_kegiatan) ?>"
                        download="Gambar Kegiatan.jpg" class="btn btn-primary">Unduh</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- end modal delete-->
    <?php foreach ($kegiatankayu as $key => $value) { ?>
    <div class="modal fade" id="deletekegiatan<?= $value->id_kegiatan ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Kegiatan <?= $value->deskripsi_kegiatan ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h5>Apakah Anda Yakin Ingin Menghapus Data Ini...?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('kegiatan/delete_kegiatan/' . $value->id_kegiatan) ?>"
                        class="btn btn-primary">Delete</a>
                </div>

            </div>
        </div>
    </div>
    <?php } ?>
    <!-- end modal delete-->