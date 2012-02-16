<div class="pull-right span3">
	<h3>附近的热点</h3>
	<ul id="hot-regions">
        <?php if(isset($region_messages) ){ 
            foreach ($region_messages as $item) {
                echo "<li><a href='/message/view/$item->message_id' title='查看详情'>$item->content</a></li>";
            }
         }?>

	</ul>
</div>
