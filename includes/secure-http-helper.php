<?php
/**
 * Secure HTTP Content Fetcher
 * Replaces insecure $wp_filesystem->get_contents() calls
 */
function ums_secure_get_url_contents($url) {
    $response = wp_remote_get($url, [
        'sslverify' => true,
        'timeout' => 30,
        'redirection' => 3
    ]);
    
    if (is_wp_error($response)) {
        return false;
    }
    
    return wp_remote_retrieve_body($response);
}
