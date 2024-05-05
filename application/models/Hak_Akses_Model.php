<?php
    class Hak_Akses_Model extends CI_Model {
        
        private $_table = 'hak_akses';

        // function GET ALL
        public function get_all_hak_akses() {
            $query = $this->db->get($this->_table);
            return $query->result();
        }

        // function GET ONE -> Parameter 'IdAkses'
        public function get_hak_akses($id_hak_akses) {
            if (!$id_hak_akses) {
                return;
            }

            $query = $this->db->get_where($this->_table, ['IdAkses' => $id_hak_akses]);
            return $query->result();
        }

        // function INSERT -> Parameter Object
        public function insert_hak_akses($data_hak_akses) {
            $query = $this->db->insert($this->_table, $data_hak_akses);
        }

        // function UPDATE -> Parameter Object
        public function update_hak_akses($data_hak_akses, $IdAkses) {
            //if (!isset($data_hak_akses['IdAkses'])) {
               //return;
            //}

            $this->db->set('NamaAkses', $data_hak_akses['NamaAkses']);
            $this->db->set('Keterangan', $data_hak_akses['Keterangan']);
            $this->db->where('IdAkses', $IdAkses);
            $this->db->update($this->_table);
        }

        // function DELETE -> Parameter 'IdAkses'
        public function delete_hak_akses($id_hak_akses) {
            if (!$id_hak_akses) {
                return;
            }

            $this->db->where('IdAkses',$id_hak_akses);
            $this->db->delete($this->_table);
        }
    }
?>