<?php 

if(time() > @$_SESSION['expire']){
session_destroy();
session_unset();
$_SESSION=array();
} else {
@$_SESSION['expire'] = time()+5*60;
}



 ?>

<?php if(isset($user)) :?>

 <script>
<?php include 'js/shortTimer.js'; ?>
</script>


<?php endif; ?>