<div class="container">

	<div class="row mt-3">
		<div class="col-md-6">

		<div class="card">
			<div class="card-header">
				Form Tambah Data Siswa
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama">
						<small class="form-text text-danger"><?= form_error('nama'); ?></small>
					</div>
					<div class="form-group">
						<label for="nis">NIS</label>
						<input type="text" class="form-control" id="nis" name="nis">
						<small class="form-text text-danger"><?= form_error('nis'); ?></small>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" name="email">
						<small class="form-text text-danger"><?= form_error('email'); ?></small>
					</div>
					<div class="form-group">
						<label for="jurusan">Jurusan</label>
						<select class="form-control" id="jurusan" name="jurusan">
							<option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
							<option value="Teknik Komputer dan Jaringan">Teknik Komputer Jaringan</option>
							<option value="Multimedia">Multimedia</option>
						</select>
					</div>
					<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
				</form>
			</div>
		</div>

		</div>
	</div>

</div>