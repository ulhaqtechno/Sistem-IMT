

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-6">
                <h3 class="justify-content-start">Create User</h3>
              </div>
              </div>
            </div>
            <div class="card-body  pb-2">
              <?php echo form_open_multipart('petugas/change/data_member_teknisi/tambah_teknisi_member'); ?>

                <div class="form-group ">
                            <label for="nama_prestasi" class="label-font-register">Nama</label>
                            <input type="Text" class="form-control" name="nama" id="nama_prestasi" placeholder="Nama Lengkap ..  " required="">
                            <?= form_error('Nama_prestasi', '<small class="text-danger">', '</small>'); ?>
                        </div>

                    <!-- <div class="form-group">
                        <label for="nim" class="label-font-register">Email</label>
                        <input type="text" autocomplete="off" class="form-control effect-9" name="email" id="nim" placeholder="example@gmail.com" required="">
                        <?= form_error('nim', '<small class="text-danger">', '</small>'); ?>
                    </div> -->
                    
                            
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                        <label for="nama_file" class="label-font-register">No ID Kartu Member</label>
                        <input type="text" class="form-control" autocomplete="off" name="uid" id="nama_file" placeholder="No ID kartu member .." required>
                        <?= form_error('Nama_file', '<small class="text-danger">', '</small>'); ?>

                    </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                        <label for="exampleFormControlSelect1">Instansi</label>
                      <select class="form-control" name="code_instansi" id="exampleFormControlSelect1">
                        <?php

                        $instansi = $this->db->get_where('instansi', array('code_instansi' => $user['code_instansi']))->row();                                
                      ?>
                        
                        <option value="<?php echo $user['code_instansi'] ?>"><?php echo $instansi->instansi ?></option>
                        
                      </select>
                      </select>
                        <?= form_error('Nama_file', '<small class="text-danger">', '</small>'); ?>

                    </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                        <option >Choose ..</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    
                  </div>
                  <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama_file" class="label-font-register">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" id="nama_file" placeholder="Tanggal Lahir .." required>
                            <?= form_error('Nama_file', '<small class="text-danger">', '</small>'); ?>
      
                        </div>

                      </div>
                    </div>
                    
                        <!-- <div class="custom-file mb-2">
                          <label class="custom-file-label" for="inputGroupFile01">Upload Photo</label>
                                <input type="file" class="custom-file-input" id="image" name="photo" aria-describedby="inputGroupFileAddon01" >
                            </div> -->

                        

                  
                    <div class="form-check">
                        <input class="form-check-input checkbox" type="checkbox" id="defaultCheck1" onchange="document.getElementById('btnsubmit').disabled = !this.checked;">
                        <label class=" form-check-label" for="defaultCheck1">
                            Saya setuju dan ingin melanjutkan
                        </label>
                    </div>
                    <!-- <p class="terms">Dengan mendaftar anda menyetujui <i>privasi dan persyaratan ketentuan
                    hukum kami </i>
                    baca selengkapnya <a href="#"> disini</a></p> -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block">
                            Upload ⭢
                        </button>
                    </div>
                <?php echo form_close() ?>
            </div>
          </div>
        </div>
      </div>

