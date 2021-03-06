<?php
/**
 * NetworkAnalyzer
 *
 * @link      https://github.com/brian978/NetworkAnalyzer
 * @copyright Copyright (c) 2013
 * @license   Creative Commons Attribution-ShareAlike 3.0
 */

namespace Devices\Form\Fieldset;

use Devices\Entity\Device as DeviceEntity;
use Library\Form\Fieldset\AbstractFieldset;

class Device extends AbstractFieldset
{
    protected $modelName = 'Devices\Model\DevicesModel';

    public function __construct()
    {
        parent::__construct('device');

        $this->setObject(new DeviceEntity());
    }

    public function loadElements()
    {
        // Adding the elements to the fieldset
        $this->add($this->getHiddenId());

        $this->add(
            array(
                'name' => 'name',
                'options' => array(
                    'label' => 'Name',
                    'label_attributes' => array(
                        'class' => 'form_row'
                    ),
                ),
                'attributes' => array(
                    'required' => 'true'
                )
            )
        );

        $this->add(
            array(
                'name' => 'snmpVersion',
                'type' => '\Zend\Form\Element\Select',
                'options' => array(
                    'label' => 'SNMP Version',
                    'label_attributes' => array(
                        'class' => 'form_row'
                    ),
                    'value_options' => array(
                        \SNMP::VERSION_1 => 'VERSION_1',
                        \SNMP::VERSION_2C => 'VERSION_2C',
                        \SNMP::VERSION_3 => 'VERSION_3',
                    )
                ),
                'attributes' => array(
                    'required' => 'true'
                )
            )
        );

        $this->add(
            array(
                'name' => 'snmpCommunity',
                'options' => array(
                    'label' => 'SNMP Community',
                    'label_attributes' => array(
                        'class' => 'form_row'
                    ),
                ),
                'attributes' => array(
                    'required' => 'true'
                )
            )
        );

        $type = new Type();
        $type->setServiceLocator($this->serviceLocator);
        $type->setDenyFilters(array('name'));
        $type->loadElements();
        $this->add($type);

        $interface = new Iface();
        $interface->setServiceLocator($this->serviceLocator);
        $interface->setDenyFilters(array('id'));
        $interface->loadElements();
        $this->add($interface);
    }
}
