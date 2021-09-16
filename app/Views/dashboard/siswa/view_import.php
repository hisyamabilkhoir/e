<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-3">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Import Excel
                    </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">



            <?= form_open_multipart('siswa/prosesExcel') ?>
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file_excel" accept=".xls,.xlsx">
            </div>
            <button type="submit" class="btn btn-info float-right">Import</button>
            <?= form_close(); ?>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>




<?php echo view('template/footer'); ?>