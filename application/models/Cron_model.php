<?php 
class Cron_model extends CI_Model {

public function crons($data){

$datacount=array();
foreach ($data as $value) {
array_push($datacount,$value);
}
$chunk=array_chunk($datacount, 4);
$count=sizeof($chunk); 
for($i=0;$i<$count;$i++){
$this->db->where('symbol',$data['symbol'.$i]);
$query = $this->db->get('crons');
if ($query->num_rows() > 0){
//codeRemoved
//codeRemoved
//codeRemoved
//codeRemoved
//codeRemoved
//codeRemoved
}
else{
$dataput = array(
'symbol' => $data["symbol".$i],
'company' => $data["name".$i],
'ect' => "before market",
'eps_estimate' => $data[$i]
);
$this->db->insert('crons', $dataput);	
}
} 
}

}
?>