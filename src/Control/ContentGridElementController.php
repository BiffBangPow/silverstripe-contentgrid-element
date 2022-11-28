<?php

namespace BiffBangPow\Element\Control;

use DNADesign\Elemental\Controllers\ElementController;
use SilverStripe\View\Requirements;

class ContentGridElementController extends ElementController
{
    protected function init()
    {
        parent::init();
        Requirements::css('biffbangpow/silverstripe-contentgrid-element:client/dist/css/contentgrid.css', '', [
            'inline' => true
        ]);
    }
}