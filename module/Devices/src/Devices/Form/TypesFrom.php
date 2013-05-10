<?php
/**
 * NetworkAnalyzer
 *
 * @link      https://github.com/brian978/NetworkAnalyzer
 * @copyright Copyright (c) 2013
 * @license   Creative Commons Attribution-ShareAlike 3.0
 */

namespace Devices\Form;

use Devices\Form\Fieldsets\Type;
use Library\Form\AbstractForm;

class TypesFrom extends AbstractForm
{
    public function __construct()
    {
        parent::__construct('types_form');

        $this->setAttributes(
            array(
                'class' => 'input_form'
            )
        );
    }

    /**
     * @return \Library\Form\Fieldsets\AbstractFieldset
     */
    protected function getBaseFieldsetObject()
    {
        $object = new Type();
        $object->setUseAsBaseFieldset(true)
            ->setServiceLocator($this->serviceLocator)
            ->setDenyFilters(array('id'))
            ->loadElements();

        return $object;
    }
}