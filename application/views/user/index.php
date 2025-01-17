<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h3 class="text-center"><?= $title; ?></h3>

                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/profile/') . $login['image']; ?>" class="card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $login['username']; ?></h5>
                                <p class="card-text"><?= $login['email']; ?></p>
                                <p class="card-text"><small class="text-muted">Member Since
                                        <?= $login['date_created']; ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>