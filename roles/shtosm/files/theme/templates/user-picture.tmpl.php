<div class="e2-user-picture-container">
<?php if (array_key_exists ('userpic-href', $content['blog'])) { ?>
  <?= '<a href="'. $content['blog']['href']. '" class="nu"><img src="'. $content['blog']['href'] .'/user/userpic.png" alt="" /></a>' ?> 
<?php } ?>
</div>
