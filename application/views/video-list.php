<div class="video-detail col-md-8">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe src='https://www.youtube.com/embed/<?php echo $results[0]['videoId'];?>' class="embed-responsive-item" id="youtube-url"></iframe>
				</div>
				<div class="details">
					<div id="youtube-title"><?php echo $results[0]['title']; ?></div>
					<div id="youtube-desc"><?php echo $results[0]['description']; ?></div>
				</div>
</div>
<ul class="col-md-4 list-group">
		<?php foreach ($results as $key => $value) { ?>
			<li onClick="getNextVideo('<?php echo $value['title'] ?>','<?php echo $value['description'] ?>','<?php echo $value['videoId'] ?>');return false;" class="list-group-item">
			<div class="video-list media">
				<div class="media-left">
					<img class="media-object" src="<?php echo $value['imageUrl']; ?>"/>
				</div>
				<div class="media-body">
					<div class="media-heading"><?php echo $value['title'];?></div>
				</div>
			</div>
		</li>
		<?php } ?>
		
</ul>