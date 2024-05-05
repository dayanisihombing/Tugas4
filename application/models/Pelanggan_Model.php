<?php
    class Pelanggan_Model extends CI_Model {
        
        private $_table = 'pelanggan';

        // function GET ALL
        public function get_all_pelanggan() {
            $query = $this->db->get($this->_table);
            return $query->result();
        }

        // function GET ONE -> Parameter 'IdPelanggan'
        public function get_pelanggan($id_pelanggan) {
            if (!$id_pelanggan) {
                return;
            }

            $query = $this->db->get_where($this->_table, ['IdPelanggan' => $id_pelanggan]);
            return $query->result();
        }

        // function INSERT -> Parameter Object
        public function insert_pelanggan($data_pelanggan) {
            $query = $this->db->insert($this->_table, $data_pelanggan);
        }

        // function UPDATE -> Parameter Object
        public function update_pelanggan($data_pelanggan) {
            if (!isset($data_pelanggan['IdPelanggan'])) {
                return;
            }

            $query = $this->db->update($this->_table, $data_pelanggan, ['IdPelanggan', $data_pelanggan['IdPelanggan']]);
        }

        // function DELETE -> Parameter 'IdPelanggan'
        public function delete_pelanggan($id_pelanggan) {
            if (!$id_pelanggan) {
                return;
            }

            return $this->db->delete($this->_table, ['IdPelanggan', $id_pelanggan]);
        }
    }
?>