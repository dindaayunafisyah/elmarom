  <?php if ($this->uri->segment(2) == 'Produk' && $this->uri->segment(3) == '') : ?> 
  <!-- Modal Hapus-->
  <?php foreach ($produk as $pro) : ?>
    <div class="modal fade" id="Modalhapus<?php echo $pro->id_produk; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/Produk/hapus_produk' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="id" value="<?php echo $pro->id_produk; ?>" />
              Apakah anda yakin ingin menghapus <strong><?php echo $pro->nama_produk; ?> ?</strong>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php if ($this->uri->segment(2) == 'Kategori' && $this->uri->segment(3) == '') : ?> 
  <!-- Modal Tambah-->
  <div class="modal fade" id="Tambahkategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'admin/Kategori/tambah' ?>" method="post">
          <div class="modal-body">
            <label>Nama kategori</label>
            <input type="text" class="form-control" name="kategori"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Edit-->
  <?php foreach ($kategori as $k) : ?>
  <div class="modal fade" id="Editkategori<?= $k->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'admin/Kategori/edit' ?>" method="post">
          <div class="modal-body">
            <label>Nama kategori</label>
            <input type="hidden" value="<?= $k->id_kategori?>" name="id" />
            <input type="text" class="form-control" name="kategori" value="<?= $k->kategori ?>" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Hapus -->
  <div class="modal fade" id="Hapuskategori<?php echo $k->id_kategori; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'admin/Kategori/hapus' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="id" value="<?php echo $k->id_kategori; ?>" />
            Apakah anda yakin ingin menghapus <strong><?php echo $k->kategori; ?> ?</strong>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>

  <?php if ($this->uri->segment(2) == 'Kontak' && $this->uri->segment(3) == '') : ?> 
  <!-- Modal Tambah-->
  <?php foreach ($message as $n) : ?>
  <div class="modal fade" id="Editpesan<?= $n->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'admin/Kontak/sudah_dibaca' ?>" method="post">
          <div class="modal-body">
            <label>Nama</label>
            <input type="hidden" value="<?= $n->id ?>" name="id" />
            <input type="text" class="form-control" value="<?= $n->nama ?>" readonly />
          </div>
          <div class="modal-body">
            <label>Email</label>
            <input type="text" class="form-control" value="<?= $n->email ?>" readonly />
          </div>
          <div class="modal-body">
            <label>Subject</label>
            <textarea class="form-control" readonly><?= $n->subject ?></textarea>
          </div>
          <div class="modal-body">
            <label>Message</label>
            <textarea class="form-control" readonly><?= $n->message ?></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <?php if ($n->status == 1) : ?>
            <button type="submit" class="btn btn-primary">Tandai dibaca</button>
            <?php endif; ?>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Hapus -->
  <div class="modal fade" id="Hapuspesan<?php echo $n->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'admin/Kontak/hapus_pesan' ?>" method="post">
          <div class="modal-body">
            <input type="hidden" name="id" value="<?php echo $n->id; ?>" />
            Apakah anda yakin ingin menghapus message dari <strong><?php echo $n->nama; ?> ?</strong>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>