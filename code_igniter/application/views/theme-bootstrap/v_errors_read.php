<?php
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

/**
 * @author Mark Unwin <marku@opmantek.com>
 *
 * @version   2.0.2

 *
 * @copyright Copyright (c) 2014, Opmantek
 * @license http://www.gnu.org/licenses/agpl-3.0.html aGPL v3
 */
$item = $this->response->data[0];
?>
<form class="form-horizontal" id="form_update" method="post" action="#">
    <div class="panel panel-default">
        <?php include('include_read_panel_header.php'); ?>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="code" class="col-sm-3 control-label">Code</label>
                        <div class="col-sm-8 input-group">
                            <input type="text" class="form-control" id="code" name="code" value="<?php echo htmlspecialchars($item->attributes->code, REPLACE_FLAGS, CHARSET); ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-8 input-group">
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($item->attributes->title, REPLACE_FLAGS, CHARSET); ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-8 input-group">
                            <input type="text" class="form-control" id="status" name="status" value="<?php echo htmlspecialchars($item->attributes->status, REPLACE_FLAGS, CHARSET); ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="severity" class="col-sm-3 control-label">Severity</label>
                        <div class="col-sm-8 input-group">
                            <input type="text" class="form-control" id="severity" name="severity" value="<?php echo htmlspecialchars($item->attributes->severity, REPLACE_FLAGS, CHARSET); ?> (<?php echo htmlspecialchars($item->attributes->severity_text, REPLACE_FLAGS, CHARSET); ?>)" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status_code" class="col-sm-3 control-label">Status Code</label>
                        <div class="col-sm-8 input-group">
                            <input type="text" class="form-control" id="status_code" name="status_code" value="<?php echo htmlspecialchars($item->attributes->status_code, REPLACE_FLAGS, CHARSET); ?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                <strong><?php echo __("Detail"); ?></strong>
                    <p><?php echo htmlspecialchars($item->attributes->detail, REPLACE_FLAGS, CHARSET); ?></p>
                </div>


            </div>
        </div>
    </div>
</form>

<script type='text/javascript'>
var roles = JSON.parse('<?php echo json_encode($this->user->roles); ?>');
</script>