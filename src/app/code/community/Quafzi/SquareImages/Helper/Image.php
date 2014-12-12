<?php
class Quafzi_SquareImages_Helper_Image extends Mage_Catalog_Helper_Image
{
    const CROP_POSITION_TOP_LEFT = 'top-left';
    const CROP_POSITION_TOP_MIDDLE = 'top-middle';
    const CROP_POSITION_TOP_RIGHT = 'top-right';
    const CROP_POSITION_CENTER_LEFT = 'center-left';
    const CROP_POSITION_CENTER_MIDDLE = 'center-middle';
    const CROP_POSITION_CENTER_RIGHT = 'center-right';
    const CROP_POSITION_BOTTOM_LEFT = 'bottom-left';
    const CROP_POSITION_BOTTOM_MIDDLE = 'bottom-middle';
    const CROP_POSITION_BOTTOM_RIGHT = 'bottom-right';

    public $allowedPositions = array(
        self::CROP_POSITION_TOP_LEFT,
        self::CROP_POSITION_TOP_MIDDLE,
        self::CROP_POSITION_TOP_RIGHT,
        self::CROP_POSITION_CENTER_LEFT,
        self::CROP_POSITION_CENTER_MIDDLE,
        self::CROP_POSITION_CENTER_RIGHT,
        self::CROP_POSITION_BOTTOM_LEFT,
        self::CROP_POSITION_BOTTOM_MIDDLE,
        self::CROP_POSITION_BOTTOM_RIGHT
    );
}
