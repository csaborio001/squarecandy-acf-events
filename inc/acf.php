<?php
// Add ACF Fields for Event

if ( function_exists('acf_add_local_field_group') ):

$eventfields = array();
$eventfields[] = array(
	'key' => 'field_5616bbe39fbec',
	'label' => '(Start) Date',
	'name' => 'start_date',
	'type' => 'date_picker',
	'required' => 1,
	'conditional_logic' => 0,
	'wrapper' => array(
		'width' => '40',
	),
	'display_format' => 'F j, Y',
	'return_format' => 'F j, Y',
	'first_day' => 0,
);
$eventfields[] = array(
	'key' => 'field_5616bcdfb642d',
	'label' => 'All Day',
	'name' => 'all_day',
	'type' => 'true_false',
	'wrapper' => array(
		'width' => 10,
	),
	'default_value' => 0,
);
$eventfields[] = array(
	'key' => 'field_5616bd4ca2b0f',
	'label' => 'Show End Date/Time',
	'name' => 'multi_day',
	'type' => 'true_false',
	'wrapper' => array(
		'width' => '20',
	),
	'default_value' => 0,
);
$eventfields[] = array(
	'key' => 'field_5616bc2b9fbed',
	'label' => '(Start) Time',
	'name' => 'start_time',
	'type' => 'time_picker',
	'required' => 1,
	'conditional_logic' => array(
		array(
			array(
				'field' => 'field_5616bcdfb642d',
				'operator' => '!=',
				'value' => '1',
			),
		),
	),
	'wrapper' => array(
		'width' => '30',
	),
	'display_format' => 'g:i a',
	'return_format' => 'g:i a',
);
$eventfields[] = array(
	'key' => 'field_5616bd75112ca',
	'label' => 'End Date',
	'name' => 'end_date',
	'type' => 'date_picker',
	'conditional_logic' => array(
		array(
			array(
				'field' => 'field_5616bd4ca2b0f',
				'operator' => '==',
				'value' => '1',
			),
		),
	),
	'wrapper' => array(
		'width' => '70',
	),
	'display_format' => 'F j, Y',
	'return_format' => 'F j, Y',
	'first_day' => 0,
);
$eventfields[] = array(
	'key' => 'field_5616bd8e112cb',
	'label' => 'End Time',
	'name' => 'end_time',
	'type' => 'time_picker',
	'required' => 1,
	'conditional_logic' => array(
		array(
			array(
				'field' => 'field_5616bcdfb642d',
				'operator' => '!=',
				'value' => '1',
			),
			array(
				'field' => 'field_5616bd4ca2b0f',
				'operator' => '==',
				'value' => '1',
			),
		),
	),
	'wrapper' => array(
		'width' => '30',
	),
	'display_format' => 'g:i a',
	'return_format' => 'g:i a',
);
$eventfields[] = array(
	'key' => 'field_5616bedeed0a9',
	'label' => 'Venue Name',
	'name' => 'venue',
	'type' => 'text',
	'conditional_logic' => 0,
	'wrapper' => array(
		'width' => 50,
	),
);
$eventfields[] = array(
	'key' => 'field_5616beefed0aa',
	'label' => 'Venue Link',
	'name' => 'venue_link',
	'type' => 'url',
	'wrapper' => array(
		'width' => 50,
	),
);
$eventfields[] = array(
	'key' => 'field_address226474957',
	'label' => 'Address',
	'name' => 'address',
	'type' => 'text',
);
$eventfields[] = array(
	'key' => 'field_city585d8171a157e',
	'label' => 'City',
	'name' => 'city',
	'type' => 'text',
	'wrapper' => array(
		'width' => 50,
	),
);
$eventfields[] = array(
	'key' => 'field_state94823hf873',
	'label' => 'State/Province',
	'name' => 'state',
	'type' => 'text',
	'wrapper' => array(
		'width' => 25,
	),
);
$eventfields[] = array(
	'key' => 'field_zipfj8392y38r9',
	'label' => 'Postal Code',
	'name' => 'zip',
	'type' => 'text',
	'wrapper' => array(
		'width' => 25,
	),
);
$eventfields[] = array(
	'key' => 'field_country1749283947',
	'label' => 'Country',
	'name' => 'country',
	'type' => 'text',
);

$instructions = '';
if ( !get_field('google_maps_api_key','option') ) {
	$instructions = 'Looks like you don‘t have a Google Maps API key yet. First,
		<a href="https://developers.google.com/maps/documentation/javascript/get-api-key"
		target="_blank">get your API key here</a>. Then enter it on the
		<a href="/wp-admin/edit.php?post_type=event&page=acf-options-event-settings">Events
		Settings page here</a>.';
}

