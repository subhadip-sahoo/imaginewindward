<?php
    /* Template Name: Agent Logout */
    wp_logout();
    wp_safe_redirect(home_url());
    exit();
?>
