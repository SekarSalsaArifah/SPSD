          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y mx-4 pt-3">
              <!-- <hr class="my-5" /> -->
              <!-- Striped Rows -->

              <a href="<?= base_url('server/addAppServer')?>" class="badge badge-info p-2 m-1;" style="scale:100%; margin-left:1px">Tambah Data</a>
              <div class="row pt-2">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
              <h6 class="fw-bold py-3 mb-2">App Server</h6>
                <div class="table-responsive text-nowrap">
                  <table id="datatable" class="table table-striped table-bordered" style="align-center" >
                  <thead>
                        <tr>
                          <th>Jenis Server</th>
                          <th>Versi App Server</th>  
                        </tr>
                      </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td><?php echo $app_server->jenis_server;?></td>
                        <td><?php echo $app_server->versi;?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
              <!--/ Striped Rows -->
            </div>
            <!-- / Content -->
