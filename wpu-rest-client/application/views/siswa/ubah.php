<div class="container">

	<div class="row mt-3">
		<div class="col-md-6">

		<div class="card">
			<div class="card-header">
				Form Ubah Data Siswa
			</div>
			<div class="card-body">
				<form action="" method="post">
					<input type="hidden" name="id" value="<?= $siswa['id']; ?>">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa['nama']; ?>">
						<small class="form-text text-danger"><?= form_error('nama'); ?></small>
					</div>
					<div class="form-group">
						<label for="nis">NIS</label>
						<input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis']; ?>">
						<small class="form-text text-danger"><?= form_error('nis'); ?></small>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" name="email" value="<?= $siswa['email']; ?>">
						<small class="form-text text-danger"><?= form_error('email'); ?></small>
					</div>
					<div class="form-group">
						<label for="jurusan">Jurusan</label>
						<select class="form-control" id="jurusan" name="jurusan">
							<?php foreach( $jurusan as $j ) : ?>
								<?php if( $j == $siswa['jurusan'] ) : ?>
									<option value="<?= $j; ?>" selected><?= $j; ?></option>
								<?php else : ?>
									<option value="<?= $j; ?>"><?= $j; ?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>
					<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
				</form>
			</div>
		</div>

		</div>
	</div>

</div>