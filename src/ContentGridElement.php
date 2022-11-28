<?php

namespace BiffBangPow\Element;

use BiffBangPow\Element\Control\ContentGridElementController;
use BiffBangPow\Element\Model\ContentGridItem;
use BiffBangPow\Extension\CallToActionExtension;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\FieldType\DBHTMLText;
use SilverStripe\ORM\FieldType\DBInt;
use SilverStripe\ORM\HasManyList;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

/**
 * @property DBHTMLText Content
 * @property DBInt Cols
 * @method HasManyList ContentItems()
 */
class ContentGridElement extends BaseElement
{
    private static $table_name = 'BBP_ContentGrid';
    private static $singular_name = 'content grid element';
    private static $plural_name = 'content grid elements';
    private static $description = 'Displays content in a grid';
    private static $inline_editable = false;
    private static $css_cols_prefix = 'row-cols-';
    private static $css_max_cols = 6;
    private static $controller_class = ContentGridElementController::class;

    private static $db = [
        'Content' => 'HTMLText',
        'Cols' => 'Int'
    ];

    private static $defaults = [
        'Cols' => 4
    ];

    /**
     * @var array
     */
    private static $has_many = [
        'ContentItems' => ContentGridItem::class
    ];

    /**
     * @var array
     */
    private static $owns = [
        'ContentItems',
    ];

    private static $cascade_deletes = [
        'ContentItems'
    ];

    private static $extensions = [
        CallToActionExtension::class
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['ContentItems']);
        $fields->addFieldsToTab('Root.Main', [
            HTMLEditorField::create('Content'),
            DropdownField::create('Cols', 'Number of columns on large screens', $this->getColsArray())
                ->setDescription('The maximum number of columns to be used in the grid on large screens, small / mobile devices will display the items full-width in a stack')
        ]);
        $fields->addFieldToTab(
            'Root.Main',
            GridField::create(
                'ContentItems',
                _t(__CLASS__ . '.ContentItems', 'Content Items'),
                $this->ContentItems(),
                GridFieldConfig_RecordEditor::create()
                    ->addComponent(new GridFieldOrderableRows('Sort'))
            )
        );

        return $fields;
    }

    /**
     * Populates an array of numbers suitable for use as the dropdown source
     * @return array
     */
    private function getColsArray()
    {
        $cols = [];
        for ($x = 1; $x <= $this->config()->get('css_max_cols'); $x++) {
            $cols[$x] = $x;
        }
        return $cols;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'Content Grid';
    }

    public function getSimpleClassName()
    {
        return 'bbp-contentgrid-element';
    }

    public function getGridClass()
    {
        return $this->config()->get('css_cols_prefix') . $this->Cols;
    }
}
