<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h3 class="text-center"><?= $title; ?></h3>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <?= form_error('gambar', '<div class="alert alert-danger" role="alert">', '</div>') ?>

                            <?= $this->session->flashdata('message'); ?>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Gambar Kayu</th>
                                            <th scope="col">Total Gambar Kayu</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                            foreach ($gambarkayu as $r => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td>
                                                <center>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#gambarModal<?= $value->id_kayu ?>">
                                                        <img src="<?= base_url('assets/gambarkayu/' . $value->foto_kayu) ?>"
                                                            width="100px" id="gambar_load" data-toggle="tooltip"
                                                            data-placement="top" title="Klik untuk tampilkan gambar">
                                                    </a>
                                                </center>
                                            </td>
                                            <td class="text-center"><span class="badge bg-warning">
                                                    <h5><?= $value->total_gambarkayu ?></h5>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('gambarkayu/add_gambarkayu/' . $value->id_kayu) ?>"
                                                    class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
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