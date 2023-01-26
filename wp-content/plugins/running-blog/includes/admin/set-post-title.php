<?php

function set_post_title($data, $id) {
	if ($data['post_type'] == 'run') {
		$data['post_title'] = $_POST['date'] . ' Run';
	}

	if ($data['post_type'] == 'race') {
		$data['post_title'] = $_POST['race-date'] . ' Race';
	}

	if ($data['post_type'] == 'meal') {
		$data['post_title'] = $_POST['date'] . ' ' . $_POST['meal-type']. ' ' . $_POST['meal-time-of-day'];
	}

	if ($data['post_type'] == 'workout') {
		$data['post_title'] = $_POST['date'] . ' Workout';
	}

	if ($data['post_type'] == 'sleep_data') {
		$data['post_title'] = $_POST['sleep-date'] . ' Sleep';
	}

	if ($data['post_type'] == 'supplement') {
		$data['post_title'] = $_POST['date'] . ' Supplements';
	}

	if ($data['post_type'] == 'meta') {
		$data['post_title'] = $_POST['date'] . ' Meta';
	}

	return $data;
}