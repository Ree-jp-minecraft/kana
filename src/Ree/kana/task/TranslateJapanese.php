<?php

namespace Ree\kana\task;


use pocketmine\scheduler\AsyncTask;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class TranslateJapanese extends AsyncTask
{
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $oldText;

	/**
	 * @var string
	 */
	private $text;

	public function __construct(string $name, string $oldText, string $text)
	{
		$this->name = $name;
		$this->oldText = $oldText;
		$this->text = $text;
	}

	/**
	 * @inheritDoc
	 */
	public function onRun()
	{
		$url = 'https://script.google.com/macros/s/AKfycbz00c97OofTCTZ0WU3s4b5vQG__GtD2CVPVgT6mnMzRRPb-qJ9k/exec?text=' . rawurlencode($this->text) . '&source=en&target=ja';
		$context = stream_context_create(array(
			'http' => array('ignore_errors' => true),
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false
			)));
		$result = file_get_contents($url, false, $context);
		if (mb_strlen($result) === 1551) {
			$result = '[Translate Bad Request] '.$this->oldText;
		}
		$this->setResult($result);
	}

	/**
	 * @param Server $server
	 */
	public function onCompletion(Server $server)
	{
		$server->broadcastMessage($this->name . ' ' . $this->oldText . TextFormat::GOLD. '   <' . $this->getResult() . '>');
		parent::onCompletion($server);
	}
}