          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y mx-4">
            <h4 class="fw-bold py-3 mb-0"><span class="text-muted fw-light"></h4>
              <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Input Server App</h5>

                    </div>
                    <div class="card-body">
                      <form method="POST" action="<?php echo site_url('server/saveappserver');?>" enctype="multipart/form-data">
                        <div class="row mb-1">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Jenis Server App</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control mt-n1" id="basic-default-name" name="jenis_server" placeholder="" required/>
                          </div>
                        </div>
                      
                        <div class="row mb-1">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Versi</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control mt-n1" id="basic-default-name" name="versi" placeholder="" required/>
                          </div>
                        </div>

                        <div class="row mb-1">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Server Fisik</label>
                          <div class="col-sm-12">
                          <select  class="form-control mt-n1" name="id_server" placeholder="Server Fisik" required>
                          <?php foreach($server as $item) { ?>
                            <option value="<?php echo $item->id_server;?>"><?php echo $item->nama_server;?></option>
                          <?php } ?>
                          </select>
                          </div>
                        </div>

                        <div class="row mb-1">
                          <label class="col-sm-3 col-form-label" for="basic-default-name">Keterangan</label>
                          <div class="col-sm-12">
                          <textarea id="basic-default-message" class="form-control mt-n1" name="keterangan" placeholder=""></textarea>
                        </div>

                        <div class="row mt-2">
                          <div class="col-sm-12 text-left">
                            <div><button type="submit" class="btn btn-success mb px-4" style="scale:80%;">Simpan</button></div>
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
