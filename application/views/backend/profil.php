<div class="main-panel">
  <div class="main-content">
    <div class="content-wrapper">
      <div class="container-fluid"><!-- User Profile Starts-->
        <!--Basic User Details Starts-->
        <section id="user-profile">
          <div class="row">
            <div class="col-12">
              <div class="card profile-with-cover">
                <div class="card-img-top img-fluid bg-cover height-300" style="background: url('../../backend/app-assets/img/photos/11.jpg') 50%;">
                </div>
                <div class="media profil-cover-details row">
                  <div class="col-5 mr-auto">
                    <div class="align-self-start halfway-fab pl-3 pt-2">
                      <div class="text-left">
                        <?php if ($user['level'] == 1) : ?>
                          <h3 class="card-title white">Welcome Admin </h3>
                        <?php else : ?>
                          <h3 class="card-title white">Welcome User </h3>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="profile-cover-buttons">
                  <div class="media-body halfway-fab align-self-end">
                    <div class="text-right d-none d-sm-none d-md-none d-lg-block">
                      <button type="button" data-toggle="modal" data-target="#Modaluser" class="btn btn-primary mr-2"><i class="fa fa-pencil"></i> Edit profil</button>
                      <button type="button" data-toggle="modal" data-target="#Modalpass" class="btn btn-success mr-3"><i class="fa fa-repeat"></i> Ganti password</button>
                    </div>
                    <div class="text-right d-block d-sm-block d-md-block d-lg-none">
                      <button type="button" data-toggle="modal" data-target="#Modaluser" class="btn btn-primary mr-2"><i class="fa fa-pencil"></i>
                      </button>
                      <button type="button" data-toggle="modal" data-target="#Modalpass" class="btn btn-success mr-3"><i class="fa fa-repeat"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--Basic User Details Ends-->
   
        <section id="user-area">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="card-block">
                    <div class="align-self-center halfway-fab text-center">
                        <a class="profile-image">
                          <img src="<?php echo base_url()  . 'backend/imgUser/' . $user['gambar']; ?>" class="rounded-circle img-border gradient-summer width-100" alt="Card image">
                        </a>
                      </div>
                      <div class="text-center">
                        <span class="font-medium-2 text-uppercase"><?php echo $user['nama']; ?></span>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="card">
                            <div class="card-body">
                              <div class="card-block">
                                <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <ul class="no-list-style">
                                      <li class="mb-2">
                                        <span class="primary text-bold-500"><a><i class="ft-user font-small-3"></i> Nama Lengkap</a></span>
                                        <span class="line-height-2 display-block overflow-hidden text-capitalize">
                                          <?php echo $user['nama']; ?>
                                        </span>
                                      </li>
                                      <li class="mb-2">
                                        <span class="primary text-bold-500"><a><i class="ft-mail font-small-3"></i> Email </a>
                                        </span>
                                        <span class="line-height-2 display-block overflow-hidden"><?php echo $user['email']; ?>
                                      </span>
                                    </li>
                                  </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                  <ul class="no-list-style">
                                    <li class="mb-2">
                                      <span class="primary text-bold-500"><a><i class="ft-users font-small-3"></i> Level</a>
                                      </span>
                                      <?php if($user['level'] == 1) : ?>
                                        <span class="line-height-2 display-block overflow-hidden">Admin</span>
                                        <?php else : ?>
                                          <span class="line-height-2 display-block overflow-hidden">User</span>
                                        <?php endif; ?>
                                      </li>
                                      <li class="mb-2">
                                        <span class="primary text-bold-500"><a><i class="ft-calendar font-small-3"></i> Account since </a></span>
                                        <span class="line-height-2 display-block overflow-hidden">
                                         <?php echo longdate_indo($user['date']);?> 
                                       </span>
                                     </li>
                                   </ul>
                                 </div>
                               </div>

                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </section>
             <!--User Profile Starts-->
           </div>
         </div>
       </div>
     </section>
   </div>
</div>

<!-- Modal Edit Profil -->
<div class="modal fade" id="Modaluser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit user profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
           <div class="col-md-12">
          <form action="<?php echo base_url('admin/Dashboard/editUser')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama lengkap</label>
              <input type="hidden" class="form-control" value="<?php echo $user['id']; ?>" name="id">
               <input type="hidden" class="form-control" value="<?php echo $user['gambar']; ?>" name="gambar_lama">
              <input type="text" class="form-control" value="<?php echo $user['nama']; ?>" name="nama">
              <?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" value="<?php echo $user['email']; ?>" name="email">
              <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Level</label>
              <select class="form-control" id="basicSelect" name="level">
                  <option value="1">Admin</option>
                  <option value="2">User</option>
                </select>
              </div>
              <div class="form-group">
                <label>Gambar</label>
                <br>
                <img src="<?php echo base_url()  . 'backend/imgUser/' . $user['gambar']; ?>" class="rounded-circle img-border gradient-summer width-100" alt="Card image">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="gambar" id="inputGroupFile01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End -->
<!-- Modal Ganti password -->
<div class="modal fade" id="Modalpass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ganti password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
           <div class="col-md-12">
          <form action="<?php echo base_url('admin/Dashboard/ganti_password')?>" method="post">
            <div class="form-group">
              <label>Password lama</label>
              <input type="hidden" class="form-control" value="<?php echo $user['id']; ?>" name="id">
              <input type="password" class="form-control" name="password_lama" placeholder="Password Baru">
              <?php echo form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Password baru</label>
              <input type="password" class="form-control" name="password_baru" placeholder="Password Baru">
              <?php echo form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End -->