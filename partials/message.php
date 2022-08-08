<?php
if(isset($_SESSION['message'])) :
?>

<div class="containor" role="alert">
  <strong style="color: red;"><?= $_SESSION['message']; ?>!</strong>
</div>

<?php
unset($_SESSION['message']);
endif;
?>