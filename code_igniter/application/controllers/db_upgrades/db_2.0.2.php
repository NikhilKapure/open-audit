<?php
/**
#  Copyright 2003-2015 Opmantek Limited (www.opmantek.com)
#
#  ALL CODE MODIFICATIONS MUST BE SENT TO CODE@OPMANTEK.COM
#
#  This file is part of Open-AudIT.
#
#  Open-AudIT is free software: you can redistribute it and/or modify
#  it under the terms of the GNU Affero General Public License as published
#  by the Free Software Foundation, either version 3 of the License, or
#  (at your option) any later version.
#
#  Open-AudIT is distributed in the hope that it will be useful,
#  but WITHOUT ANY WARRANTY; without even the implied warranty of
#  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#  GNU Affero General Public License for more details.
#
#  You should have received a copy of the GNU Affero General Public License
#  along with Open-AudIT (most likely in a file named LICENSE).
#  If not, see <http://www.gnu.org/licenses/>
#
#  For further information on Open-AudIT or for a license other than AGPL please see
#  www.opmantek.com or email contact@opmantek.com
#
# *****************************************************************************
*
**/

$this->log_db('Upgrade database to 2.0.2 commenced');

# connections
$this->alter_table('connections', 'description', "ADD `description` TEXT NOT NULL AFTER `name`", 'add');

# discoveries
$this->alter_table('discoveries', 'complete', "`complete` enum('y','n') NOT NULL DEFAULT 'y'");

# tasks
$this->drop_table('tasks');

$sql = "CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `org_id` int(10) unsigned NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  `uuid` varchar(100) NOT NULL DEFAULT '',
  `enabled` enum('y','n') NOT NULL DEFAULT 'y',
  `type` varchar(100) NOT NULL DEFAULT 'command',
  `minute` varchar(100) NOT NULL DEFAULT '*',
  `hour` varchar(100) NOT NULL DEFAULT '*',
  `day_of_month` varchar(100) NOT NULL DEFAULT '*',
  `month` varchar(100) NOT NULL DEFAULT '*',
  `day_of_week` varchar(100) NOT NULL DEFAULT '*',
  `delay_minutes` int unsigned NOT NULL DEFAULT '0',
  `expire_minutes` int unsigned NOT NULL DEFAULT '0',
  `first_run` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `last_run` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `edited_by` varchar(200) NOT NULL DEFAULT '',
  `edited_date` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `options` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";
$this->db->query($sql);
$this->log_db($this->db->last_query());

# set our versions
$sql = "UPDATE `configuration` SET `value` = '20170701' WHERE `name` = 'internal_version'";
$this->db->query($sql);
$this->log_db($this->db->last_query());

$sql = "UPDATE `configuration` SET `value` = '2.0.2' WHERE `name` = 'display_version'";
$this->db->query($sql);
$this->log_db($this->db->last_query());

#$this->db->db_debug = $temp_debug;
$this->log_db("Upgrade database to 2.0.2 completed");
$this->config->config['internal_version'] = '20170701';
$this->config->config['display_version'] = '2.0.2';