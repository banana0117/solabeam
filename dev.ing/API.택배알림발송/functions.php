<?php

add_action('test_check','test_db_story');

wp_schedule_event(time(), 'hourly', 'test_check');