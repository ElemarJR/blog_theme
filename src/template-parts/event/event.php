<?php
	$event_class = '';
	$now = new DateTime( date( 'Y-m-d' ) );
	$end = new DateTime( get_field( 'event_end' ) );
	$start = new DateTime( get_field( 'event_start' ) );

	$event_days = $start->format('d');
	$event_months = date_i18n( 'F', $start->getTimestamp() );
	$diff_in_days = $end->diff( $start )->days;

	for ($i = 1; $i <= $diff_in_days; ++$i) {
		$division = $i == $diff_in_days ? ' e ' : ', ';
		$event_days .= $division . ( sprintf( '%02d', $start->format('d') + $i ) );
	}

	$month_end = date_i18n( 'F', $end->getTimestamp() );

	if ($event_months !== $month_end ) {
		$event_months .= '/' . $month_end;
	}

	// Check if events happened or is happening
	if ( $now >= $start && $now <= $end ) {
		$event_class = 'event__active';
	} else if ( $now > $end ) {
		$event_class = 'event__old';
	}
?>
<div class="event <?php echo esc_attr( $event_class ); ?>">
	<div class="event--wrapper">
		<div class="event--header">
			<time class="event--date">
				<?php echo esc_html( $event_months ); ?><br><?php echo esc_html( $event_days ); ?>
			</time>
			<time class="event--image">
				<?php the_post_thumbnail(); ?>
			</time>
		</div>
		<div class="event--content">
			<p class="event--role"><?php the_field( 'event_role' ); ?></p>
			<h3 class="event--title"><?php the_field( 'event_name' ); ?></h3>
		</div>
		<div class="event--footer"><?php the_title(); ?></div>
	</div>
</div>