<?php
/**
 * NetworkAnalyzer
 *
 * @link      https://github.com/brian978/NetworkAnalyzer
 * @copyright Copyright (c) 2013
 * @license   Creative Commons Attribution-ShareAlike 3.0
 */

namespace SNMP\Helper;

class BandwidthCalculator implements HelperInterface
{
    public function __invoke()
    {
        $args          = func_get_args();
        $octetsDiff    = $args[0];
        $timeDiff      = $args[1];
        $bandwidthType = 0;

        // To avoid division by 0
        if ($timeDiff == 0) {
            $timeDiff = 1;
        }

        // Converting from B/s to the highest unit available up to TB/s speeds
        while (floor($octetsDiff) > 1000 && $bandwidthType < 4) {
            $octetsDiff /= 1000;
            $bandwidthType++;
        }

        $bandwidth = $octetsDiff / $timeDiff;

        return array(
            'bandwidth' => round($bandwidth, 2),
            'type' => $bandwidthType,
        );
    }
}