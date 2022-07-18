<style>
p {
    font-weight: none;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo WEB_URL.'dashboard/myDashboard' ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?php echo (isset($pvalue['page_heading']))?$pvalue['page_heading']:'List';?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-body">
            <?php $this->load->view('adminlayout/message_view');?>
            <div class="form-row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header bg-primary">Retailer Amount</div>
                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <p for="Picture">Retailer Amount <star>*</star>
                                    </p>
                                    <input required value="<?php echo $row['retailer_amount']; ?>" class="form-control"
                                        id="Picture" type="number" name="retailer_amount" />

                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" name="RetailerAmount" value="RetailerAmount"
                                        class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header bg-danger">Distributor Amount</div>
                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <p for="Picture">Distributor Amount <star>*</star>
                                    </p>
                                    <input value="<?php echo $row['distributor_amount']; ?>" class="form-control"
                                        id="Picture" type="number" name="distributor_amount" />
                                </div>
                                <input type="hidden" name="id" value="1">
                                <div class="form-group text-right">
                                    <button type="submit" name="DistributorAmount" value="DistributorAmount"
                                        class="btn btn-danger btn-sm">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header bg-warning">Date of Birth Amount</div>
                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <p for="Picture">Date of Birth Amount <star>*</star>
                                    </p>
                                    <input value="<?php echo $row['dob_amount']; ?>" class="form-control" id="Picture"
                                        type="number" name="dob_amount" />
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" name="dobAmount" value="dobAmount"
                                        class="btn btn-warning btn-sm">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
				<div class="col-sm-4">
                    <div class="card">
                        <div class="card-header bg-success">Death Amount</div>
                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <p for="Picture">Death Amount <star>*</star>
                                    </p>
                                    <input value="<?php echo $row['death_amount']; ?>" class="form-control" id="Picture"
                                        type="number" name="death_amount" />
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" name="deathAmount" value="deathAmount"
                                        class="btn btn-success btn-sm">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->