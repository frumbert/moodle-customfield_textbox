<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Customfield textbox plugin
 *
 * @package   customfield_textbox
 * @copyright 2022 tim st clair
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace customfield_textbox;

defined('MOODLE_INTERNAL') || die;

/**
 * Class field
 *
 * @package customfield_textbox
 * @copyright 2022 tim st clair
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class field_controller extends \core_customfield\field_controller {
    /**
     * Const type
     */
    const TYPE = 'textbox';

    /**
     * Add fields for editing a textbox field.
     *
     * @param \MoodleQuickForm $mform
     */
    public function config_form_definition(\MoodleQuickForm $mform) {
        $mform->addElement('header', 'header_specificsettings', get_string('specificsettings', 'customfield_textbox'));
        $mform->setExpanded('header_specificsettings', true);

        $mform->addElement('textarea', 'configdata[defaultvalue]', get_string('defaultvalue', 'core_customfield'),
            ['rows'=>'5', 'cols'=>'100']);
        $mform->setType('configdata[defaultvalue]', PARAM_RAW);
    }

}
