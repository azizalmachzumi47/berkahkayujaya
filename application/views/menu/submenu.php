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

                            <a href="" class="btn btn-primary mb-3" data-toggle="modal"
                                data-target="#newSubMenuModal">Add New Submenu</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Menu</th>
                                            <th scope="col">Url</th>
                                            <th scope="col">Icon</th>
                                            <th scope="col">Active</th>
                                            <th scope="col">Action Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($subMenu as $sm) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <th><?= $sm['title']; ?></th>
                                            <th><?= $sm['menu']; ?></th>
                                            <th><?= $sm['url']; ?></th>
                                            <th><?= $sm['icon']; ?></th>
                                            <th><?= $sm['is_active']; ?></th>
                                            <th>
                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#editSubMenu<?= $sm['id']; ?>"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteSubMenu<?= $sm['id']; ?>"><i
                                                        class="fas fa-trash"></i></a>
                                            </th>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
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
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/submenu'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active"
                                    id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Active?
                                </label>
                            </div>
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

    <!--  Modal Edit Menu-->
    <?php foreach ($subMenu as $sm) : ?>
    <div class="modal fade" id="editSubMenu<?= $sm['id']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="editSubMenu<?= $sm['id']; ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubMenu<?= $sm['id']; ?>Label">Edit Sub Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/editSubMenu/') . $sm['id']; ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title"
                                value="<?= $sm['title']; ?>">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $sm['id']; ?>">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>" <?php if ($m['id'] == $sm['menu_id']) : ?> selected
                                    <?php endif; ?>>
                                    <?= $m['menu'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon']; ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active"
                                    id="is_active" <?php if ($sm['is_active'] == 1) : ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="is_active">
                                    Active?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- Modal Delete Menu-->
    <?php foreach ($subMenu as $sm) : ?>
    <div class="modal fade" id="deleteSubMenu<?= $sm['id']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="deleteSubMenu<?= $sm['id']; ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSubMenu<?= $sm['id']; ?>Label">Delete Sub Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/deleteSubMenu/') . $sm['id']; ?>" method="POST">
                    <div class="modal-body">
                        <p>Are you sure want to delete <?= $sm['title']; ?>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>