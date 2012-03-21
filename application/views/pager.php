<div class="pagination pagination-centered">
  <ul>
      <?php for ($i=0; $i < $page_count; $i++): ?> 
          <li><a href="<?php echo base_url('messages/page') .'/'. ($i + 1) ; ?>"><?php echo $i + 1; ?></a></li>
      <?php endfor; ?>
    <!-- <li><a href="#">Prev</a></li>
    <li class="active">
      <a href="#">1</a>
    </li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">Next</a></li> -->
  </ul>
</div>