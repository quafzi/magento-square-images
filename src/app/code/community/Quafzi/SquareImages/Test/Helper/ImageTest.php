<?php
class Quafzi_SquareImages_Test_Helper_ImageTest
    extends EcomDev_PHPUnit_Test_Case_Config
{
    public function testHelperRewrite()
    {
        $this->assertInstanceOf('Quafzi_SquareImages_Helper_Image', Mage::helper('catalog/image'));
    }
}
