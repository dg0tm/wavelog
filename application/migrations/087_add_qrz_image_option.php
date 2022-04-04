<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Migration_create_eqsl_images_table
 *
 * Creates a boolean column with option to allow for activating showing of
 * qrz.com profile picture in the log QSO section
 * 
 */

class Migration_add_qrz_image_option extends CI_Migration {

        public function up()
        {
                if (!$this->db->field_exists('show_qrz_image', 'users')) {
                        $fields = array(
                                'show_qrz_image BOOLEAN DEFAULT FALSE',
                        );
                        $this->dbforge->add_column('users', $fields);
                }
        }

        public function down()
        {
                $this->dbforge->drop_column('users', 'show_qrz_image');
        }
}
