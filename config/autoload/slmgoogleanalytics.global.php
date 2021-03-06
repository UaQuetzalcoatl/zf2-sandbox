<?php
/**
 * SlmGoogleAnalytics Configuration
 *
 * If you have a ./configs/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */
$googleAnalytics = array(
    /**
     * Web property ID (something like UA-xxxxx-x)
     */
    'id' => '',

    /**
     * Tracking across multiple (sub)domains
     * @see https://developers.google.com/analytics/devguides/collection/gajs/gaTrackingSite
     */
    'domain_name' 	=> '',
    'allow_linker' => false,

    /**
     * Disable/enable page tracking
     *
     * It is adviced to turn off tracking in a development/staging environment. Put this
     * configuration option in your local.php in the autoload folder and set "enable" to
     * false.
     */
    'enable' => false,
);

/**
 * You do not need to edit below this line
 */
return array('google_analytics' => $googleAnalytics);
