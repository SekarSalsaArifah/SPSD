<?php if ($this->session->flashdata('msg')) { ?>
                  <div class="alert alert-primary alert-dismissible m-1 p-2 alert-fixed" id="success-alert">
                  <i class="icon fas fa-check"></i>Selamat! 
                      <?= $this->session->flashdata('msg') ?>
                  </div>
              <?php } ?>
          <!-- Content wrapper -->
          <div class="content-wrapper pt-4">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y mx-4">
              <!-- <hr class="my-5" /> -->
              <!-- Striped Rows -->
              <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
              <?php if ($this->session->flashdata('msg')) { ?>
                  <div class="alert alert-primary alert-dismissible m-1 p-2 alert-fixed" id="success-alert">
                  <i class="icon fas fa-check"></i>Selamat!
                      <?= $this->session->flashdata('msg') ?>
                  </div>
              <?php } ?>
                <div class="table-responsive text-nowrap">
                  <table id="datatable" class="table table-striped" style="align-center" >
                  <h5 class="fw-bold py-2 mb-1">Data App Server</h5>
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Jenis App Server</th>
                        <th>Server Fisik</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      
                    <?php $i=1;foreach($app_server as $row) {?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row->jenis_server;?></td>
                        <td><?php echo $row->nama_server;?></td>
                    </tr>
                    <?php $i++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
              <!--/ Striped Rows -->
            </div>
            <!-- / Content -->
