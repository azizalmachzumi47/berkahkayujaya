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

                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">
                                Add New Menu</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Menu</th>
                                            <th scope="col">Target Menu</th>
                                            <th scope="col">ID Target Menu</th>
                                            <th scope="col">Icon Menu</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                            foreach ($tblmenu as $m => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><?= $value->menu ?></td>
                                            <td><?= $value->target_menu ?></td>
                                            <td><?= $value->idtarget_menu ?></td>
                                            <td><?= $value->icon_menu ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#edit<?= $value->id ?>"><i
                                                        class="fas fa-edit"></i></button>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete<?= $value->id ?>"><i
                                                        class="fas fa-trash"></i></button>
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


    <!-- Modal -->
    <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="target_menu" name="target_menu"
                                placeholder="Target Menu">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="idtarget_menu" name="idtarget_menu"
                                placeholder="ID Target Menu">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="icon_menu" name="icon_menu"
                                placeholder="Icon Menu">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /.modal edit-->
    <?php foreach ($tblmenu as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('menu/edit/' . $value->id);
                    ?>

                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" name="menu" value="<?= $value->menu ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Target Menu</label>
                        <input type="text" name="target_menu" value="<?= $value->target_menu ?>" class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label>ID Target Menu</label>
                        <input type="text" name="idtarget_menu" value="<?= $value->idtarget_menu ?>"
                            class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Icon Menu</label>
                        <input type="text" name="icon_menu" value="<?= $value->icon_menu ?>" class="form-control"
                            required>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <?php } ?>

    <!-- /.modal delete-->
    <?php foreach ($tblmenu as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->menu ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h5>Are you sure you want to delete this data...?</h5>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('menu/delete/' . $value->id) ?>" class="btn btn-primary">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <?php } ?>