<?php get_header(); ?>
<body>

	<div class="featured-image">	
		<?php
		if(ale_get_option('featuredimageevents')){
			echo '<img src="'.esc_url(ale_get_option('featuredimageevents')).'" alt>';
		} else{
			echo '<img src="http://placehold.it/1920x125/ece6d9/8d7a65&amp;text=No+image" alt>';
		}?>
	</div>

	
	<div class="wrap">
		<h1>РАСПИСАНИЕ МАСТЕР-КЛАССОВ</h1>
		<div class="up-block">
			<h3>Сортировка по:</h3>
			<div id="event">
				<p id="event-text">Вид мероприятия</p>
				<img class="arr-event" src="<?php echo get_template_directory_uri();?>/css/images/arr.png" alt="">
				<div class="check-event">
					<div class="yellow">
						<span></span><span class="ev-txt">Курс кондитер</span>
					</div>
					<div class="sky">
						<span></span><span class="ev-txt">Курс кухни мира</span>
					</div>
					<div class="green">
						<span></span><span class="ev-txt">Курс повар-кулинар</span>
					</div>
					<div class="purple">
						<span></span><span class="ev-txt">Курс европейские десерты</span>
					</div>
					<div class="pink">
						<span></span><span class="ev-txt">Курс юный кулинар</span>
					</div>
				</div>
			</div>
			<div id="month">
				<p id="month-text">Месяц</p><input type="hidden" class="month" value="">
				<img class="arr-month" src="<?php echo get_template_directory_uri();?>/css/images/arr.png" alt="">
				<div class="check-month">
					<div>Январь</div><input type="hidden" class="month1" value="01">
					<div>Февраль</div><input type="hidden" class="month1" value="02">
					<div>Март</div><input type="hidden" class="month1" value="03">
					<div>Апрель</div><input type="hidden" class="month1" value="04">
					<div>Май</div><input type="hidden" class="month1" value="05">
					<div>Июнь</div><input type="hidden" class="month1" value="06">
					<div>Июль</div><input type="hidden" class="month1" value="07">
					<div>Август</div><input type="hidden" class="month1" value="08">
					<div>Сентябрь</div><input type="hidden" class="month1" value="09">
					<div>Октябрь</div><input type="hidden" class="month1" value="10">
					<div>Ноябрь</div><input type="hidden" class="month1" value="11">
					<div>Декабрь</div><input type="hidden" class="month1" value="12">
				</div>
			</div>
			<div id="theme">
				<p id="theme-text">Темы</p>
				<img class="arr-theme" src="<?php echo get_template_directory_uri();?>/css/images/arr.png" alt="drop">
				<div class="check-theme">
					<div>Мясо</div>
					<div>Рыба</div>
					<div>Вегетарианские</div>
					<div>Десерты</div>
					<div>Франция</div>
					<div>Италия</div>
					<div>Грузия</div>
					<div>Япония</div>
				</div>
			</div>
		</div>
		
		<div class="wrap-content">	
			<?php	wp_reset_query();
			if ( get_query_var('paged') ) $paged = get_query_var('paged');
			if ( get_query_var('page') ) $paged = get_query_var('page');
			$count = esc_attr(ale_get_option('paginationevents'));
			
			
			$query_events = new WP_Query(
				array(
					'posts_per_page' => $count,
					'post_type' => 'events',
					'ignore_sticky_posts' => 1,
					'post__not_in' => get_option('sticky_posts'),
					'paged' => $paged,
					'order' => 'DESC'
				)
			);
			
			//echo "<pre>";print_r($query_events);echo "</pre>";
			//вывод миниатюры события
			if ($query_events->have_posts()) : while ($query_events->have_posts()) : $query_events->the_post(); 
			
			//'meta_key=review_type&meta_value=music')
			
			
			$ale_links_details = get_post_meta($post->ID, 'ale_links_details', true);
			?>
			
			<?php 
			
				$date_event =  esc_attr(ale_get_meta('eventsdate'));
				$day_month = explode('.',$date_event);
				$day = strftime("%A", strtotime($date_event));
				switch($day) {
					case 'Monday': $day = 'ПН'; break;
					case 'Tuesday': $day = 'ВТ'; break;
					case 'Wednesday': $day = 'СР'; break;
					case 'Thursday': $day = 'ЧТ'; break;
					case 'Friday': $day = 'ПТ'; break;
					case 'Saturday': $day = 'СБ'; break;
					case 'Sunday': $day = 'ВС'; break;
							}
				//отсекаем все события, которые уже прошли
			
				$timestamp_event =  strtotime($date_event);
				$timestamp_now = time();
				if($timestamp_now>$timestamp_event){}else{
			?>

			<div class="dish"> <?php echo get_the_post_thumbnail($post->ID,'events-archive');?>
				<div class="thanks">
					<div class="close">X</div>
					<p>Будем рады видеть Вас у нас на мероприятии!</p>
					<p>В скором времени Вам перезвонят и все подробно расскажут.</p>
				</div>
				<div class="waiting-call">
					<div class="close">X</div>
					<h5>Оставьте свою заявку и Вам перезвонят.</h5>
					<p class="mess"></p>
					<input class="name" type="text" placeholder="Имя" maxlength="20">
					<input class="number" type="text" placeholder="Телефон">
					<button class="wait-call-but">жду звонка</button>
				</div>
				
				
			
					<div class="subscribe" onclick="window.location='<?php the_permalink(); ?>'">
						<p><?php echo $ale_links_details[1]['text'];?></p>
						<p><?php echo $ale_links_details[2]['text'];?></p>
						<p><?php echo $ale_links_details[3]['text'];?></p>
						<p><?php echo $ale_links_details[4]['text'];?></p>
						<button class="sub-but">записаться</button>
					</div>
			

			
				 
				<div class="dish-info">
					<p><?php  echo $day_month[0].'.'.$day_month[1]; ?> <?php echo $day; ?> | <?php echo esc_attr(ale_get_meta('eventstime1'));?></p>
					<div><?php the_title();?></div>
					<p><?php echo $ale_links_details[0]['text'];?> грн.</p>
					<input type="hidden" class = "kind_of_event" value="<?php echo esc_attr(ale_get_meta('eventstime2'));?>">
					<input type="hidden" class = "month_of_event" value="<?php echo $day_month[1]; ?>">
					<input type="hidden" class = "theme_of_event" value="<?php echo esc_attr(ale_get_meta('eventsaddress'));?>">
				</div>
			</div>
			
			 
				<?php }
			
			//wp_nonce_field( 'ale_links_details_box_nonce', 'ale_links_details_box_nonce' );
			//print_r($ale_links_details);//ale_links_details_box_display();
			
			
			?>	
			
			
			<?php endwhile;  endif; wp_reset_query();?>
			
			
		</div>
		<h4 class="no-similar">Нет похожих курсов</h4>
	</div>
	
</body>
<?php get_footer(); ?>