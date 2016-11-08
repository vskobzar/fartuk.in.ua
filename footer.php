	<!--<div class="secondfooter">
		<div class="wrapper clearfix">
			<?php if(ale_get_option('footer_type') == 'default'){ ?>
				<section class="col-6 flexslider">
					<div class="header">
						<h2><?php echo esc_attr(ale_get_option('footerrecentblogtitle')); ?></h2>
					</div>

					<ul class="slides">
						<?php
						wp_reset_query();
						$query_post = new WP_Query(
							array(
								'posts_per_page' => 6,
								'post_type' => 'post',
								'ignore_sticky_posts' => 1,
								'post__not_in' => get_option('sticky_posts'),
								'order' => 'DESC',
							)
						);
						$count = 1;
						if ($query_post->have_posts()) : while ($query_post->have_posts()) : $query_post->the_post(); $count++;
							if($count%2==0){echo '<li>';} ?>
								<article>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
									<?php echo ale_trim_excerpt(30); ?>
									<?php
									if(get_the_post_thumbnail($post->ID,'post-recent')){
										echo get_the_post_thumbnail($post->ID,'post-recent');
									} else{
										echo '<img src="http://placehold.it/145x134/ece6d9/8d7a65&amp;text=No+image" alt>';
									}
									?>
								</article>
							<?php if($count%2==1){echo '</li>';}
						endwhile;  endif; wp_reset_query();?>
					</ul>
				</section>

				<section class="col-6">
					<div class="header">
						<h2><?php echo esc_attr(ale_get_option('footerinstagramfeedtitle')); ?></h2>
					</div>

					<div class="user col-3">
						<?php if(ale_get_option('footerinstagramfeedlogo')){
							echo '<img src="'.esc_url(ale_get_option('footerinstagramfeedlogo')).'" alt>';
						} else{
							echo '<img src="http://placehold.it/87x87/ece6d9/8d7a65&amp;text=No+image" alt>';
						} ?>
						<ul>
							<?php if(ale_get_option('footerinstagramfeedgoogle')): ?>
								<li class="googleplus">
									<a href="<?php echo esc_url(ale_get_option('footerinstagramfeedgoogle')); ?>" class="text" rel="external" target="_blank"><?php _e('Google plus', 'aletheme'); ?></a>
									<a href="<?php echo esc_url(ale_get_option('footerinstagramfeedgoogle')); ?>" class="link" rel="external" target="_blank"></a>
								</li>
							<?php endif; ?>
							<?php if(ale_get_option('footerinstagramfeedtwi')): ?>
								<li class="skype">
									<a href="<?php echo esc_url(ale_get_option('footerinstagramfeedtwi')); ?>" class="text" rel="external" target="_blank"><?php _e('Twitter', 'aletheme'); ?></a>
									<a href="<?php echo esc_url(ale_get_option('footerinstagramfeedtwi')); ?>" class="link" rel="external" target="_blank"></a>
								</li>
							<?php endif; ?>
							<?php if(ale_get_option('footerinstagramfeedface')): ?>
								<li class="facebook">
									<a href="<?php echo esc_url(ale_get_option('footerinstagramfeedface')); ?>" class="text" rel="external" target="_blank"><?php _e('Facebook', 'aletheme'); ?></a>
									<a href="<?php echo esc_url(ale_get_option('footerinstagramfeedface')); ?>" class="link" rel="external" target="_blank"></a>
								</li>
							<?php endif; ?>
						</ul>
					</div>
					<?php if(shortcode_exists('instagram-feed')){
						echo do_shortcode('[instagram-feed num=4 showbutton=false imageres=thumb]');
					} else{
						echo '<div class="sbi story"><p>Please install Instagram Feed plugin!</p></div>';
					} ?>
				</section>
			<?php } elseif(ale_get_option('footer_type')== 'widget'){
				ale_part('footer-widget');
			} ?>
		</div>
	</div>-->
	<footer>
		<div class="top wrapper clearfix">
			<div class="col-2i logo">
				<?php if(ale_get_option('footerlogo')){ ?>
					<a href="<?php echo home_url(); ?>/" class="customlogo"><img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" alt></a>
				<?php } else { ?>
					<a href="<?php echo home_url(); ?>/" class="alelogo"><?php echo esc_attr(bloginfo('name')); ?></a>
				<?php } ?>
			</div>

			<div class="col-2i text">
				<p><?php echo ale_get_option('footertext'); ?></p>
			</div>

			<div class="col-2 link">
				<ul>
					<li><a href="<?php echo esc_url(ale_get_option('footerurl1')); ?>"><?php echo esc_attr(ale_get_option('footerurltext1')); ?></a></li>
					<li><a href="<?php echo esc_url(ale_get_option('footerurl2')); ?>"><?php echo esc_attr(ale_get_option('footerurltext2')); ?></a></li>
				</ul>
			</div>

			<nav class="col-5">
				<?php
				if ( has_nav_menu( 'footer_right_menu' ) ) {
					wp_nav_menu(array(
						'theme_location'=> 'footer_right_menu',
						'menu'			=> 'Footer Right Menu',
						'menu_class'	=> 'menu cf',
						'walker'		=> new Aletheme_Nav_Walker(),
						'container'		=> '',
						'depth'         => 1,
					));
				}
				?>
			</nav>
		</div>

		<hr>

		<div class="bottom wrapper clearfix">
			<div class="col-4 contact">
				<?php if(ale_get_option('headernum')){ ?><div class="phone"><?php echo esc_attr(ale_get_option('headernum')); ?></div><?php } ?>
				<?php if(ale_get_option('headeremail')){ ?><div class="email"><a href="mailto:<?php echo esc_attr(ale_get_option('headeremail')); ?>"><?php echo esc_attr(ale_get_option('headeremail')); ?></a></div><?php } ?>
			</div>

			<div class="col-4 social">
				<ul>
					<?php if(ale_get_option('gog')){ echo '<li class="googleplus"><a href="'.esc_url(ale_get_option('gog')).'" rel="external"></a></li>'; } ?>
					<?php if(ale_get_option('sky')){ echo '<li class="skype"><a href="'.esc_url(ale_get_option('sky')).'" rel="external"></a></li>'; } ?>
					<?php if(ale_get_option('fb')){ echo '<li class="facebook"><a href="'.esc_url(ale_get_option('fb')).'" rel="external"></a></li>'; } ?>
					<?php if(ale_get_option('linkedin')){ echo '<li class="linkedin"><a href="'.esc_url(ale_get_option('linkedin')).'" rel="external"></a></li>'; } ?>
				</ul>
			</div>

			<div class="col-4 copy">
				<?php if (ale_get_option('copyrights')) : ?>
					<p class="right"><?php echo esc_attr(ale_option('copyrights')); ?></p>
				<?php else: ?>
					<p class="right">&copy; <?php _e('2016  Produced by <b><a href="http://webmonsters.dp.ua" style="color:red;"> WebMonsters </a></b> team', 'aletheme')?></p>
				<?php endif; ?>
			</div>
		</div>
	</footer>
	<!-- Scripts -->
	<?php wp_footer(); ?>
</div>
</body>
</html>