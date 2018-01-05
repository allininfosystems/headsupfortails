<?php


namespace Allin\Customregistrationfields\Model\Customer\Attribute\Source;

class SecondPetInformation extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    /**
     * getAllOptions
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['value' => '1', 'label' => __('Cat')],
                ['value' => '2', 'label' => __('Dog')]
            ];
        }
        return $this->_options;
    }
}
