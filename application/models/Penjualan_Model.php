<?php
    class Penjualan_Model extends CI_Model {
        
        private $_table = 'penjualan';

        // function GET ALL
        public function get_all_penjualan() {
            $query = $this->db->get($this->_table);
            return $query->result();
        }

        // function GET ONE -> Parameter 'IdPenjualan'
        public function get_penjualan($id_penjualan) {
            if (!$id_penjualan) {
                return;
            }

            $query = $this->db->get_where($this->_table, ['IdPenjualan' => $id_penjualan]);
            return $query->result();
        }

        // function INSERT -> Parameter Object
        public function insert_penjualan($data_penjualan) {
            $query = $this->db->insert($this->_table, $data_penjualan);
        }

        // function UPDATE -> Parameter Object
        public function update_penjualan($data_penjualan) {
            if (!isset($data_penjualan['IdPenjualan'])) {
                return;
            }

            $query = $this->db->update($this->_table, $data_penjualan, ['IdPenjualan', $data_penjualan['IdPenjualan']]);
        }

        // function DELETE -> Parameter 'IdPenjualan'
        public function delete_penjualan($id_penjualan) {
            if (!$id_penjualan) {
                return;
            }

            return $this->db->delete($this->_table, ['IdPenjualan', $id_penjualan]);
        }

        public function get_laba_rugi(){
        $query = $this->db->query("
        SELECT A.TotalPenjualan, A.TotalPendapatan, B.TotalPembelian, (A.Totalpendapatan - B.TotalPembelian) AS LabaRugi
        FROM(
            SELECT 1 AS ID, SUM(A.JumlahPenjualan) AS TotalPenjualan, 
            SUM(A.JumlahPenjualan * A.HargaJual) AS TotalPendapatan
            FROM penjualan A
        ) A
        LEFT JOIN(
            SELECT 1 AS ID, SUM(B.JumlahPembelian * B.HargaBeli) AS TotalPembelian
            FROM pembelian B
        ) B ON A.ID = B.ID
        ");
        return $query->result_array();
        }
    }
?>