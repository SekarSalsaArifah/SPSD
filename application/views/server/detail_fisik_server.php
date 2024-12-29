          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y mx-4">
              <!-- <hr class="my-5" /> -->
              <!-- Striped Rows -->
              <div class="row pt-2">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
              <h6 class="fw-bold py-3 mb-2"><span class="text-muted fw-light"></span>Server Fisik</h6>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped table-bordered" style="align-center" >
                    <thead>
                        <tr>
                          <th>Nama Server</th>
                          <th>Alamat IP</th>  
                          <th>Sistem Operasi</th>
                          <th>Versi Sistem Operasi</th>
                        </tr>
                      </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td><?php echo $server->nama_server;?></td>
                        <td><?php echo $server->ip;?></td>
                        <td><?php echo $server->os;?></td>
                        <td><?php echo $server->versi_os;?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Striped Rows -->
            </div>
            <!-- / Content -->