$eventfields[] = array(
	'key' => 'field_5616c0e68be8f',
	'label' => 'Venue Location',
	'name' => 'venue_location',
	'type' => 'google_map',
	'instructions' => $instructions,
	'center_lat' => '40.6976701',
	'center_lng' => '-74.25987,10',
	'zoom' => '14',
	'height' => '280',
);
$eventfields[] = array(
	'key' => 'field_5616befced0ab',
	'label' => 'More Info Link',
	'name' => 'more_info_link',
	'type' => 'url',
	'wrapper' => array(
		'width' => 50,
	),
);
$eventfields[] = array(
	'key' => 'field_5616bf58ed0ac',
	'label' => 'Tickets Link',
	'name' => 'tickets_link',
	'type' => 'url',
	'wrapper' => array(
		'width' => 50,
	),
);
$eventfields[] = array(
	'key' => 'field_facebooklink7293484',
	'label' => 'Facebook Event Link',
	'name' => 'facebook_link',
	'type' => 'url',
);
$eventfields[] = array(
	'key' => 'field_5616bf8eed0ad',
	'label' => 'Short Description',
	'name' => 'short_description',
	'type' => 'wysiwyg',
	'instructions' => 'A short text description for the event. Limit 210 characters.	You may repeat this text and elaborate further in the main body field below.',
	'wrapper' => array(
		'width' => '',
		'class' => 'short_wysiwyg',
		'id' => '',
	),
	'tabs' => 'all',
	'toolbar' => 'basic',
	'media_upload' => 0,
	'default_value' => '',
	'delay' => 0,
);

// allow linking to "works" if the Square Candy ACF Composer Works plugin is enabled
if ( post_type_exists('works') ) :
	$eventfields[] = array(
		'key' => 'field_5841cdf6350d1',
		'label' => 'Featured Works',
		'name' => 'featured_works',
		'type' => 'relationship',
		'post_type' => array(
			0 => 'works',
		),
		'filters' => array(
			0 => 'search',
		),
		'return_format' => 'object',
	);
endif;

acf_add_local_field_group(array(
	'key' => 'group_5616bbdb43b9f',
	'title' => 'Event Fields',
	'fields' => $eventfields,
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'event',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'excerpt',
		1 => 'custom_fields',
		2 => 'discussion',
		3 => 'comments',
		4 => 'format',
		5 => 'page_attributes',
		6 => 'categories',
		7 => 'tags',
		8 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => '',
));

$date_formats = array(
	'l, F j, Y' => 'Saturday, October 26, 1985',
	'F j, Y' => 'October 26, 1985',
	'l, F j' => 'Saturday, October 26',
	'F j' => 'October 26',
	'D, M j, Y' => 'Sat, Oct 26, 1985',
	'M j, Y' => 'Oct 26, 1985',
	'D, M j' => 'Sat, Oct 26',
	'M j' => 'Oct 26',
	'm/d/Y' => '10/26/1985',
	'm/d' => '10/26',
	'Y-m-d' => '1985-10-26',
	'l, j F, Y' => 'Saturday, 26 October, 1985',
	'j F, Y' => '26 October, 1985',
	'l, j F' => 'Saturday, 26 October',
	'j F' => '26 October',
	'D, j M, Y' => 'Sat, 26 Oct, 1985',
	'j M, Y' => '26 Oct, 1985',
	'D, j M' => 'Sat, 26 Oct',
	'j M' => '26 Oct',
	'd/m/Y' => '26/10/1985',
	'd/m' => '26/10',
);

