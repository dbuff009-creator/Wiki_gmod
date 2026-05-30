<?php
/**
* @version   $Id$
* @package   GTranslate
* @copyright Copyright (C) 2008-2025 GTranslate Inc. All rights reserved.
* @license   GNU/GPL v3 http://www.gnu.org/licenses/gpl.html
*/

defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');
use Joomla\CMS\Form\FormField;
use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

class JFormFieldLiveChat extends FormField {

    protected $type = 'live_chat';

    public function getLabel() {
        return '';
    }

    public function getValue() {
        return '';
    }

    public function getInput() {

        $user = Factory::getUser();
        $name = addslashes($user->name);
        $website = addslashes(Uri::root());

        $live_chat = <<<EOM
<script>window.intercomSettings = {app_id: "r70azrgx", hide_default_launcher: false, 'name': '{$name}', 'website': '{$website}', 'platform': 'joomla'};</script>
<script src="https://js.intercomcdn.com/shim.latest.js"></script>
EOM;
        return $live_chat;
    }
}