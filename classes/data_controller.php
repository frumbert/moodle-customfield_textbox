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
 * Customfields textbox plugin
 *
 * @package   customfield_textbox
 * @copyright 2018 Daniel Neis Araujo <daniel@moodle.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace customfield_textbox;

defined('MOODLE_INTERNAL') || die;

/**
 * Class data
 *
 * @package customfield_textbox
 * @copyright 2018 Daniel Neis Araujo <daniel@moodle.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class data_controller extends \core_customfield\data_controller {

    /**
     * Return the name of the field where the information is stored
     * @return string
     */
    public function datafield() : string {
        return 'value';
    }

    /**
     * Returns the name of the field to be used on HTML forms.
     *
     * @return string
     */
    public function get_form_element_name() : string {
        return parent::get_form_element_name();
    }

    /**
     * Add fields for editing a textbox field.
     *
     * @param \MoodleQuickForm $mform
     */
    public function instance_form_definition(\MoodleQuickForm $mform) {
        $field = $this->get_field();
        $elementname = $this->get_form_element_name();
        $defaultvalue = $this->get_default_value();
        $mform->addElement('textarea', $elementname, $this->get_field()->get_formatted_name(), array('rows' => '5', 'cols' => '100'));
        if (!empty($defaultvalue)) {
            $mform->setDefault($elementname, $defaultvalue);
        }
        if ($field->get_configdata_property('required')) {
            $mform->addRule($elementname, null, 'required', null, 'client');
        }
    }

    /**
     * Returns the default value as it would be stored in the database (not in human-readable format).
     *
     * @return mixed
     */
    public function get_default_value() {
        return $this->get_field()->get_configdata_property('defaultvalue');
    }

    /**
     * Returns value in a human-readable format
     *
     * @return mixed|null value or null if empty
     */
    public function export_value() {
        $value = $this->get_value();
        if ($this->is_empty($value)) {
            return null;
        }

        return $value;
    }
}
