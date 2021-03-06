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
* @category  Controller
* @package   Open-AudIT
* @author    Mark Unwin <marku@opmantek.com>
* @copyright 2014 Opmantek
* @license   http://www.gnu.org/licenses/agpl-3.0.html aGPL v3
* @version   2.0.2

* @link      http://www.open-audit.org
*/

/**
* Base Object Files
*
* @access   public
* @category Object
* @package  Open-AudIT
* @author   Mark Unwin <marku@opmantek.com>
* @license  http://www.gnu.org/licenses/agpl-3.0.html aGPL v3
* @link     http://www.open-audit.org
 */
class Help extends MY_Controller
{
    /**
    * Constructor
    *
    * @access    public
    */
    public function __construct()
    {
        parent::__construct();
        // log the attempt
        $log = new stdClass();
        $log->status = 'start';
        $log->function = strtolower(__METHOD__);
        stdlog($log);

        // ensure our URL doesn't have a trailing / as this may break image (and other) relative paths
        $this->load->helper('url');
        if (strrpos($this->input->server('REQUEST_URI'), '/') === strlen($this->input->server('REQUEST_URI'))-1) {
            redirect(uri_string());
        }
        $this->load->helper('input');
        $this->load->helper('output');
        $this->load->helper('error');
        $this->load->model('m_files');
        $this->load->model('m_orgs');
        $this->output->url = $this->config->item('oa_web_index');


        # Nasty hack to be removed because we don't call readInput()
        $this->response = new stdClass();
        $this->response->included = array();
        $enterprise_report = new stdClass();
        $enterprise_report->id =  "10000";
        $enterprise_report->links = new stdClass();
        $enterprise_report->links->self = "/omk/oae/reports/10000";
        $enterprise_report->type = "reports";
        $enterprise_report->attributes = new stdClass();
        $enterprise_report->attributes->id = "10000";
        $enterprise_report->attributes->description = "";
        $enterprise_report->attributes->menu_category = "Discovery";
        $enterprise_report->attributes->menu_display = "y";
        $enterprise_report->attributes->name = "Devices Discovered Today";
        $this->response->included[] = $enterprise_report;
        unset($enterprise_report);
        $enterprise_report = new stdClass();
        $enterprise_report->id =  "10001";
        $enterprise_report->links = new stdClass();
        $enterprise_report->links->self = "/omk/oae/reports/10001";
        $enterprise_report->type = "reports";
        $enterprise_report->attributes = new stdClass();
        $enterprise_report->attributes->id = "10001";
        $enterprise_report->attributes->description = "";
        $enterprise_report->attributes->menu_category = "Discovery";
        $enterprise_report->attributes->menu_display = "y";
        $enterprise_report->attributes->name = "Devices Discovered Yesterday";
        $this->response->included[] = $enterprise_report;
        unset($enterprise_report);
        $enterprise_report = new stdClass();
        $enterprise_report->id =  "10002";
        $enterprise_report->links = new stdClass();
        $enterprise_report->links->self = "/omk/oae/reports/10002";
        $enterprise_report->type = "reports";
        $enterprise_report->attributes = new stdClass();
        $enterprise_report->attributes->id = "10002";
        $enterprise_report->attributes->description = "";
        $enterprise_report->attributes->menu_category = "Discovery";
        $enterprise_report->attributes->menu_display = "y";
        $enterprise_report->attributes->name = "Devices Discovered in the Last 7 Days";
        $this->response->included[] = $enterprise_report;
        unset($enterprise_report);
        $enterprise_report = new stdClass();
        $enterprise_report->id =  "10003";
        $enterprise_report->links = new stdClass();
        $enterprise_report->links->self = "/omk/oae/reports/10003";
        $enterprise_report->type = "reports";
        $enterprise_report->attributes = new stdClass();
        $enterprise_report->attributes->id = "10003";
        $enterprise_report->attributes->description = "";
        $enterprise_report->attributes->menu_category = "Discovery";
        $enterprise_report->attributes->menu_display = "y";
        $enterprise_report->attributes->name = "Devices Discovered in the Last 30 Days";
        $this->response->included[] = $enterprise_report;
        unset($enterprise_report);
        $enterprise_report = new stdClass();
        $enterprise_report->id =  "20000";
        $enterprise_report->links = new stdClass();
        $enterprise_report->links->self = "/omk/oae/reports/20000";
        $enterprise_report->type = "reports";
        $enterprise_report->attributes = new stdClass();
        $enterprise_report->attributes->id = "20000";
        $enterprise_report->attributes->description = "";
        $enterprise_report->attributes->menu_category = "Discovery";
        $enterprise_report->attributes->menu_display = "y";
        $enterprise_report->attributes->name = "Software Discovered Today";
        $this->response->included[] = $enterprise_report;
        unset($enterprise_report);
        $enterprise_report = new stdClass();
        $enterprise_report->id =  "20001";
        $enterprise_report->links = new stdClass();
        $enterprise_report->links->self = "/omk/oae/reports/20001";
        $enterprise_report->type = "reports";
        $enterprise_report->attributes = new stdClass();
        $enterprise_report->attributes->id = "20001";
        $enterprise_report->attributes->description = "";
        $enterprise_report->attributes->menu_category = "Discovery";
        $enterprise_report->attributes->menu_display = "y";
        $enterprise_report->attributes->name = "Software Discovered Yesterday";
        $this->response->included[] = $enterprise_report;
        unset($enterprise_report);
        $enterprise_report = new stdClass();
        $enterprise_report->id =  "20002";
        $enterprise_report->links = new stdClass();
        $enterprise_report->links->self = "/omk/oae/reports/20002";
        $enterprise_report->type = "reports";
        $enterprise_report->attributes = new stdClass();
        $enterprise_report->attributes->id = "20002";
        $enterprise_report->attributes->description = "";
        $enterprise_report->attributes->menu_category = "Discovery";
        $enterprise_report->attributes->menu_display = "y";
        $enterprise_report->attributes->name = "Software Discovered in the Last 7 Days";
        $this->response->included[] = $enterprise_report;
        unset($enterprise_report);
        $enterprise_report = new stdClass();
        $enterprise_report->id =  "20003";
        $enterprise_report->links = new stdClass();
        $enterprise_report->links->self = "/omk/oae/reports/20003";
        $enterprise_report->type = "reports";
        $enterprise_report->attributes = new stdClass();
        $enterprise_report->attributes->id = "20003";
        $enterprise_report->attributes->description = "";
        $enterprise_report->attributes->menu_category = "Discovery";
        $enterprise_report->attributes->menu_display = "y";
        $enterprise_report->attributes->name = "Software Discovered in the Last 30 Days";
        $this->response->included[] = $enterprise_report;
        unset($enterprise_report);
        $enterprise_report = new stdClass();
        $enterprise_report->id =  "30000";
        $enterprise_report->links = new stdClass();
        $enterprise_report->links->self = "/omk/oae/reports/30000";
        $enterprise_report->type = "reports";
        $enterprise_report->attributes = new stdClass();
        $enterprise_report->attributes->id = "30001";
        $enterprise_report->attributes->description = "";
        $enterprise_report->attributes->menu_category = "Discovery";
        $enterprise_report->attributes->menu_display = "y";
        $enterprise_report->attributes->name = "Devices Not Seen for 7 Days";
        $this->response->included[] = $enterprise_report;
        unset($enterprise_report);
        $enterprise_report = new stdClass();
        $enterprise_report->id =  "30001";
        $enterprise_report->links = new stdClass();
        $enterprise_report->links->self = "/omk/oae/reports/30001";
        $enterprise_report->type = "reports";
        $enterprise_report->attributes = new stdClass();
        $enterprise_report->attributes->id = "30002";
        $enterprise_report->attributes->description = "";
        $enterprise_report->attributes->menu_category = "Discovery";
        $enterprise_report->attributes->menu_display = "y";
        $enterprise_report->attributes->name = "Devices Not Seen for 30 Days";
        $this->response->included[] = $enterprise_report;
        unset($enterprise_report);
        $enterprise_report = new stdClass();
        $enterprise_report->id =  "30002";
        $enterprise_report->links = new stdClass();
        $enterprise_report->links->self = "/omk/oae/reports/30002";
        $enterprise_report->type = "reports";
        $enterprise_report->attributes = new stdClass();
        $enterprise_report->attributes->id = "30003";
        $enterprise_report->attributes->description = "";
        $enterprise_report->attributes->menu_category = "Discovery";
        $enterprise_report->attributes->menu_display = "y";
        $enterprise_report->attributes->name = "Devices Not Seen for 90 Days";
        $this->response->included[] = $enterprise_report;
        unset($enterprise_report);
        $enterprise_report = new stdClass();
        $enterprise_report->id =  "30003";
        $enterprise_report->links = new stdClass();
        $enterprise_report->links->self = "/omk/oae/reports/30003";
        $enterprise_report->type = "reports";
        $enterprise_report->attributes = new stdClass();
        $enterprise_report->attributes->id = "30004";
        $enterprise_report->attributes->description = "";
        $enterprise_report->attributes->menu_category = "Discovery";
        $enterprise_report->attributes->menu_display = "y";
        $enterprise_report->attributes->name = "Devices Not Seen for 180 Days";
        $this->response->included[] = $enterprise_report;
        unset($enterprise_report);

        $this->load->model('m_queries');
        $this->load->model('m_summaries');
        $result = $this->m_queries->collection();
        $this->response->included = array_merge($this->response->included, $result);
        $result = $this->m_summaries->collection();
        $this->response->included = array_merge($this->response->included, $result);
    }

