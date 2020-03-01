<?php

namespace Ree\kana\task;


use pocketmine\scheduler\AsyncTask;
use pocketmine\Server;

class TranslateEnglish extends AsyncTask
{
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $text;

	public function __construct(string $name, string $text)
	{
		$this->name = $name;
		$this->text = $text;
	}

	/**
	 * @inheritDoc
	 */
	public function onRun()
	{
		$url = 'https://script.google.com/macros/s/AKfycbz00c97OofTCTZ0WU3s4b5vQG__GtD2CVPVgT6mnMzRRPb-qJ9k/exec?text='.$this->text.'&source=ja&target=en';
		$context = stream_context_create(array(//参考 https://havelog.ayumusato.com/develop/php/e188-php_file_get_contents_tips.html
			'http' => array('ignore_errors' => true)
		));
		$result = file_get_contents($url, false, $context);
		$this->setResult($result);
	}

	/**
	 * @param Server $server
	 */
	public function onCompletion(Server $server)
	{
		$server->getAsyncPool()->submitTask(new TranslateJapanese($this->name,$this->text,$this->getResult()));
		parent::onCompletion($server);
	}
}