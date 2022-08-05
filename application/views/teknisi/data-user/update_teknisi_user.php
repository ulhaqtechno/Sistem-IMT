

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-6">
                <h3 class="justify-content-start">Update Data User</h3>
              </div>

              <div class="col-6">
                <a class="btn bg-gradient-primary  w-100 justify-content-end" href="<?= base_url('teknisi/tambah_teknisi_imt') ?>" type="button">Tambah Data User +</a>
              </div>
              </div>
            </div>
            <div class="card-body  pb-2">
              <form action="<?= base_url('teknisi/change/data_user_teknisi/edit_teknisi_user') ?>" enctype="multipart/form-data" method="post">
                <?php foreach ($data_user as $u) { ?>
                    <div class="">
                        <div class="hero text-white hero-bg-image" data-background="<?= base_url('assets/') ?>stisla-assets/img/unsplash/eberhard-grossgasteiger-1207565-unsplash.jpg">
                            <div class="col-md-4 mx-auto rounded-circle bg-white p-3" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
                                <img src="<?= base_url() . 'assets/profile_picture/' . $u->photo; ?>" class="card-img-top  rounded-circle img-responsive" alt="...">
                            </div>
                            <div class="input-group mt-3 mx-auto" style="width: 50%;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file mb-5">
                                  <input type="file" class="custom-file-input" id="image" name="photo" aria-describedby="inputGroupFileAddon01">
                                  <label class="custom-file-label" for="inputGroupFile01"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="detail" class="col-md-12 bg-white p-3" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
                        <h1 class="font-weight-bold card-title text-center" style="color: black;">Update Data
                            User
                        </h1>
                        <p class="text-center my-4" style="line-height: 5px;">Silahkan isi data dibawah untuk update
                        data, dan upload file diatas untuk update data profile picture</p>
                        <hr>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $u->id ?>">
                            <!-- <input type="hidden" name="tgl_upload" value="<?= $u->tgl_upload ?>"> -->
                            
                            <label for="nim" class="font-weight-bold" style="font-size: 20px;">Nama</label>
                            <input type=" text" class="form-control" id="nim" aria-describedby="emailHelp" required name="nama" value="<?= $u->nama ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_prestasi" class="font-weight-bold" style="font-size: 20px;">Email</label>
                            <input type="text" class="form-control" name="email" value="<?= $u->email ?>" id="nama_prestasi">
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                            <label for="nama_file" class="font-weight-bold" style="font-size: 20px;">Password</label>
                            <input type="text" class="form-control" name="password" value="<?= $u->password ?>" id="nama_file">
                        </div>
                      </div>
                      <div class="col-sm-6">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1" class="font-weight-bold text-sm">Jenis User</label>
                              <select class="form-control" name="jenis" id="exampleFormControlSelect1">
                                <option value="<?= $u->jenis ?>">Choose ..</option>
                                <option value="Petugas">Petugas</option>
                                <option value="Teknisi">Teknisi</option>
                                <option value="Pemerintah">Pemerintah</option>
                                <option value="Admin">Admin</option>
                              </select>
                            </div>

                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                            <label for="nama_file" class="font-weight-bold" style="font-size: 20px;">Instansi</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $u->alamat ?>" id="nama_file">
                        </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                            <label for="nama_file" class="font-weight-bold" style="font-size: 20px;">Code Instansi</label>
                            <input type="text" class="form-control" name="code_instansi" value="<?= $u->code_instansi ?>" id="nama_file">
                        </div>
                          </div>
                        </div>
                        <input type="submit" value="Update ⭢" class="btn btn-success btn-block">
                    </div>
                <?php } ?>
            </form>
            </div>
          </div>
        </div>
      </div>

 