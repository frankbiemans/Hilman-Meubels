<?php

$i = 0;
$args = array(
	'post_type' => 'project',
	'posts_per_page' => 18
	);

$projects = get_posts( $args );

echo '<section class="newest-projects">';
			foreach($projects as $project){

				$def_thumb_url = "./wp-content/uploads/2016/08/orange.jpg";
				global $dynamic_featured_image;
				$featured_images = $dynamic_featured_image->get_featured_images($project->ID);
				if(isset($featured_images[0]['thumb'])){
					$def_thumb_url = $featured_images[0]['thumb'];
				}

				$i++;
				echo '
					<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
						<div class="project-content">
							<a href="'. get_permalink( $project->ID ) .'">
								<figure>
									<img src="'. $def_thumb_url .'" />
								</figure>
								<span>'. $project->post_title .'</span>
							</a>
						</div>
					</div>
				';


				if($i % 2 === 0){ ?>
					<div class="clearfix visible-xs"></div>
				<?php }
			}
echo '<section>';

?>