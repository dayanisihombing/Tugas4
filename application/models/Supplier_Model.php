<?php
    class Supplier_Model extends CI_Model {
        
        private $_table = 'supplier';

        // function GET ALL
        public function get_all_supplier() {
            $query = $this->db->get($this->_table);
            return $query->result();
        }

        // function GET ONE -> Parameter 'IdSupplier'
        public function get_supplier($id_supplier) {
            if (!$id_supplier) {
                return;
            }

            $query = $this->db->get_where($this->_table, ['IdSupplier' => $id_supplier]);
            return $query->result();
        }

        // function INSERT -> Parameter Object
        public function insert_supplier($data_supplier) {
            $query = $this->db->insert($this->_table, $data_supplier);
        }

        // function UPDATE -> Parameter Object
        public function update_supplier($data_supplier) {
            if (!isset($data_supplier['IdSupplier'])) {
                return;
            }

            $query = $this->db->update($this->_table, $data_supplier, ['IdSupplier', $data_supplier['IdSupplier']]);
        }

        // function DELETE -> Parameter 'IdSupplier'
        public function delete_supplier($id_supplier) {
            if (!$id_supplier) {
                return;
            }

            return $this->db->delete($this->_table, ['IdSupplier', $id_supplier]);
        }
    }
?>