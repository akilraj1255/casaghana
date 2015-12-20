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
i = 1;
  // set the initial value
var timer = function onTimer() {
  i++;
  if (i === 300000) {
    alert('Your time has expired!');
  }
  else {
    setTimeout(onTimer);
  }
}
  timer();
</script>


<?php endif; ?>