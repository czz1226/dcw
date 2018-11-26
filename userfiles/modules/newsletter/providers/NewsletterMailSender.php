<?php

class NewsletterMailSender {
	
	public $campaign;
	public $template;
	public $sender;
	public $subscriber;
	
	public function setCampaign($campaign) {
		$this->campaign = $campaign;
	}
	public function setTemplate($template) {
		$this->template = $template;
	}
	public function setSender($sender) {
		$this->sender = $sender;
	}
	public function setSubscriber($subscriber) {
		$this->subscriber = $subscriber;
	}
	
	public function sendMail() {
		
		try {
			// Create the Transport
			$transport = (new Swift_SmtpTransport($sender['smtp_host'], $sender['smtp_port']))
			->setUsername($sender['smtp_username'])
			->setPassword($sender['smtp_password']);
			
			// Create the Mailer using your created Transport
			$mailer = new Swift_Mailer($transport);
			
			// Create a message
			$message = (new Swift_Message($campaign['subject']))
			->setFrom([$sender['from_email'] => $campaign['name']])
			->setTo([$subscriber['email'], $sender['reply_email'] => $subscriber['name']])
			->setBody($template['text']);
			
			// Send the message
			$result = $mailer->send($message);
			
		} catch (Exception $e) {
			$result = $e->getMessage();
		}
		
		return $result;
		
	}
}