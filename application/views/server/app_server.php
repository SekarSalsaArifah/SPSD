<?php if ($this->session->flashdata('msg')) { ?>
                  <div class="alert alert-primary alert-dismissible m-1 p-2 alert-fixed" id="success-alert">
                  <i class="icon fas fa-check"></i>Selamat! 
                      <?= $this->session->flashdata('msg') ?>
                  </div>
              <?php } ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y mx-4 pt-3">
              <a href="<?= base_url('server/addAppServer')?>" class="badge badge-info p-2 m-1;" style="scale:100%; margin-left:1px">Tambah Data</a>
              <!-- <hr class="my-5" /> -->
              <!-- Striped Rows -->
              <div class="row pt-2">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table id="datatable" class="table table-striped" style="align-center" >
                  <h5 class="fw-bold py-2 mb-1">Data App Server</h5>
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Jenis Server</th>
                        <th>Versi</th>
                        <th>Server Fisik</th>
                        <th>Alamat IP</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      
                      <?php $i=1;
                      foreach($app_server as $row) {?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row->jenis_server;?></td>
                        <td><?php echo $row->versi;?></td>
                        <td><?php echo $row->nama_server;?></td>
                        <td><?php echo $row->ip;?></td>
                        <!-- <td>
                              <a href="<?php echo site_url('server/delete/'.$row->id_appserver);?>" class="btn rounded-pill btn-warning"> 
                              Delete</a>
                            </td> -->
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
