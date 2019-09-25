<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Main Menu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Manage Job Categories</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <!-- start card 1 -->
      <div class="card-header">
        <h3 class="card-title">Job Categories</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <!--card-body 1 (Content) -->



            <!-- End Content -->
          </div>
          <!-- End card-body 1 (Content) -->
        </div>
        <!-- End card -->


        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Add Job Types </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <!--card-body 2 (Content) -->
                <!-- start Form -->
                <?php 
                if ($this->session->flashdata('msg')) {
                  echo "<div class='alert alert-success'> <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$this->session->flashdata('msg')."</div>";
                }
                ?>
                <?php echo validation_errors('<div class="alert alert-danger">','</div>');?> 
                <?php echo form_open('admin_con/saveJobCategories'); ?>
                <label for="jobType" class="d-sm-block">Job Type:</label>
                <input type="text" class="form-control" name="jobType" value="<?php echo set_value('jobType');?>" required> <br>  
                <button type="submit" class="btn btn-primary" style="margin: 0 auto;display: block;">Save</button><br>
                <?php echo form_close(); ?>
                <!-- end form -->
              </div>
              <!-- End card-body 2 (Content) -->
            </div>
            <button id="saveJobType" class="btn btn-primary">saveJobType</button>
          </section>
          <!-- End content -->
        </div>
        <!-- End content-wrapper -->
        <script type="text/javascript">
          $(document).ready(function(){
            $("#saveJobType").click(function(){
              alert("Clicked");
            });
          });
        </script>
