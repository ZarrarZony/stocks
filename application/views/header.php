<!DOCTYPE html>
<html>
<head>
	<title>Stocks</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('assets/images/logo.png'); ?>" type="image">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/mystyle.css'); ?>">
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light primary-color ">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="<?= base_url('stocks/index'); ?>"><img src="<?= base_url('assets/images/logo.png'); ?>"></a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">


        <?php echo form_open('stocks/search',array('class'=>'form-inline mr-auto')); ?>
        <input class="form-control" name="search" type="search" placeholder="Search stocks like 'AAPL'" aria-label="Search" size="30px" style="margin-left: 20px;">
    </form>

        <!-- Links -->
        <ul class="navbar-nav my-2 my-lg-0 ml-auto">
            <li class="nav-item">
            <?php echo anchor('stocks/devblog', 'DEV BLOG',array('class'=>'nav-link')); ?>
            </li>
            <li class="nav-item">
                <?php echo anchor('stocks/contactus', 'CONTACT US',array('class'=>'nav-link')); ?>
               <!--  <a class="nav-link" href="check.php">CONTACT US</a> -->
            </li>
            <li class="nav-item nav-link linkex">FOLLOW US
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:;"><img src="<?= base_url('/assets/images/fb.png'); ?>"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:;"><img src="<?= base_url('/assets/images/st.png'); ?>"></a>
            </li>
           <li class="nav-item">
                <a class="nav-link" href="javascript:;"><img src="<?= base_url('/assets/images/tub.png'); ?>"></a>
            </li>

        </ul>
        <!-- Links -->

    </div>
    <!-- Collapsible content -->

</nav>
<section id="banner" style="text-align: center;background-color:#30c7e8;height: 120px;color:white;">
<h2 style="line-height: 120px;font-size: 40px;font-weight: 630;">NEVER MISS A CALL AGAIN</h2>
</section>