<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/laundry/home">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>



<section class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg col">
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php $order = query()->table('orders')->where('status_laundry', 'unconfirm')->get(); ?>
                        <h3><?= hitung($order); ?></h3>

                        <p>Orderan Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= url('ordermasuk') ?>" class="small-box-footer">cek <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg col">
                <div class="small-box bg-success">
                    <div class="inner">
                        <?php $orderSelesai = query()->table('orders')->where('status_laundry', 'done')->get(); ?>
                        <h3><?= hitung($orderSelesai); ?></h3>

                        <p>Terselesaikan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-checkmark"></i>
                    </div>
                    <a href="<?= url('orderselesai') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg col">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <?php $user = query()->table('users')->get(); ?>
                        <h3><?= hitung($user); ?></h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?php url('backend/users/data') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg col">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <?php $pay = query()->table('payment')->get(); ?>
                        <h3><?= hitung($pay); ?></h3>
                        <p>Keuagan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-social-usd"></i>
                    </div>
                    <a href="<?php url('backend/payment/data') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>

    </div>
</section>