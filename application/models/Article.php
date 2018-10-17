<?php class Article extends CI_Model{

    public function __construct(){

    }

    public function paymentDataShow($table){
        $sql = "select t1.*, t2.name as u_name from $table as t1 left join users as t2 on t1.user_id = t2.id";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    public function showAllData($table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by('id');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getDataByIdRow($table, $col_name, $id){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($col_name, $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function updateData($table, $col_name, $id, $data){
        $this->db->where($col_name, $id);
        $this->db->update($table, $data);
    }

    public function deleteDataById($table, $col_name, $id){
        $this->db->where($col_name, $id);
        $this->db->delete($table);
    }


}