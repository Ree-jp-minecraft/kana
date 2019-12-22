<?php

namespace Ree\kana;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class main extends PluginBase implements Listener
{

	const ROME = [
		'BB','CC','DD','FF','GG','HH','JJ','KK','LL','MM','NN','PP','QQ','RR','SS','TT','VV','WW','XX','YY','ZZ',
			'KA','KI','KU','KE','KO',
			'GA','GI','GU','GE','GO',
			'KYA','KYI','KYU','KYE','KYO',
			'GYA','GYI','GYU','GYE','GYO',
			'SHA','SHI','SHU','SHE','SHO',
			'TSU','SA','SHI','SU','SE','SO',
			'ZA','ZI','ZU','ZE','ZO',
			'SYA','SYI','SYU','SYE','SYO',
			'JA','JI','JU','JE','JO',
			'ZYA','ZYI','ZYU','ZYE','ZYO',
			'XTU','LTU','TA','TI','TU','TE','TO',
			'DYA','DYI','DYU','DYE','DYO',
			'DHA','DHI','DHU','DHE','DHO',
			'DA','DI','DU','DE','DO',
			'CHA','CHI','CHU','CHE','CHO',
			'TYA','TYI','TYU','TYE','TYO',
			'NA','NI','NU','NE','NO',
			'NYA','NYI','NYU','NYE','NYO',
			'THA','THI','THU','THE','THO',
			'HA','HI','HU','HE','HO',
			'BA','BI','BU','BE','BO',
			'HYA','HYI','HYU','HYE','HYO',
			'BYA','BYI','BYU','BYE','BYO',
			'PA','PI','PU','PE','PO',
			'PYA','PYI','PYU','PYE','PYO',
			'MA','MI','MU','ME','MO',
			'MYA','MYI','MYU','MYE','MYO',
			'RYA','RYI','RYU','RYE','RYO',
			'YA','YI','YU','YE','YO',
			'RA','RI','RU','RE','RO',
			'WA','WI','WU','WE','WO',
			'SI','TI','TU',
			'XA','XI','XU','XE','XO',
			'LA','LI','LU','LE','LO',
			'VA','VI','VU','VE','VO',
			'FA','FI','FU','FE','FO',
			'QA','QI','QU','QE','QO',
			'A','I','U','E','O','N','-',',','.',':'
	];

	const KANA = [
		'っB','っC','っD','っF','っG','っH','っJ','っK','っL','っM','ん','っP','っQ','っR','っS','っT','っV','っW','っX','っY','っZ',
			'か','き','く','け','こ',
			'が','ぎ','ぐ','げ','ご',
			'きゃ','きぃ','きゅ','きぇ','きょ',
			'ぎゃ','ぎぃ','ぎゅ','ぎぇ','ぎょ',
			'しゃ','し','しゅ','しぇ','しょ',
			'つ','さ','し','す','せ','そ',
			'ざ','じ','ず','ぜ','ぞ',
			'しゃ','しぃ','しゅ','しぇ','しょ',
			'じゃ','じ','じゅ','じぇ','じょ',
			'じゃ','じぃ','じゅ','じぇ','じょ',
			'っ','っ','た','ち','つ','て','と',
			'ぢゃ','ぢぃ','ぢゅ','ぢぇ','ぢょ',
			'でゃ','でぃ','でゅ','でぇ','でぃ',
			'だ','ぢ','づ','で','ど',
			'ちゃ','ち','ちゅ','ちぇ','ちょ',
			'ちゃ','ちぃ','ちゅ','ちぇ','ちょ',
			'な','に','ぬ','ね','の',
			'にゃ','にぃ','にゅ','にぇ','にょ',
			'てゃ','てぃ','てゅ','てぇ','てょ',
			'は','ひ','ふ','へ','ほ',
			'ば','び','ぶ','べ','ぼ',
			'ひゃ','ひぃ','ひゅ','ひぇ','ひょ',
			'びゃ','びょ','びゅ','びぇ','びょ',
			'ぱ','ぴ','ぷ','ぺ','ぽ',
			'ぴゃ','ぴぃ','ぴゅ','ぴぇ','ぴょ',
			'ま','み','む','め','も',
			'みゃ','みぃ','みゅ','みぇ','みょ',
			'りゃ','りぃ','りゅ','りぇ','りょ',
			'や','い','ゆ','いぇ','よ',
			'ら','り','る','れ','ろ',
			'わ','うぃ','う','うぇ','を',
			'し','ち','つ',
			'ぁ','ぃ','ぅ','ぇ','ぉ',
			'ぁ','ぃ','ぅ','ぇ','ぉ',
			'ヴぁ','ヴぃ','ヴ','ヴぇ','ヴぉ',
			'ふぁ','ふぃ','ふ','ふぇ','ふぉ',
			'くぁ','くぃ','く','くぇ','くぉ',
			'あ','い','う','え','お','ん','ー','、','。','.'
	];


public function onEnable() {
		$this->getLogger()->info("このプラグインは開発段階なため,動作は保証できません");
		$this->getLogger()->info("バグ報告はこちらへ");
		$this->getLogger()->info("https://github.com/Ree-jp/kana/issues");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onChat(PlayerChatEvent $ev) {
		$bool = $this->isChange($ev->getPlayer());
		if ($bool) {
			$message = $ev->getMessage();
			$message = $this->onChange($message);
			$ev->setMessage($message . '  §6<' . $this->Transfer($message) . '>');
		}
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) :bool {
		if ($command == "kana") {
			if (!$sender instanceof Player) {
				$sender->sendMessage("§6>> §rコンソールでは使用不可なコマンドです");
			}
			$bool = $this->isChange($sender);
			if ($args[0] === "on") {
				if ($bool) {
					$sender->sendMessage("§6>> §rすでにonになっています");
				} else {
					$nbt = $sender->namedtag;
					$nbt->setInt("kanaChange", 1);
					$sender->sendMessage("§a>> §r自動変換機能を有効にしました");
				}
			} elseif ($args[0] == "off") {
				if ($bool) {
					$nbt = $sender->namedtag;
					$nbt->setInt("kanaChange", 0);
					$sender->sendMessage("§a>> §r自動変換機能を無効にしました");
				} else {
					$sender->sendMessage("§6>> §rすでにoffになっています");
				}
			} else {
				return false;
			}
		}
		return true;
	}

	/**
	 * @param string $message
	 *
	 * @return string
	 */
	private function Transfer(string $message) :string {
		$translateMessage  = str_ireplace(self::ROME, self::KANA, $message);
		return $translateMessage;
	}

	/**
	 * @param string $string
	 *
	 * @return mixed|string
	 */
	private function onChange(string $string) :string {
		$check = array(
			"§1",
			"§2",
			"§3",
			"§4",
			"§5",
			"§6",
			"§7",
			"§8",
			"§9",
			"§a",
			"§b",
			"§c",
			"§d",
			"§e",
			"§f",
			"§k",
			"§l",
			"§m",
			"§n",
			"§o",
			"§r"
		);
		$string = str_replace($check, "", $string);
		return $string;
	}

	private function isChange(Player $p) :bool {
		$nbt = $p->namedtag;
		if ($nbt->offsetExists("kanaChange")) {
			if ($nbt->getInt("kanaChange")) {
				return true;
			} else {
				return false;
			}
		} else {
			return true;
		}
	}
}