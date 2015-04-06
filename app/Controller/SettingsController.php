<?php

/**
 * Settings Controller
 * @website: all settings will go here
 */

App::uses('Sanitize', 'Utility');

class SettingsController extends AppController {
	

	public function admin_manage_settings() {

		// check if admin or not
		$this->is_admin_loggedin();

		$this->layout = "admin_layout";

		if (!empty($this->request->data)) {			
			$setting = $this->_getSettings();
			foreach ($this->request->data['Setting'] as $key => $value) {
				if (array_key_exists($key, $setting) && $setting[$key] != $value) {
					$this->Setting->updateAll(array('value' => '"' . Sanitize::escape($value) . '"'), array('field' => $key));
				}
			}
			$this->Session->setFlash('Changes have been saved');
			$this->redirect($this->request->referer());
		}
		
		$this->set('title_for_layout', __('System Settings'));
	}

}
