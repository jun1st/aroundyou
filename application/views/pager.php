<div class="pagination pagination-centered">
  <ul>
      <?php for ($i=0; $i < $page_count; $i++): ?> 
          <li><a href="<?php echo base_url($page_url) .'/'. ($i + 1) ; ?>"><?php echo $i + 1; ?></a></li>
      <?php endfor; ?>
  </ul>
</div>