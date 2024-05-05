<?php
    class Barang_Model extends CI_Model {
        
        private $_table = 'barang';

        // function GET ALL
        public function get_all_barang() {
            $query = $this->db->get($this->_table);
            return $query->result();
        }

        // function GET ONE -> Parameter 'IdBarang'
        public function get_barang($id_barang) {
            if (!$id_barang) {
                return;
            }

            $query = $this->db->get_where($this->_table, ['IdBarang' => $id_barang]);
            return $query->result();
        }

        // function INSERT -> Parameter Object
        public function insert_barang($data_barang) {
            $query = $this->db->insert($this->_table, $data_barang);
        }

        // function UPDATE -> Parameter Object
        public function update_barang($data_barang) {
            if (!isset($data_barang['IdBarang'])) {
                return;
            }

            $query = $this->db->update($this->_table, $data_barang, ['IdBarang', $data_barang['IdBarang']]);
        }

        // function DELETE -> Parameter 'IdBarang'
        public function delete_barang($id_barang) {
            if (!$id_barang) {
                return;
            }

            return $this->db->delete($this->_table, ['IdBarang', $id_barang]);
        }

        public function get_total_barang() {
            $query = $this->db->query(" 
            SELECT SUM(A.Stok) as TotalBarang
            FROM barang A
            ");
            $data = $query->result();
            return $data[0]->TotalBarang;
        }

        public function get_laba_rugi(){
            $query = $this->db->query("
            SELECT A.IdBarang, A.NamaBarang, A.Stok, B.TotalTerjual, B.TotalPendapatan, C.TotalPembelian,
                    (TotalPendapatan - TotalPembelian) AS Laba
            FROM barang A 
            LEFT JOIN (
                SELECT B.IdBarang, SUM(B.JumlahPenjualan) AS TotalTerjual, 
                SUM(B.JumlahPenjualan * B.HargaJual) AS TotalPendapatan
                FROM penjualan B
                GROUP BY B.IdBarang
            ) B ON A.IdBarang = B.IdBarang
            LEFT JOIN(
                SELECT C.IdBarang,
                SUM(C.JumlahPembelian * C.HargaBeli) AS TotalPembelian
                FROM pembelian C
                GROUP BY C.IdBarang
            ) C ON A.IdBarang = C.IdBarang
            ");
            return $query->result_array();
            }
    }
?>