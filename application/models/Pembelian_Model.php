<?php
    class Pembelian_Model extends CI_Model {
        
        private $_table = 'pembelian';

        // function GET ALL
        public function get_all_pembelian() {
            $query = $this->db->get($this->_table);
            return $query->result();
        }

        // function GET ONE -> Parameter 'IdPembelian'
        public function get_pembelian($id_pembelian) {
            if (!$id_pembelian) {
                return;
            }

            $query = $this->db->get_where($this->_table, ['IdPembelian' => $id_pembelian]);
            return $query->result();
        }

        // function INSERT -> Parameter Object
        public function insert_pembelian($data_pembelian) {
            $query = $this->db->insert($this->_table, $data_pembelian);
        }

        // function UPDATE -> Parameter Object
        public function update_pembelian($data_pembelian) {
            if (!isset($data_pembelian['IdPembelian'])) {
                return;
            }

            $query = $this->db->update($this->_table, $data_pembelian, ['IdPembelian', $data_pembelian['IdPembelian']]);
        }

        // function DELETE -> Parameter 'IdPembelian'
        public function delete_pembelian($id_pembelian) {
            if (!$id_pembelian) {
                return;
            }

            return $this->db->delete($this->_table, ['IdPembelian', $id_pembelian]);
        }
    }
?>