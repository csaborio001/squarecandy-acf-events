<?php
// Square Candy ACF Events Preview/Listing Post Template
$event = get_fields();

$output .= '<article id="post-' . get_the_ID() .'" class="events-preview" itemscope="" itemtype="http://schema.org/MusicEvent">
	<h1 class="event-date-time" itemprop="startDate" content="' . date('Y-m-d',strtotime($event['start_date'])) . '">
		<a href="' . get_permalink() . '">' . get_squarecandy_acf_events_date_display($event, $compact) . '</a>
	</h1>';
if ( !empty($event['end_date']) ) {
	$meta_end_date = date( 'Y-m-d', strtotime( $event['end_date'] ) );
} else {
	$meta_end_date = date( 'Y-m-d', strtotime( $event['start_date'] ) );
}

$output .= '<meta itemprop="endDate" content="' . $meta_end_date .'">';
if ( !$compact || ( $compact && get_field('show_title', 'option') ) ) {
	$output .= '<h2 class="entry-title" itemprop="name"><a href="' . get_permalink() . '">' . get_the_title() .'</a></h2>';
}
$output .= '<meta itemprop="url" content="' . get_permalink() . '">';

if ( !empty($event['venue']) || !empty($event['address']) || !empty($event['city']) ) :
	if ($compact) {
		$output .= get_squarecandy_acf_events_address_display($event, 'citystate', true);
	} else {
		$output .= get_squarecandy_acf_events_address_display($event, '2line', true);
	}
endif;

if ( !empty($event['short_description']) ) {
	$show_description = get_field('show_description', 'option');
	if ( !$compact || ( $compact && $show_description ) ) {
		$output .= '<div class="short-description" itemprop="description">' . $event['short_description'] . '</div>';
	}
}

$output .= '<div class="more-info-buttons">';
	if ( !empty($event['tickets_link']) ) {
		$output .= '<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
			<a class="button button-bold" itemprop="url" href="' . $event['tickets_link'] .'">
				<i class="fa fa-ticket"></i> ' . __('Tickets', 'squarecandy-acf-events') . '
			</a>
		</span> ';
	}

	if ( !empty($event['more_info_link']) && !$compact ) {
		$output .= '<a class="button button-bold" href="' . $event['more_info_link'] . '">
			<i class="fa fa-info-circle"></i> ' . __('More Info', 'squarecandy-acf-events') . '
		</a> ';
	}

	if ( $compact ) {
		$output .= '<a class="button button-bold" href="' . get_permalink() . '">
			<i class="fa fa-info-circle"></i> ' . __('More Info', 'squarecandy-acf-events') . '
		</a> ';
	}

	if ( !empty($event['facebook_link']) ) {
		$output .= '<a class="button button-bold button-facebook" href="' . $event['facebook_link'] . '">
			<i class="fa fa-facebook"></i>
			<span class="screen-reader-text">' . __('Facebook Event', 'squarecandy-acf-events') . '</span>
			</a> ';
	}

	if ( get_field('add_to_gcal', 'option') ) :
		$startdate = $event['start_date'];
		if ( isset($event['start_time']) ) $startdate .= ' ' . $event['start_time'];

		if ($event['multi_day']==1) {
			$enddate = $event['end_date'];
			if ( isset($event['end_time']) ) $enddate .= ' ' . $event['end_time'];
		}
		else {
			$enddate = false;
		}
		$event_address = isset($event['venue_location']['address']) ? $event['venue_location']['address'] : null;
		$output .= squarecandy_add_to_gcal(
			get_the_title(),
			$startdate,
			$enddate,
			$event['short_description'],
			$event_address,
			$event['all_day'],
			$linktext = '<i class="fa fa-google-plus"></i><span class="screen-reader-text">' . __('add to google calendar', 'squarecandy-acf-events') . '</span>',
			$classes = array('gcal-button', 'button', 'button-bold')
		);
	endif;

$output .= '</div>
</article>';
