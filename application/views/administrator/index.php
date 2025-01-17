<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h3 class="text-center"><?= $title; ?></h3>

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

                            <?= $this->session->flashdata('message'); ?>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">E-mail</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Action</th>>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                            foreach ($allusers as $r => $value) { ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no++; ?>
                                            </td>
                                            <td><?= $value->username ?></td>
                                            <td><?= $value->nama ?></td>
                                            <td><?= $value->email ?></td>
                                            <td>
                                                <center><img src="<?= base_url('assets/profile/' . $value->image) ?>"
                                                        width="50px">
                                                </center>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('administrator/edit_user/' . $value->id) ?>"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete<?= $value->id ?>"><i
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

    <!-- end modal delete-->
    <?php foreach ($allusers as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->nama ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h5>Apakah Anda Yakin Ingin Menghapus Data Ini...?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/deleteuserlogin/' . $value->id) ?>" class="btn btn-primary">Delete</a>
                </div>

            </div>
        </div>
    </div>
    <?php } ?>
    <!-- end modal delete-->