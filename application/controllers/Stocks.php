<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('allow_url_fopen',1);
class Stocks extends CI_Controller {
	private $api_url="https://api.iextrading.com/1.0/";

public function __construct(){
	parent::__construct();
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->model('St_Model');
}
	public function index(){
	$this->output->cache(30);
	$todayearnings=$this->todayearnings();	
	if($todayearnings==null){
	$data['todayearns']=null;
	$this->load->view('index',$data);
	}else{
	$data['todayearns']=$todayearnings;
	$data['dvalue']=$this->dfetch();
	$this->load->view('index',$data,['cache' => 60]);
    }
	}

	public function details(){
    $symbol=$this->uri->segment(3);
    if(empty($symbol)){
    $data['uri']=null;
	return $this->load->view('details',$data);
    }
    $symbol_data=$this->symcall($this->uri->segment(3));
	if($symbol_data=="Unknown symbol"){
	$data['uri']=null;
	$this->load->view('details',$data);
	}
	else{	
	$this->output->cache(30);	
	$data['uri']="filled";  
	$data['quote']=$symbol_data;  
	$data['news']=$this->news($this->uri->segment(3));
	$data['dvalue']=$this->dfetch();
	$data['todayearns']=$this->todayearnings();
	$this->load->view('details',$data);
    }
	}

	public function symcall($symbol){
	$quote_url=$this->api_url."stock/".$symbol."/quote";
	$ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $quote_url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$json = curl_exec($ch);
	if (curl_errno($ch)) {
    $json = null;
    } else {
    curl_close($ch);
    }
    if ($json=="Unknown symbol" || $json=="Not Found") {
    return $data_quote = "Unknown symbol";  
    }else{
	$obj = json_decode($json);
	$compname=$obj->companyName;
	$compsymbol=$obj->symbol;
	$peratio=$obj->peRatio;
	$hwrange=$obj->week52High;
	$lwrange=$obj->week52Low;
	$high=$obj->high;
	$low=$obj->low;
	$lprice=$obj->latestPrice;
	$open=$obj->open;
	$close=$obj->close;
	$data_quote["compsymbol"]=$compsymbol;
	$data_quote["compname"]=$compname;
	$data_quote["compmarket"]="before market";
	$data_quote["compperatio"]=$peratio;
	$data_quote["comphwrange"]=$hwrange;
	$data_quote["complwrange"]=$lwrange;
	$data_quote["comphigh"]=$high;
	$data_quote["complow"]=$low;
	$data_quote["complprice"]=$lprice;
	$data_quote["compopen"]=$open;
	$data_quote["compclose"]=$close;
	$data_quote["compaverage"]=($high+$low+$close+$open)/4;
	$data_quote["compmedian"]=($high+$low)/2;

   	$earning_url=$this->api_url."stock/".$symbol."/earnings";
	$ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $earning_url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$json = curl_exec($ch);
    curl_close($ch);
    if (!$json) {
    $data_earn = null;   
    }else{
		$obj = json_decode($json);
		$earobj=$obj->earnings[0]->estimatedEPS;
		$data_earn[$symbol."eps"]=$earobj;
	}

		$pos=3;
		if($data_quote==null || $data_earn==null){
			$quote=null;
			return $data_quote['quote'];
		}else{
		array_splice($data_quote,$pos,0,$data_earn);
		return $data_quote;
	}}
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
		$pos=$pos+7;
		}
		return $quote;
	}
	}

	public function quote(){
	$symbol=array('AAPL', 'GOOGL','MSFT');
	$i=0;
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
	$peratio=$obj->peRatio;
	$hwrange=$obj->week52High;
	$lwrange=$obj->week52Low;
	$data_quote[$key."symbol"]=$compsymbol;
	$data_quote[$key."name"]=$compname;
	$data_quote[$key."market"]="after market";
	$data_quote["peratio".$i]=$peratio;
	$data_quote["hwrange".$i]=$hwrange;
	$data_quote["lwrange".$i]=$lwrange;
	$i++;
   }
	}
	return $data_quote;
}


	public function todayearnings(){

	$earning_url=$this->api_url."stock/market/today-earnings";
	$ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $earning_url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$json = curl_exec($ch);
    curl_close($ch);
    if (!$json) {
    $todayearns = null;   
    }else{
		$obj = json_decode($json);
		$todayearns=$obj;
	}
	return $todayearns;

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

public function news($symbol){
$news_url=$this->api_url."stock/".$symbol."/news/last/4";

$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $news_url);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$contents = curl_exec($ch);
if (curl_errno($ch)) {
  echo curl_error($ch);
  echo "\n<br />";
  $contents = '';
} else {
  curl_close($ch);
}

if (!is_string($contents) || !strlen($contents)) {
echo "Failed to get contents.";
$contents = '';
}

return $data=json_decode($contents,true);

}


public function search(){
$symbol=$this->input->post('search');
return redirect('stocks/details/'.$symbol);
}


public function thankyou(){
$name=$this->input->post('name');
$email=$this->input->post('email');
$subject=$this->input->post('subject');
$message=$this->input->post('message');	

$this->load->library('email');

$this->email->from($email,$name);
$this->email->to('');
$this->email->subject('ECT WEBSIT');
$this->email->message('
Name : '.$name.' 
Email : '.$email.'
Subject : '.$subject.'
Message : '.$message.'');

if($this->email->send()){
$data['sucess']="Your messag sent successfully <br> Thankyou for contacting us";
}else{
$data['fail']="Error Please try again latter";
}
$this->load->view('thankyou',$data);
}

public function dfetch(){
	$date=date('D').", ".date('M')." ".date('j');
	return $date;
}


public function contactus(){
	$this->load->view('contact');
}

public function devblog(){
	$this->load->view('devblog');
}
		
}
?>