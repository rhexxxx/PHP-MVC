<?php 
class Mahasiswa_model{
    private $table = 'siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    public function getSiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id =:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO siswa
                 VALUES
                 ('0', :nama, :kelas, :absen, :nis, :jurusan, '')";
    
        $this->db->query($query);
        $this->db->bind(':nama', $data["nama"]);
        $this->db->bind(':kelas', $data["kelas"]);
        $this->db->bind(':absen', $data["absen"]);
        $this->db->bind(':nis', $data["nis"]);
        $this->db->bind(':jurusan', $data["jurusan"]);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM siswa WHERE id = :id";

        $this->db->query($query);
        $this->db->bind(':id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE siswa SET
                    nama = :nama,
                    kelas = :kelas,
                    absen = :absen,
                    nis = :nis,
                    jurusan = :jurusan
                    WHERE id = :id";
    
        $this->db->query($query);
        $this->db->bind(':nama', $data["nama"]);
        $this->db->bind(':kelas', $data["kelas"]);
        $this->db->bind(':absen', $data["absen"]);
        $this->db->bind(':nis', $data["nis"]);
        $this->db->bind(':jurusan', $data["jurusan"]);
        $this->db->bind(':id',$data['id']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }

    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM siswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }
    
}    