acf_add_local_field_group(array(
	'key' => 'group_5a6e81f786514',
	'title' => 'Event Options',
	'fields' => array(
		array(
			'key' => 'field_5a71126cf1def',
			'label' => 'Date Formats',
			'name' => 'date_formats',
			'type' => 'group',
			'instructions' => 'Choose the date formats you want to use throughout the events system.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5a71125ff1dee',
					'label' => 'Main Date Format',
					'name' => 'date_format',
					'type' => 'select',
					'choices' => $date_formats,
					'default_value' => array(
						0 => 'l, F j, Y',
					),
					'allow_null' => 0,
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5a7119ab98e68',
					'label' => 'Multi-Day Start Date',
					'name' => 'date_format_multi_start',
					'type' => 'select',
					'choices' => $date_formats,
					'default_value' => array(
						0 => 'F j',
					),
					'allow_null' => 0,
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5a7119af98e69',
					'label' => 'Multi-Day End Date',
					'name' => 'date_format_multi_end',
					'type' => 'select',
					'choices' => $date_formats,
					'default_value' => array(
						0 => 'F j, Y',
					),
					'allow_null' => 0,
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5a7119b198e6a',
					'label' => 'Compact Date Format',
					'name' => 'date_format_compact',
					'type' => 'select',
					'choices' => $date_formats,
					'default_value' => array(
						0 => 'D, M j',
					),
					'allow_null' => 0,
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5a711a6b98e6b',
					'label' => 'Compact Multi-Day Start Date',
					'name' => 'date_format_compact_multi_start',
					'type' => 'select',
					'choices' => $date_formats,
					'default_value' => array(
						0 => 'M j',
					),
					'allow_null' => 0,
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5a711a6d98e6c',
					'label' => 'Compact Multi-Day End Date',
					'name' => 'date_format_compact_multi_end',
					'type' => 'select',
					'choices' => $date_formats,
					'default_value' => array(
						0 => 'M j, Y',
					),
					'allow_null' => 0,
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5a711add98e6d',
					'label' => 'Time Format',
					'name' => 'time_format',
					'type' => 'select',
					'choices' => array(
						'g:ia' => '1:21pm',
						'g:i a' => '1:21 pm',
						'g:iA' => '1:21PM',
						'H:i' => '13:21',
					),
					'default_value' => array(
						0 => 'g:ia',
					),
					'allow_null' => 0,
					'return_format' => 'value',
				),
				array(
					'key' => 'field_timedatesep73847927483',
					'label' => 'Date/Time Separator',
					'name' => 'datetime_sep',
					'type' => 'text',
					'default_value' => ' – ',
				),
				array(
					'key' => 'field_timedatesep2_729385610',
					'label' => 'Date/Time Separator 2',
					'name' => 'datetime_sep2',
					'type' => 'text',
					'default_value' => ', ',
				),
				array(
					'key' => 'field_timedaterange733636483',
					'label' => 'Date/Time Range Character',
					'name' => 'datetime_range',
					'type' => 'text',
					'default_value' => '–',
				),
			),

		),
		array(
			'key' => 'field_5a6e820093be4',
			'label' => 'Google Maps API Key',
			'name' => 'google_maps_api_key',
			'type' => 'text',
			'instructions' => '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key"
			target="_blank">Get Your API Key Here</a>',
		),
		array(
			'key' => 'field_5a711b7d7ee7b',
			'label' => 'Map Link',
			'name' => 'map_link',
			'type' => 'true_false',
			'message' => 'Display Map Link Buttons',
			'default_value' => 1,
		),
		array(
			'key' => 'field_5a71494e83bcb',
			'label' => 'Show Map',
			'name' => 'show_map_on_detail_page',
			'type' => 'true_false',
			'message' => 'Show a Google map with pin on the individual event page',
			'default_value' => 0,
		),
		array(
			'key' => 'field_mapjson738474635',
			'label' => 'Google Maps JSON',
			'name' => 'google_maps_json',
			'type' => 'textarea',
			'instructions' => 'Generate JSON map stype code or edit existing code here: <a href="https://mapstyle.withgoogle.com/">https://mapstyle.withgoogle.com</a>',
		),
		array(
			'key' => 'field_5a711b987ee7c',
			'label' => 'Add to gCal',
			'name' => 'add_to_gcal',
			'type' => 'true_false',
			'message' => 'Display Add to Google Calendar Buttons',
			'default_value' => 1,
		),
		array(
			'key' => 'field_homecountry17593483',
			'label' => 'Home Country',
			'name' => 'home_country',
			'type' => 'text',
			'instructions' => 'If the majority of your events are in one country, enter
				your home country here to override some location displays. Hides the home
				country name in most places. Provides <strong>City, State/Province</strong>
				for the short version of you home country and <strong>City, Country</strong>
				short version display for others.',
			'default_value' => 'United States',
		),
		array(
			'key' => 'field_5a711c1103fad',
			'label' => 'Archive by Year',
			'name' => 'archive_by_year',
			'type' => 'true_false',
			'message' => 'Group Past Events by Year',
			'default_value' => 1,
		),
		array(
			'key' => 'field_5a71e021fe462',
			'label' => 'Collapse/Expand',
			'name' => 'accordion',
			'type' => 'true_false',
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5a711c1103fad',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'message' => 'Collapse/Expand Animation for Event Archives by Year',
			'default_value' => 1,
		),
		array(
			'key' => 'field_5a711c6203fae',
			'label' => 'More Link (Compact View)',
			'name' => 'more_link',
			'type' => 'link',
			'return_format' => 'array',
		),
		array(
			'key' => 'field_5a7120c836833',
			'label' => 'Number of Upcoming',
			'name' => 'number_of_upcoming',
			'type' => 'number',
			'instructions' => 'How Many Upcoming Events to Show in Compact View',
			'default_value' => 3,
			'min' => 1,
			'max' => 99,
			'step' => 1,
		),
		array(
			'key' => 'field_5a71218b78f41',
			'label' => 'Show Description',
			'name' => 'show_description',
			'type' => 'true_false',
			'message' => 'Show Short Description in Compact View',
			'default_value' => 1,
		),
		array(
			'key' => 'field_5a716c3632b88',
			'label' => 'Show Title',
			'name' => 'show_title',
			'type' => 'true_false',
			'message' => 'Show Title Field in Compact View',
			'default_value' => 1,
		),
		array(
			'key' => 'field_5a712237b7a78',
			'label' => 'No Events Text',
			'name' => 'no_events_text',
			'type' => 'wysiwyg',
			'default_value' => '<h2>There are currently upcoming no events.</h2>
<p>Please join the email list and we will keep you posted when new events get added.</p>',
			'tabs' => 'all',
			'toolbar' => 'basic',
			'media_upload' => 0,
			'delay' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-event-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
