<?php include('header.php'); ?>
<div class="container">
<?php if($uri==null){ ?>
<center style="margin-top: 50px;margin-bottom: 50px">
<h2>Please provide valid symbol</h2>
</center> 
<?php }
else{
$name=array();
foreach ($quote as $key => $value) { 
 array_push($name,$value);
}
$symbol=$name[0];
$earning=$name[3];
?>
<center style="margin-top: 50px;margin-bottom: 50px"> 
<h2><?php echo "Earnings on ".$dvalue; ?></h2> 
</center>    
<h2>Pre market</h2>
  <table class="table table-hover" style="margin-bottom:40px;margin-top: 15px;">
    <thead>
<th>Symbol</th>
<th>Company</th>
<th>Earnings Call Time</th>
<th>EPS Estimate</th>
    </thead>
    <tbody>
<tr style="background:#cbeef6;">
<?php for($i=0;$i<4;$i++) { ?>
<td><?= $name[$i]; ?></td>
<?php } ?>
</tr>
    </tbody>
  </table>
<br>
<br>
<div class="split">

<br>
<h4>Earnings Call:</h4>
Expected Pre-Market on <?php echo $dvalue; ?>
<br>
Expected EPS: <?= $earning; ?>
<br><br>

<a href="https://www.nasdaq.com/symbol/<?= $symbol ?>" target="_blank" class="btn btn-primary" style="background-color:#31c7e8;border-radius:5px;width: 15%">listen live stock</a>
<br><br>


<div class="tradingview-widget-container" style="float:right;margin-top: 55px">
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.MediumWidget(
  {
  "container_id": "tv-medium-widget",
  "symbols": [
    [
      "<?php echo $name[1]; ?>",
      "<?php echo $name[0]; ?>"
    ]
  ],
  "greyText": "Quotes by",
  "gridLineColor": "#e9e9ea",
  "fontColor": "#83888D",
  "underLineColor": "#dbeffb",
  "trendLineColor": "#4bafe9",
  "width": "500",
  "height": "400px",
  "locale": "en"
}
  );
  </script>
  <center>
  <div class="peratio">
 <p style="font-size:12px;">52 week range &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; P/E</p>
 <?= $quote["complwrange"]; ?> -  <?= $quote["comphwrange"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $quote["compperatio"]; ?>
 </div>
 </center>
</div>
<h5>Analyst Ratings</h5><br>
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container" style="margin-bottom: 50px;">
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
  {
  "width": "500",
  "height": "400",
  "locale": "en",
  "symbol": "<?php echo $name[0]; ?>",
  "interval": "4h"
}
  </script>
</div>
<!-- TradingView Widget END -->
<br><br>
<br>
<!-- news -->
<div class="news" style="float: right;width: 45%;">
<br><th><h4><b>News</b></h4></th>
<table class="table">

  <tbody>
 <?php foreach ($news as $key) { ?> 
    <tr>
      <td><b><a href="<?= $key['url']; ?>"><?= $key['headline']; ?></a></b><br><?php 
      $date = substr($key['datetime'], 0, -15);
      echo $date = date('F d, Y ', strtotime($date));
       ?></td> 
      </tr>  
    <?php } ?>
  </tbody>
</table>
</div>

<br>

<div class="stock_target">
<th><h4><b>Stock Price Target</b></h4></th>
<table class="table" style="width: 50%;">

  <tbody>
    <tr><td>High<p style="float: right;"><?= $quote["comphigh"]; ?></p></td></tr>
    <tr><td>Median<p style="float: right;"><?= $quote["compmedian"]; ?></p></td></tr>
    <tr><td>Low<p style="float: right;"><?= $quote["complow"]; ?></p></td></tr>
    <tr><td>Average<p style="float: right;"><?= $quote["compaverage"]; ?></p></td> </tr>
    <tr><td>Current Price<p style="float: right;"><?= $quote["complprice"]; ?></p></td></tr>  
  </tbody>
</table>
</div>
<br><br>
<h2>Pre Market</h2>
  <table class="table table-striped table-hover" style="margin-bottom:40px;margin-top: 15px;">
    <thead>
<tr>
<th>Symbol</th>
<th>Company</th>
<th>Earnings Call Time</th>
<th>EPS Estimate</th>
</tr>
    </thead>
    <tbody>
<?php $count=sizeof($todayearns->bto); ?>              
<?php for($i=0;$i<$count;$i++) { ?> 
<tr onclick="linkfunction('<?= $todayearns->bto[$i]->symbol; ?>')">     
<a href="#">  
<td><?= $todayearns->bto[$i]->symbol; ?></td>
<td><?= $todayearns->bto[$i]->quote->companyName; ?></td>
<td><?php echo "Before market"; ?></td>
<td><?= $todayearns->bto[$i]->estimatedEPS; ?></td>
</a>
</tr>
<?php } ?>
    </tbody>
  </table>


<h2>After Hours</h2>
  <table class="table table-striped table-hover" style="margin-bottom:40px;margin-top: 15px;">
    <thead>
<tr>
<th>Symbol</th>
<th>Company</th>
<th>Earnings Call Time</th>
<th>EPS Estimate</th>
</tr>
    </thead>
    <tbody>
<?php $count=sizeof($todayearns->amc); ?>              
<?php for($i=0;$i<$count;$i++) { ?> 
<tr onclick="linkfunction('<?= $todayearns->amc[$i]->symbol; ?>')">     
<a href="#">  
<td><?= $todayearns->amc[$i]->symbol; ?></td>
<td><?= $todayearns->amc[$i]->quote->companyName; ?></td>
<td><?php echo "After market"; ?></td>
<td><?= $todayearns->amc[$i]->estimatedEPS; ?></td>
</a>
</tr>
<?php } ?>
    </tbody>
  </table>
</div>
 <script type="text/javascript">
  function linkfunction(symbol) {
   window.location = "<?php echo base_url('stocks/details/"+symbol+"'); ?>";
 }
 </script>
<?php } ?>
</div>
<?php include('footer.php'); ?>