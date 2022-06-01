<div class="main-panel">
  <div class="main-content">
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Basic Elements start -->
        <section class="basic-elements">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title-wrap bar-success">
                    <h4 class="card-title mb-0">Produk page</h4>
                  </div>
                </div>
                <div class="card-body">
                  <div class="px-3">
                    <form action="<?php echo base_url('admin/Produk/page_tambah') ?>" method="post" enctype="multipart/form-data">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-12">
                            <fieldset class="form-group">
                              <label for="basicInput">Nama Produk</label>
                              <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="Nama Produk">
                              <?php echo form_error('nama'); ?>
                            </fieldset>
                          </div>

                          <div class="col-xl-4 col-lg-6 col-md-12">
                            <fieldset class="form-group">
                              <label for="helperText">Harga</label>
                              <input type="text" class="form-control" name="harga" value="<?php echo set_value('harga'); ?>" placeholder="Harga">
                              <?php echo form_error('harga'); ?>
                            </fieldset>
                          </div>
                          <div class="col-xl-4 col-lg-6 col-md-12">
                            <fieldset class="form-group">
                              <label for="helperText">Berat</label>
                              <input type="text" class="form-control" name="berat" value="<?php echo set_value('berat'); ?>" placeholder="Berat">
                              <?php echo form_error('berat'); ?>
                            </fieldset>
                          </div>
                          <div class="col-xl-4 col-lg-6 col-md-12">
                            <fieldset class="form-group">
                              <label for="customSelect">Kategori</label>
                              <select class="custom-select d-block w-100" name="kategori" id="customSelect">
                                  <option value="<?php echo set_value('kategori'); ?>" selected>-- Select kategori --</option>
                                <?php foreach($kategori as $kat) : ?>
                                  <option value="<?php echo $kat->id_kategori; ?>" <?php if($select==$kat->id_kategori) echo 'selected="selected"'; ?>><?php echo $kat->kategori ?></option>
                                <?php endforeach; ?>
                              </select>
                              <?php echo form_error('kategori'); ?>
                            </fieldset>               
                          </div>
                          <div class="col-12">
                            <fieldset class="form-group">
                              <label for="basicInput">Deskripsi produk</label>
                              <textarea id="editor1" name="isi"><?php echo set_value('isi'); ?></textarea> 
                              <?php echo form_error('isi'); ?>
                            </fieldset>
                          </div>
                          <div class="col-12">
                            <label>Gambar produk</label>
                            <p class="text-danger"><i>*upload gambar secara bersamaan, max 5 gambar</i></p>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                              </div>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar[]" multiple="multiple"> 
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                              </div>
                            </div>
                            <?php 
                            if(!empty($error)){
                              echo '<span class="text-danger">'.$error.'</span>';
                            } ?>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="text-right">
                        <button type="submit" value='Upload' name='upload' class="btn btn-primary mr-1">Simpan
                        </button>
                        <a href="<?php echo base_url('admin/Produk') ?>" class="btn btn-warning">Batal</a>
                      </div>
                      <br>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

