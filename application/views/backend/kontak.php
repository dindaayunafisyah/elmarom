<div class="main-panel">
  <div class="main-content">
    <div class="content-wrapper">
      <div class="container-fluid"><div class="row">
      </div>
      <!--Basic Table Starts-->
      <section id="simple-table">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <div class="card-title-wrap bar-success">
                  <h4 class="card-title">Kontak</h4>
                </div>
              </div>
              <div class="card-body">
                <div class="card-block">
                 <table id="example" class="table table-striped" cellspacing="0" style="width:100%">
                  <thead>
                    <tr>
                      <th> No </th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th>Status</th>
                      <th style="text-align: center;"> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($message as $pesan) {
                      ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $pesan->nama; ?></td>
                        <td><?php echo $pesan->email; ?></td>
                        <td><?php echo word_limiter($pesan->subject,10); ?></td>
                        <td><?php echo word_limiter($pesan->message,10); ?></td>
                        <?php if ($pesan->status == 1) : ?>
                          <td><button class="btn btn-outline-warning">Belum dibaca</button></td>
                        <?php else : ?>
                          <td><button class="btn btn-outline-success">Sudah dibaca</button></td>
                        <?php endif; ?>
                        <td style="text-align:center;">
                          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Editpesan<?= $pesan->id ?>"><i class="fa fa-eye"></i>
                          </button>
                          <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Hapuspesan<?= $pesan->id ?>"><i class="fa fa-trash"></i>
                          </button>
                          </a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Basic Table Ends-->
    </div>
  </div>
</div>
</div>