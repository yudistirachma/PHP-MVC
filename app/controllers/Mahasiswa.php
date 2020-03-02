<?php 

class Mahasiswa extends Controller{
	public function index(){
		$data['judul'] = 'Daftar Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
		$this->view('templates/header', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}

	public function detail($id){
		$data['judul'] = 'Detail Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
		$this->view('templates/header', $data);
		$this->view('mahasiswa/detail', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ){
			Flasher::setFlash('Berhasil', 'Di Tambahkan', 'success');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		}else {
			Flasher::setFlash('Gagal', 'Di Tambahkan', 'danger');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		}
	}

	public function hapus($id){
		if( $this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ){
			Flasher::setFlash('Berhasil', 'Di Hapus', 'success');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		}else {
			Flasher::setFlash('Gagal', 'Di Hapus', 'danger');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		}
	}

	public function getubah(){
		echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
		// echo $_POST['id'];
	}

	public function ubah(){
		if( $this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ){
			Flasher::setFlash('Berhasil', 'Di Ubah', 'success');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		}else {
			Flasher::setFlash('Gagal', 'Di Ubah', 'danger');
			header('location: ' . BASEURL . '/mahasiswa');
			exit;
		}
	}

	public function cari(){
		$data['judul'] = 'Daftar Mahasiswa';
		$data['mhs'] = $this->model('Mahasiswa_model')->cariMahasiswa();
		$this->view('templates/header', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}

}

 ?>