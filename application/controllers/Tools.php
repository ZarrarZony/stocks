<?php
class Tools extends CI_Controller {
private $api_url="https://api.iextrading.com/1.0/";	
   function __construct()
    {
        parent::__construct();
        $this->load->model('Cron_model');
    }


public function message(){
	echo "hello world";
}

public function getcron()
{
	$data=$this->collector();

	if($data==null){
	echo $response="data not available";
	}
	else{
	$this->Cron_model->crons($data);
	}   
	
}





	public function collector(){
		$pos=3;
		$quote=$this->quote();
		$eps=$this->earnings();
		if($quote==null || $eps==null){
			$quote=null;
			return $quote;
		}else{
		$collector=array();
		foreach ($eps as $key=>$value) {
		array_splice($quote,$pos,0,$value);
		$pos=$pos+4;
		}
		return $quote;
	}
	}


	public function quote(){
	$symbol=array('AAPL', 'GOOGL','MSFT');
	$inc=0;
	foreach ($symbol as $key) {
	$quote_url=$this->api_url."stock/".$key."/quote";
	$ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $quote_url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$json = curl_exec($ch);
	if (curl_errno($ch)) {
    $json = null;
    } else {
    curl_close($ch);
    }
    if (!$json) {
    $data_quote = null;
    break;   
    }else{
	$obj = json_decode($json);
	$compname=$obj->companyName;
	$compsymbol=$obj->symbol;
	$data_quote["symbol".$inc]=$compsymbol;
	$data_quote["name".$inc]=$compname;
	$data_quote["market".$inc]="after market";
   }
   $inc++;
	}
	return $data_quote;
}


	public function earnings(){
	$symbol=array('AAPL', 'GOOGL','MSFT');
	foreach ($symbol as $key) {
	$earning_url=$this->api_url."stock/".$key."/earnings";
	$ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $earning_url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$json = curl_exec($ch);
    curl_close($ch);
    if (!$json) {
    $data_earn = null;
    break;   
    }else{
		$obj = json_decode($json);
		$earobj=$obj->earnings[0]->estimatedEPS;
		$data_earn[$key."eps"]=$earobj;
	}
	}
	return $data_earn;

}


}