<?php
	global $gaa_options;
	global $gaa_option_start;
	
	//$ga_userId = 1234;
?>

<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];
a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

// New Google Analytics code to set User ID.

<?php
// New Google Analytics code to set User ID.
// $userId is a unique, persistent, and non-personally identifiable string ID.
if (isset($ga_userId)) {
  $gacode = "ga('create', '".$gaa_options[$gaa_option_start.'ua_code']."', { 'userId': '%s' });";
  echo sprintf($gacode, $ga_userId);
}else{?>
	ga('create', '<?php echo $gaa_options[$gaa_option_start.'ua_code'] ?>', 'auto');
<?php } //end else ?>


ga('send', 'pageview');

</script>
<!-- End Google Analytics -->