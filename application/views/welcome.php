<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Youtube API</title>
	<link rel="stylesheet" href="<?php echo asset_url(); ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo asset_url(); ?>/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo asset_url(); ?>/js/jquery-2.0.0.js"></script>
	<script type="text/javascript" src="<?php echo asset_url(); ?>/js/search.js"></script>
</head>
<body>

<div id="container">
<?php
echo form_open('/',array('id' => 'search-form','name'=>'searchForm')); ?>
<?php  
echo form_input(array('id' => 'sname', 'name' => 'sname', 'type' => 'search', 'placeholder' => 'Youtube Search', 'class' => 'input-append'));
echo form_submit(array('id' => 'search-form-submit', 'value' => 'Search', 'class' => 'btn btn-success'));
echo form_close(); 
?>
</div>
<div id="video-list"></div>		
</div>
</body>
</html>