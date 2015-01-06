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

    protected $_squarePosition;

    public function __toString()
    {
        try {
            $model = $this->_getModel();

            if ($this->getImageFile()) {
                $model->setBaseFile($this->getImageFile());
            } else {
                $model->setBaseFile($this->getProduct()->getData($model->getDestinationSubdir()));
            }

            if ($model->isCached()) {
                return $model->getUrl();
            } else {
                if ($this->_squarePosition) {
                    $this->_square($this->_squarePosition);
                }

                if ($this->_scheduleRotate) {
                    $model->rotate($this->getAngle());
                }

                if ($this->_scheduleResize) {
                    $model->resize();
                }

                if ($this->getWatermark()) {
                    $model->setWatermark($this->getWatermark());
                }

                $url = $model->saveFile()->getUrl();
            }
        } catch (Exception $e) {
            Mage::logException($e);
            $url = Mage::getDesign()->getSkinUrl($this->getPlaceholder());
        }
        return $url;
    }

    public function square($position=self::CROP_POSITION_CENTER_MIDDLE)
    {
        $this->_squarePosition = $position;

        return $this;
    }

    protected function _square($position=self::CROP_POSITION_CENTER_MIDDLE)
    {
        if (false === in_array($position, $this->allowedPositions)) {
            Mage::throwException('Invalid crop position');
        }
        $width = $this->getOriginalWidth();
        $height = $this->getOriginalHeight();
        $minDimension = $width < $height ? $width : $height;

        $verticalCut = $width - $minDimension;
        $horizontalCut = $height - $minDimension;

        list ($vertical, $horizontal) = explode('-', $position);
        switch ($horizontal) {
            case 'left':
                $left = 0;
                $right = $verticalCut;
                break;
            case 'middle':
                $left = $verticalCut/2;
                $right = $verticalCut/2;
                break;
            case 'bottom':
                $left = $verticalCut;
                $right = 0;
                break;
        }
        switch ($vertical) {
            case 'top':
                $top = 0;
                $bottom = $horizontalCut;
                break;
            case 'center':
                $top = $horizontalCut/2;
                $bottom = $horizontalCut/2;
                break;
            case 'bottom':
                $top = $horizontalCut;
                $bottom = 0;
                break;
        }

        $this->_getModel()->getImageProcessor()->crop($top, $left, $right, $bottom);
    }
}
