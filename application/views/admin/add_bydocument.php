          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y mx-4">
              <h4 class="fw-bold py-3 mb-0"><span class="text-muted fw-light"></h4>
  
              <div class="row">

                <div class="col-12 col-md-8 col-lg-8">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Input Data Domain & Server</h5>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="<?php echo site_url('dashadmin/edit');?>" enctype="multipart/form-data">
                      <input type="hidden" name="id_subdomain" value="<?php echo $subdomain->id_subdomain;?>">
                      <input type="hidden" name="status" value="Y">
                        <div class="row mb-2">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Website</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control mt-n1 mt-n1" id="basic-default-name" name="website" placeholder="" value="<?php echo $subdomain->website;?>" required/>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Layanan</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control mt-n1" id="basic-default-name" name="layanan" value="<?php echo $subdomain->layanan;?>" placeholder="" />
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Subdomain</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control mt-n1" id="basic-default-name" name="subdomain" placeholder=""/>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Email</label>
                          <div class="col-sm-12">
                            <input type="email" class="form-control mt-n1" id="basic-default-name" name="email" placeholder="" required/>
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
                        <div class="row mb-2">
                          <label class="col-sm-3 col-form-label" for="basic-default-message">Keterangan</label>
                          <div class="col-sm-12">
                            <textarea id="basic-default-message" class="form-control mt-n1" name="keterangan" placeholder="" aria-label="Keterangan" aria-describedby="basic-icon-default-message2"></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12 text-left">
                            <div><button type="submit" class="btn btn-success mb px-4" style="scale:80%; margin-left:-11px ">Simpan</button></div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- / Content -->
