<?php

namespace BiffBangPow\Element\Model;

use BiffBangPow\Element\ContentGridElement;
use BiffBangPow\Extension\CallToActionExtension;
use BiffBangPow\Extension\SortableExtension;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBHTMLText;
use SilverStripe\ORM\FieldType\DBVarchar;

/**
 * @property DBVarchar Title
 * @property DBHTMLText Content
 * @method ContentGridElement Element()
 */
class ContentGridItem extends DataObject
{
    private static $table_name = 'BBP_ContentGrid_Item';
    private static $singular_name = 'Content Item';
    private static $plural_name = 'Content Items';

    private static $db = [
        'Title' => 'Varchar',
        'Content' => 'HTMLText'
    ];

    private static $has_one = [
        'Element' => ContentGridElement::class
    ];

    private static $extensions = [
      CallToActionExtension::class,
      SortableExtension::class
    ];

}
