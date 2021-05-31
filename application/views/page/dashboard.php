<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>Rp. <?=number_format($balance, 0, '.', '.');?></h3>

                        <p>Saldo</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a href="#" class="small-box-footer">Lihat Pemakaian Saldo <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53</h3>

                        <p>Total Pemesanan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <a href="#" class="small-box-footer">Lihat Riwayat Pemesanan <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>44</h3>

                        <p>Total Deposit</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <a href="#" class="small-box-footer">Lihat Rimaway Deposit <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box box-solid box-success">
                    <div class="box-header">
                        <h3 class="box-title">Informasi</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>TANGGAL | WAKTU</th>
                                        <th>KATEGORI</th>
                                        <th>ISI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($info->result() as $data => $value) { ?>

                                    <tr>
                                        <td><?=$value->date_time?></td>
                                        <td><?=$value->category?></td>
                                        <td><?=$value->contents?></td>
                                    </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo $this->pagination->create_links()?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="box box-solid box-success">
                    <div class="box-header">
                        <h3 class="box-title">FORM</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Kategori :</label>
                            <select class="form-control" id="category">
                                <option value="0" disabled="" selected="">-- Pilih Kategori --</option>
                                <option>Google</option>
                                <option>Instagram Likes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Layanan :</label>
                            <select class="form-control" id="services">
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah :</label>
                            <input type="number" id="jumlah" class="form-control" onkeyup="hitung()">
                        </div>
                        <div class="form-group">
                            <label>Harga :</label>
                            <div class="input-group" id="harga">
                                <span class="input-group-addon">Rp.</span>
                                <input type="text" class="form-control" value="" readonly="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label id="result">Rp. 0</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>