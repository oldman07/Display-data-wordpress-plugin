<?php
// basic.php

function get_wp_version() {
    // Get WordPress version
    $wp_version = get_bloginfo('version');

    return $wp_version;
}
