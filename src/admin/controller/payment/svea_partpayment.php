<?php
class ControllerPaymentsveapartpayment extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('payment/svea_partpayment');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting('svea_partpayment', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect(HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token']);
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_all_zones'] = $this->language->get('text_all_zones');

		$this->data['entry_order_status'] = $this->language->get('entry_order_status');
		$this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		$this->data['tab_general'] = $this->language->get('tab_general');

        //Credentials
        $this->data['entry_username']      = $this->language->get('entry_username');
        $this->data['entry_password']      = $this->language->get('entry_password');
        $this->data['entry_clientno']      = $this->language->get('entry_clientno');

        $this->data['entry_sweden']        = $this->language->get('entry_sweden');
        $this->data['entry_finland']       = $this->language->get('entry_finland');
        $this->data['entry_denmark']       = $this->language->get('entry_denmark');
        $this->data['entry_norway']        = $this->language->get('entry_norway');
        $this->data['entry_germany']       = $this->language->get('entry_germany');
        $this->data['entry_netherlands']   = $this->language->get('entry_netherlands');

        $this->data['entry_testmode']      = $this->language->get('entry_testmode');
        $this->data['entry_yes']           = $this->language->get('entry_yes');
        $this->data['entry_no']            = $this->language->get('entry_no');
        $this->data['entry_min_amount']    = $this->language->get('entry_min_amount');

        $this->data['version']             = floatval(VERSION);

        $cred = array();
        $cred[] = array("lang" => "SE","value_username" => $this->config->get('svea_partpayment_username_SE'),"name_username" => 'svea_partpayment_username_SE',"value_password" => $this->config->get('svea_partpayment_password_SE'),"name_password" => 'svea_partpayment_password_SE',"value_clientno" => $this->config->get('svea_partpayment_clientno_SE'),"name_clientno" => 'svea_partpayment_clientno_SE',"min_amount_name" => 'svea_partpayment_min_amount_SE',"min_amount_value" => $this->config->get('svea_partpayment_min_amount_SE'));
        $cred[] = array("lang" => "NO","value_username" => $this->config->get('svea_partpayment_username_NO'),"name_username" => 'svea_partpayment_username_NO',"value_password" => $this->config->get('svea_partpayment_password_NO'),"name_password" => 'svea_partpayment_password_NO',"value_clientno" => $this->config->get('svea_partpayment_clientno_NO'),"name_clientno" => 'svea_partpayment_clientno_NO',"min_amount_name" => 'svea_partpayment_min_amount_NO',"min_amount_value" => $this->config->get('svea_partpayment_min_amount_NO'));
        $cred[] = array("lang" => "FI","value_username" => $this->config->get('svea_partpayment_username_FI'),"name_username" => 'svea_partpayment_username_FI',"value_password" => $this->config->get('svea_partpayment_password_FI'),"name_password" => 'svea_partpayment_password_FI',"value_clientno" => $this->config->get('svea_partpayment_clientno_FI'),"name_clientno" => 'svea_partpayment_clientno_FI',"min_amount_name" => 'svea_partpayment_min_amount_FI',"min_amount_value" => $this->config->get('svea_partpayment_min_amount_FI'));
        $cred[] = array("lang" => "DK","value_username" => $this->config->get('svea_partpayment_username_DK'),"name_username" => 'svea_partpayment_username_DK',"value_password" => $this->config->get('svea_partpayment_password_DK'),"name_password" => 'svea_partpayment_password_DK',"value_clientno" => $this->config->get('svea_partpayment_clientno_DK'),"name_clientno" => 'svea_partpayment_clientno_DK',"min_amount_name" => 'svea_partpayment_min_amount_DK',"min_amount_value" => $this->config->get('svea_partpayment_min_amount_DK'));
        $cred[] = array("lang" => "NL","value_username" => $this->config->get('svea_partpayment_username_NL'),"name_username" => 'svea_partpayment_username_NL',"value_password" => $this->config->get('svea_partpayment_password_NL'),"name_password" => 'svea_partpayment_password_NL',"value_clientno" => $this->config->get('svea_partpayment_clientno_NL'),"name_clientno" => 'svea_partpayment_clientno_NL',"min_amount_name" => 'svea_partpayment_min_amount_NL',"min_amount_value" => $this->config->get('svea_partpayment_min_amount_NL'));
        $cred[] = array("lang" => "DE","value_username" => $this->config->get('svea_partpayment_username_DE'),"name_username" => 'svea_partpayment_username_DE',"value_password" => $this->config->get('svea_partpayment_password_DE'),"name_password" => 'svea_partpayment_password_DE',"value_clientno" => $this->config->get('svea_partpayment_clientno_DE'),"name_clientno" => 'svea_partpayment_clientno_DE',"min_amount_name" => 'svea_partpayment_min_amount_DE',"min_amount_value" => $this->config->get('svea_partpayment_min_amount_DE'));

        $this->data['credentials'] = $cred;


        /**
        //Definitions settings SE
        $this->data['svea_partpayment_username_SE']   = $this->config->get('svea_partpayment_username_SE');
        $this->data['svea_partpayment_password_SE']   = $this->config->get('svea_partpayment_password_SE');
        $this->data['svea_partpayment_clientno_SE']   = $this->config->get('svea_partpayment_clientno_SE');
        $this->data['svea_partpayment_min_amount_SE'] = $this->config->get('svea_partpayment_min_amount_SE');

        //Definitions settings FI
        $this->data['svea_partpayment_username_FI']   = $this->config->get('svea_partpayment_username_FI');
        $this->data['svea_partpayment_password_FI']   = $this->config->get('svea_partpayment_password_FI');
        $this->data['svea_partpayment_clientno_FI']   = $this->config->get('svea_partpayment_clientno_FI');
        $this->data['svea_partpayment_min_amount_FI'] = $this->config->get('svea_partpayment_min_amount_FI');

        //Definitions settings DK
        $this->data['svea_partpayment_username_DK']   = $this->config->get('svea_partpayment_username_DK');
        $this->data['svea_partpayment_password_DK']   = $this->config->get('svea_partpayment_password_DK');
        $this->data['svea_partpayment_clientno_DK']   = $this->config->get('svea_partpayment_clientno_DK');
        $this->data['svea_partpayment_min_amount_DK'] = $this->config->get('svea_partpayment_min_amount_DK');

        //Definitions settings NO
        $this->data['svea_partpayment_username_NO']   = $this->config->get('svea_partpayment_username_NO');
        $this->data['svea_partpayment_password_NO']   = $this->config->get('svea_partpayment_password_NO');
        $this->data['svea_partpayment_clientno_NO']   = $this->config->get('svea_partpayment_clientno_NO');
        $this->data['svea_partpayment_min_amount_NO'] = $this->config->get('svea_partpayment_min_amount_NO');

        //Definitions settings NL
        $this->data['svea_partpayment_username_NL']   = $this->config->get('svea_partpayment_username_NL');
        $this->data['svea_partpayment_password_NL']   = $this->config->get('svea_partpayment_password_NL');
        $this->data['svea_partpayment_clientno_NL']   = $this->config->get('svea_partpayment_clientno_NL');
        $this->data['svea_partpayment_min_amount_NL'] = $this->config->get('svea_partpayment_min_amount_NL');

        //Definitions settings DE
        $this->data['svea_partpayment_username_DE']   = $this->config->get('svea_partpayment_username_DE');
        $this->data['svea_partpayment_password_DE']   = $this->config->get('svea_partpayment_password_DE');
        $this->data['svea_partpayment_clientno_DE']   = $this->config->get('svea_partpayment_clientno_DE');
        $this->data['svea_partpayment_min_amount_DE'] = $this->config->get('svea_partpayment_min_amount_DE');
         *
         */


        $this->data['svea_partpayment_sort_order']    = $this->config->get('svea_partpayment_sort_order');
        $this->data['svea_partpayment_testmode']      = $this->config->get('svea_partpayment_testmode');


 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

  		$this->document->breadcrumbs = array();

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=common/home&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('text_home'),
      		'separator' => FALSE
   		);

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('text_payment'),
      		'separator' => ' :: '
   		);

   		$this->document->breadcrumbs[] = array(
       		'href'      => HTTPS_SERVER . 'index.php?route=payment/svea_partpayment&token=' . $this->session->data['token'],
       		'text'      => $this->language->get('heading_title'),
      		'separator' => ' :: '
   		);

		$this->data['action'] = HTTPS_SERVER . 'index.php?route=payment/svea_partpayment&token=' . $this->session->data['token'];

		$this->data['cancel'] = HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token'];

		if (isset($this->request->post['svea_partpayment_order_status_id'])) {
			$this->data['svea_partpayment_order_status_id'] = $this->request->post['svea_partpayment_order_status_id'];
		} else {
			$this->data['svea_partpayment_order_status_id'] = $this->config->get('svea_partpayment_order_status_id');
		}

		$this->load->model('localisation/order_status');

		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (isset($this->request->post['svea_partpayment_geo_zone_id'])) {
			$this->data['svea_partpayment_geo_zone_id'] = $this->request->post['svea_partpayment_geo_zone_id'];
		} else {
			$this->data['svea_partpayment_geo_zone_id'] = $this->config->get('svea_partpayment_geo_zone_id');
		}

		$this->load->model('localisation/geo_zone');

		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post['svea_partpayment_status'])) {
			$this->data['svea_partpayment_status'] = $this->request->post['svea_partpayment_status'];
		} else {
			$this->data['svea_partpayment_status'] = $this->config->get('svea_partpayment_status');
		}

		if (isset($this->request->post['svea_partpayment_sort_order'])) {
			$this->data['svea_partpayment_sort_order'] = $this->request->post['svea_partpayment_sort_order'];
		} else {
			$this->data['svea_partpayment_sort_order'] = $this->config->get('svea_partpayment_sort_order');
		}

        if (isset($this->request->post['svea_testmode'])) {
			$this->data['svea_partpayment_testmode'] = $this->request->post['svea_partpayment_testmode'];
		} else {
			$this->data['svea_partpayment_testmode'] = $this->config->get('svea_partpayment_testmode');
		}

		$this->template = 'payment/svea_partpayment.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'payment/svea_partpayment')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
?>
