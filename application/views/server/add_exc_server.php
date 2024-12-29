          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y mx-4">
            <h4 class="fw-bold py-3 mb-0"><span class="text-muted fw-light"></h4>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-7">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Edit Layanan</h5>
                    </div>
                    <div class="form-group">
                    <div class="card-body">   
                    <form method="POST" action="<?php echo site_url('dashadmin/editserver');?>" enctype="multipart/form-data">
                    <input type="hidden" name="id_subdomain" value="<?php echo $subdomain->id_subdomain;?>">
                    <div class="row mb-2">
                  <label class="col-sm-3 col-form-label" for="basic-default-name">Website</label>
                  <div class="col-sm-12">
                  <input type="text" class="form-control mt-n1" id="basic-default-name" name="website" placeholder="" value="<?php echo $subdomain->website;?>" required/>
                      </div>
                  </div>
                  <div class="row mb-2">
                  <label class="col-sm-3 col-form-label" for="basic-default-name">Layanan</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control mt-n1" id="basic-default-name" name="layanan" placeholder="" value="<?php echo $subdomain->layanan;?>" required/>
                      </div>
                  </div>
                  <div class="row mb-2">
                  <label class="col-sm-3 col-form-label" for="basic-default-name">Subdomain</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control mt-n1" id="basic-default-name" name="subdomain" placeholder="" value="<?php echo $subdomain->subdomain;?>" required/>
                      </div>
                  </div>
                  <div class="row">
                  <label class="col-sm-3 col-form-label" for="basic-default-name">Email</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control mt-n1" id="basic-default-name" name="email" placeholder="" value="<?php echo $subdomain->email;?>" required/>
                      </div>
                  </div>
                  <div class="row mb-2">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Server Fisik</label>
                          <div class="col-sm-12">
                          <select  class="form-control mt-n1" name="id_server" placeholder="Server Fisik" required>
                          <?php foreach($server as $item) { ?>
                            <option value="<?php echo $item->id_server;?>"><?php echo $item->nama_server;?></option>
                          <?php } ?>
                          </select>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">App Server</label>
                          <div class="col-sm-12">
                          <select  class="form-control mt-n1" name="id_appserver" placeholder="App Server" required>
                          <?php foreach($app_server as $item) { ?>
                            <option value="<?php echo $item->id_appserver;?>"><?php echo $item->jenis_server;?></option>
                          <?php } ?>
                          </select>
                          </div>
                        </div>
                      <!-- <div class="row mb-2">
                        <label class="col-sm-3 col-form-label" for="basic-default-name">Nama Server</label>
                      <div class="col-sm-12">
                      <select class="form-control mt-n1" id="nama_server" name="nama_server" placeholder="Nama Server" required>
                         <option value="<?php echo $subdomain->id_server; ?>"><?php echo $subdomain->nama_server; ?></option>
                      </select>
                    </div> -->
                    </div>              
                    <div class="row">
                      <div class="col-sm-12 text-left">
                        <button type="submit" class="btn btn-success mb px-4 mt-n2" style="scale:80%; margin-left:9px;">Simpan</button>
                      </div>
                    </div>
               </form>               
              </div>
            </div>
            
            
          </div>
