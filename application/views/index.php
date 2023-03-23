<?php include('header.php'); ?>
<!-- Modal -->
<div id="demo_modal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="text-align: center;padding: 140px;color: white;cursor: pointer;">  
   <h1 data-dismiss="modal">Start demo</h1>
  </div>
</div>
<!--market status -->

<div class="container">
<center style="margin-top: 50px;margin-bottom: 50px">
<?php if(!$todayearns==null){ ?>  
<h2><?php echo "Earnings on ".$dvalue; ?></h2> 
</center>         
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
<?php } 
else{
  echo "<h2>No earnings calls yet</h2>";
}
 ?>
</div>
 <script type="text/javascript">
  function linkfunction(symbol) {
   window.location = "<?php echo base_url('stocks/details/"+symbol+"'); ?>";
 }
 </script>
<?php include('footer.php'); ?>
