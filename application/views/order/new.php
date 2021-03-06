<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pemesanan
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-7 col-md-7 col-xs-12">
                <div class="box box-solid box-success">
                    <div class="box-header">
                        <h3 class="box-title">Pesan Baru</h3>
                    </div>
                    <div class="box-body">
                        <form method="post" id="box">
                            <div class="form-group">
                                <label>Kategori :</label>
                                <select class="form-control" id="category">
                                    <option value="0" disabled="" selected="">Pilih Kategori</option>
                                    <?php foreach ($category->result() as $data => $value) { ?>

                                    <option><?=$value->category?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Layanan :</label>
                                <select class="form-control" id="services" name="services">
                                    <option>Pilih kategori terlebih dahulu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                        <label>Harga/1000 :</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp.</span>
                                            <input type="number" id="price" class="form-control" value="0" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                        <label>Minimal :</label>
                                        <input type="number" id="min" class="form-control" value="0" readonly="">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                        <label>Maksimal :</label>
                                        <input type="number" id="max" class="form-control" value="0" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <font color="red" id="note"></font>
                            </div>
                            <div class="form-group">
                                <label>Target :</label>
                                <input type="text" id="target" name="target" class="form-control">
                            </div>
                            <div class="form-group hide" id="custom_comments">
                                <label>Komentar Khusus/Custom Comments :</label>
                                <textarea rows="3" class="form-control" name="custom_comments"></textarea>
                            </div>
                            <div class="form-group hide" id="custom_link">
                                <label>Link Khusus/Custom Link :</label>
                                <textarea rows="3" class="form-control" name="custom_link"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Pesan :</label>
                                <input type="number" id="quantity" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Total Harga :</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="text" class="form-control" id="total_price" value="0" readonly="">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                                <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-xs-12">
                <div class="box box-solid box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Informasi</h3>
                    </div>
                    <div class="box-body">
                        
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

<script>
$(document).ready(function() {
    $("#category").change(function() {
        var category = $("#category").val();
        $.ajax({
            url     : "<?=base_url();?>order/services",
            type    : "POST",
            dataType: "html",
            data    : {"category" : category},
            success : function(data) {
                $("#services").html(data);
            },
            error   : function() {
                $("#box").html("<div class='alert alert-danger'>Terjadi kesalahan, silahkan refresh halaman ini.</div>");
            }
        });
    });

    $("#services").change(function() {
        var quantity = $("#quantity").val();
        var services = $("#services").val();
        $.ajax({
            url     : "<?=base_url();?>order/service_data",
            type    : "POST",
            dataType: "json",
            data    : {"services" : services},
            success : function(data) {
                $("#price").val(data.msg.price);
                $("#min").val(data.msg.min);
                $("#max").val(data.msg.max);
                $("#note").html(data.msg.note);

                if (data.msg.custom == 'comment') {
                    $("#custom_comments").removeClass('hide');
                    $("#quantity").attr('disabled', 'true');
                } else if (data.msg.custom == 'link') {
                    $("#custom_link").removeClass('hide');
                } else if (data.msg.custom == 'comment_5k' && quantity >= 5000) {
                    $("#custom_comments").removeClass('hide');
                    $("#quantity").attr('disabled', 'true');
                } else {
                    $("#custom_comments").addClass('hide');
                    $("#custom_link").addClass('hide');
                    $("#quantity").removeAttr('disabled');
                }
            },
            error   : function() {
                $("#box").html("<div class='alert alert-danger'>Terjadi kesalahan, silahkan refresh halaman ini.</div>");
            }
        });
    });

    $("#quantity").on('keyup', function() {
        var quantity = $("#quantity").val();
        var services = $("#services").val();
        if (services == 1008 && quantity >= 5000) {
            $("#custom_comments").removeClass('hide');
        } else {
            $("#custom_comments").addClass('hide');
        }
        $.ajax({
            url     : "<?=base_url();?>order/total_price",
            type    : "POST",
            dataType: "json",
            data    : {"services" : services, "quantity" : quantity},
            success : function(data) {
                $("#total_price").val(data.total_price);
            },
            error   : function() {
                $("#box").html("<div class='alert alert-danger'>Terjadi kesalahan, silahkan refresh halaman ini.</div>");
            }
        });
    });
});
</script>