    /**
    * Index that is unused
    *
    * @access public
    * @return NULL
    */
    public function index()
    {
        $this->data['include'] = 'v_help_index';
        $this->load->view('v_template', $this->data);
    }

    /**
    * Our groups help
    *
    * @access public
    * @return NULL
    */
    function groups()
    {
        $this->data['include'] = 'v_help_groups';
        $this->load->view('v_template', $this->data);
    }

    /**
    * Our queries help
    *
    * @access public
    * @return NULL
    */
    function queries()
    {
        $this->data['include'] = 'v_help_queries';
        $this->load->view('v_template', $this->data);
    }

    /**
    * Our statistics help
    *
    * @access public
    * @return NULL
    */
    function statistics()
    {
        $this->data['include'] = 'v_help_statistics';
        $this->load->view('v_template', $this->data);
    }

    /**
    * Our summaries help
    *
    * @access public
    * @return NULL
    */
    function summaries()
    {
        $this->data['include'] = 'v_help_summaries';
        $this->load->view('v_template', $this->data);
    }

    /**
    * Our support help
    *
    * @access public
    * @return NULL
    */
    function support()
    {
        $this->data['include'] = 'v_help_support';
        $this->load->view('v_template', $this->data);
    }

    /**
    * Our opMaps help
    *
    * @access public
    * @return NULL
    */
    function enterprise()
    {
        $this->data['include'] = 'v_help_enterprise';
        $this->load->view('v_template', $this->data);
    }

}
// End of file help.php
// Location: ./controllers/help.php
