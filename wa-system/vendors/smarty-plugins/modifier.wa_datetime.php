<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

function smarty_modifier_wa_datetime($string, $format = 'datetime', $timezone = null, $locale = null)
{
    if ($locale === null) {
        /**
         * @var waSmartyView
         */
        $smarty = waConfig::get('current_smarty');
        $locale = $smarty->getVars('locale');
        if (isset($locale->value)) {
            $locale = $locale->value;
        } else {
            $locale = null;
        }
    }
    if ($locale === null) {
        $locale = waSystem::getInstance()->getUser()->getLocale();
    }

    return waDateTime::format($format, $string, $timezone, $locale);

}

