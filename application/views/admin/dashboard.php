<!-- Deklarasi nama_instansi -->
<?php
                $nama_instansi = $this->session->userdata('nama_instansi');
              ?>
          <!-- Content wrapper -->
          <div class="content-wrapper pt-3">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y mx-4">
              
              <!-- <hr class="my-5" /> -->
              <!-- Striped Rows -->
              <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table id='datatable' class="table table-striped">
                  <h5 class="fw-bold py-3 mb-1 ">Statistik Data</h5>
                    <thead>
                    
                    <div class="row">
 
                      <div class="col-md-3 col-sm-12 mb-3">
                        <div class="card">
                        <div class="card-title"><h5>Data Pengajuan</h5></div>
                    
                          <div class="card-body">
                            <div class="card-title"><h4><?php echo $count_pengajuan ?></h4></div>
                          </div>
                          <div class="card-footer">
                          <a href="<?php echo base_url('dashadmin/detailpengajuan');?>" class="" style="scale:90% ; margin-left:-11px target="_blank>Detail <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                      </div>
                    
                      <div class="col-md-3 col-sm-12 mb-3">
                        <div class="card">
                        <div class="card-title"><h5>Data Instansi</h5></div>
                    
                          <div class="card-body">
                            <div class="card-title"><h4><?php echo $count_instansi ?></h4></div>
                          </div>
                          <div class="card-footer">
                          <a href="<?php echo base_url('dashadmin/detailinstansi');?>" class="" style="scale:90% ; margin-left:-11px target="_blank>Detail <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                      </div>
                    
                      <div class="col-md-3 col-sm-12 mb-3">
                        <div class="card">
                        <div class="card-title"><h5>Data Fisik Server</h5></div>
                    
                          <div class="card-body">
                            <div class="card-title"><h4><?php echo $count_fisik ?></h4></div>
                          </div>
                          <div class="card-footer">
                          <a href="<?php echo base_url('dashadmin/detailfisikserver');?>" class="" style="scale:90% ; margin-left:-11px target="_blank>Detail <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3 col-sm-12 mb-3">
                        <div class="card">
                        <div class="card-title"><h5>Data App Server</h5></div>
                    
                          <div class="card-body">
                            <div class="card-title"><h4><?php echo $count_app ?></div>
                          </div>
                          <div class="card-footer">
                          <a href="<?php echo base_url('dashadmin/detailappserver');?>" class="" style="scale:90% ; margin-left:-11px target="_blank>Detail <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                      </div>
                    
                    </div>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
              <!--/ Striped Rows -->
            </div>
            <!-- / Content -->
