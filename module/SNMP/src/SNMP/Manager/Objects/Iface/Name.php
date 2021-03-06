<?php
/**
 * NetworkAnalyzer
 *
 * @link      https://github.com/brian978/NetworkAnalyzer
 * @copyright Copyright (c) 2013
 * @license   Creative Commons Attribution-ShareAlike 3.0
 */

namespace SNMP\Manager\Objects\Iface;

class Name extends AbstractIfaceHelper
{
    /**
     * @param array $data
     * @return $this|mixed
     */
    public function process(array $data)
    {
        $this->bindToInterfaceObject($data);
        $this->parentObject->setName($this);

        $this->data = $this->processStringData($data);

        return $this;
    }
}
