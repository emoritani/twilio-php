<?php

class Services_Twilio_Rest_TaskRouter_TaskQueue extends Services_Twilio_TaskRouterInstanceResource {

	protected function init($client, $uri) {
		$this->setupSubresource('statistics', 'task_queue_statistics');
	}

	protected function setupSubresource($name, $type) {
		$constantizedType = ucfirst(self::camelize($type));
		$constantizedName = ucfirst(self::camelize($name));
		$type = "Services_Twilio_Rest_TaskRouter_" . $constantizedType;
		$this->subresources[$name] = new $type(
			$this->client, $this->uri . "/". $constantizedName
		);
	}
}
