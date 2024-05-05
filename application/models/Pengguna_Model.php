<?php
    class Pengguna_Model extends CI_Model {
        
        private $_table = 'pengguna';

        // function GET ALL
        public function get_all_pengguna() {
            $query = $this->db->get($this->_table);
            return $query->result();
        }

        // function GET ONE -> Parameter 'IdPengguna'
        public function get_pengguna($id_pengguna) {
            if (!$id_pengguna) {
                return;
            }

            $query = $this->db->get_where($this->_table, ['IdPengguna' => $id_pengguna]);
            return $query->result();
        }

        // function INSERT -> Parameter Object
        public function insert_pengguna($data_pengguna) {
            $query = $this->db->insert($this->_table, $data_pengguna);
        }

        // function UPDATE -> Parameter Object
        public function update_pengguna($data_pengguna) {
            if (!isset($data_pengguna['IdPengguna'])) {
                return;
            }

            $query = $this->db->update($this->_table, $data_pengguna, ['IdPengguna', $data_pengguna['IdPengguna']]);
        }

        // function DELETE -> Parameter 'IdPengguna'
        public function delete_pengguna($id_pengguna) {
            if (!$id_pengguna) {
                return;
            }

            return $this->db->delete($this->_table, ['IdPengguna', $id_pengguna]);
        }
    }
?>