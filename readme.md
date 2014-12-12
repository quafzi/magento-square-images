Quafzi SquareImages Extension
=============================

You may now add `square()` to crop images to be square.

Facts
-----
- version: 1.0.0
- composer package name: ``quafzi/square-images``
- [extension on GitHub](https://github.com/quafzi/Quafzi_SquareImages)
- [direct download link](http://connect.magentocommerce.com/community/get/Quafzi_SquareImages-1.0.0.tgz)

Description
-----------

In Magento you can use

    $this->helper('catalog/image')->init($_product, 'small_image')->resize($_imgSize)

to output a resized image. If it is not a square image, you will get white
borders to match the format.

If you prefer real square images, you may now use

    $this->helper('catalog/image')->init($_product, 'small_image')->resize($_imgSize)->square()

to crop the overlapping image parts before resizing. You may specify one of the
following constants as a parameter to define which part of the image you want to be shown:

    Quafzi_SquareImages_Helper_Image::CROP_POSITION_TOP_LEFT,
    Quafzi_SquareImages_Helper_Image::CROP_POSITION_TOP_MIDDLE,
    Quafzi_SquareImages_Helper_Image::CROP_POSITION_TOP_RIGHT,
    Quafzi_SquareImages_Helper_Image::CROP_POSITION_CENTER_LEFT,
    Quafzi_SquareImages_Helper_Image::CROP_POSITION_CENTER_MIDDLE,
    Quafzi_SquareImages_Helper_Image::CROP_POSITION_CENTER_RIGHT,
    Quafzi_SquareImages_Helper_Image::CROP_POSITION_BOTTOM_LEFT,
    Quafzi_SquareImages_Helper_Image::CROP_POSITION_BOTTOM_MIDDLE,
    Quafzi_SquareImages_Helper_Image::CROP_POSITION_BOTTOM_RIGHT

Requirements
------------
- PHP >= 5.2.0
- Mage_Core

Compatibility
-------------
- Magento >= 1.4

Installation Instructions
-------------------------
1. Install the extension via Modman or Composer with the key shown above or copy all the files into your document root.
2. Clear the cache, logout from the admin panel and then login again.
3. Use ``->square($position)`` to square your images

Uninstallation
--------------
1. Remove all extension files from your Magento installation and your
``->square($position)`` calls.


Support
-------
If you have any issues with this extension, open an issue on [GitHub](https://github.com/quafzi/Quafzi_SquareImages/issues).


Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------

Thomas Birke

[@quafzi](https://twitter.com/quafzi)

Licence
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) 2014 Thomas Birke
