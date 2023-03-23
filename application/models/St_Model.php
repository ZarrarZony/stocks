<?php
class St_Model extends CI_Model{

public function crons(){
$query = $this->db->get('crons');
return $result = $query->result_array();
}

}

?>