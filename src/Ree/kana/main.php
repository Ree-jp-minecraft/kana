<?php

namespace Ree\kana;

use pocketmine\event\player\PlayerChatEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class main extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getLogger()->info("このプラグインは開発段階なため,動作は保証できません");
		$this->getLogger()->info("バグ報告はこちらへ");
		$this->getLogger()->info("https://github.com/Ree-jp/kana/issues");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onChat(PlayerChatEvent $ev)
	{
		$message = $ev->getMessage();
		$message = $this->onChange($message);
		$ev->setMessage($message.' §6<'.$this->Transfer($message).'>');
	}

	/**
	 * @param string $message
	 * @return string
	 */
	private function Transfer(string $message): string
	{
		$message = str_replace("nn" ,"ん" ,$message);
		$message = str_replace("tt" ,"っt" ,$message);

		$message = str_replace("kya" ,"きゃ" ,$message);
		$message = str_replace("kyu" ,"きゅ" ,$message);
		$message = str_replace("kyo" ,"きょ" ,$message);
		$message = str_replace("sya" ,"しゃ" ,$message);
		$message = str_replace("syu" ,"しゅ" ,$message);
		$message = str_replace("syo" ,"しょ" ,$message);
		$message = str_replace("tya" ,"ちゃ" ,$message);
		$message = str_replace("tyu" ,"ちゅ" ,$message);
		$message = str_replace("tyo" ,"ちょ" ,$message);
		$message = str_replace("nya" ,"にゃ" ,$message);
		$message = str_replace("nyu" ,"にゅ" ,$message);
		$message = str_replace("nyo" ,"にょ" ,$message);
		$message = str_replace("hya" ,"ひゃ" ,$message);
		$message = str_replace("hyu" ,"ひゅ" ,$message);
		$message = str_replace("hyo" ,"ひょ" ,$message);
		$message = str_replace("mya" ,"みゃ" ,$message);
		$message = str_replace("myu" ,"みゅ" ,$message);
		$message = str_replace("myo" ,"みょ" ,$message);
		$message = str_replace("rya" ,"りゃ" ,$message);
		$message = str_replace("ryu" ,"りゅ" ,$message);
		$message = str_replace("ryo" ,"りょ" ,$message);

		$message = str_replace("ka" ,"か" ,$message);
		$message = str_replace("ki" ,"き" ,$message);
		$message = str_replace("ku" ,"く" ,$message);
		$message = str_replace("ke" ,"け" ,$message);
		$message = str_replace("ko" ,"こ" ,$message);
		$message = str_replace("sa" ,"さ" ,$message);
		$message = str_replace("si" ,"し" ,$message);
		$message = str_replace("su" ,"す" ,$message);
		$message = str_replace("se" ,"せ" ,$message);
		$message = str_replace("so" ,"そ" ,$message);
		$message = str_replace("ta" ,"た" ,$message);
		$message = str_replace("ti" ,"ち" ,$message);
		$message = str_replace("tu" ,"つ" ,$message);
		$message = str_replace("te" ,"て" ,$message);
		$message = str_replace("to" ,"と" ,$message);
		$message = str_replace("na" ,"な" ,$message);
		$message = str_replace("ni" ,"に" ,$message);
		$message = str_replace("nu" ,"ぬ" ,$message);
		$message = str_replace("ne" ,"ね" ,$message);
		$message = str_replace("no" ,"の" ,$message);
		$message = str_replace("ha" ,"は" ,$message);
		$message = str_replace("hi" ,"ひ" ,$message);
		$message = str_replace("hu" ,"ふ" ,$message);
		$message = str_replace("he" ,"へ" ,$message);
		$message = str_replace("ho" ,"ほ" ,$message);
		$message = str_replace("ma" ,"ま" ,$message);
		$message = str_replace("mi" ,"み" ,$message);
		$message = str_replace("mu" ,"む" ,$message);
		$message = str_replace("me" ,"め" ,$message);
		$message = str_replace("mo" ,"も" ,$message);
		$message = str_replace("ya" ,"や" ,$message);
		$message = str_replace("yu" ,"ゆ" ,$message);
		$message = str_replace("yo" ,"よ" ,$message);
		$message = str_replace("ra" ,"ら" ,$message);
		$message = str_replace("ri" ,"り" ,$message);
		$message = str_replace("ru" ,"る" ,$message);
		$message = str_replace("re" ,"れ" ,$message);
		$message = str_replace("ro" ,"ろ" ,$message);
		$message = str_replace("wa" ,"わ" ,$message);
		$message = str_replace("wo" ,"を" ,$message);

		$message = str_replace("ga" ,"が" ,$message);
		$message = str_replace("gi" ,"ぎ" ,$message);
		$message = str_replace("gu" ,"ぐ" ,$message);
		$message = str_replace("ge" ,"げ" ,$message);
		$message = str_replace("go" ,"ご" ,$message);
		$message = str_replace("za" ,"ざ" ,$message);
		$message = str_replace("zi" ,"じ" ,$message);
		$message = str_replace("zu" ,"ず" ,$message);
		$message = str_replace("ze" ,"ぜ" ,$message);
		$message = str_replace("zo" ,"ぞ" ,$message);
		$message = str_replace("da" ,"だ" ,$message);
		$message = str_replace("di" ,"ぢ" ,$message);
		$message = str_replace("du" ,"づ" ,$message);
		$message = str_replace("de" ,"で" ,$message);
		$message = str_replace("do" ,"ど" ,$message);
		$message = str_replace("ba" ,"ば" ,$message);
		$message = str_replace("bi" ,"び" ,$message);
		$message = str_replace("bu" ,"ぶ" ,$message);
		$message = str_replace("be" ,"べ" ,$message);
		$message = str_replace("bo" ,"ぼ" ,$message);

		$message = str_replace("pa" ,"ぱ" ,$message);
		$message = str_replace("pi" ,"ぴ" ,$message);
		$message = str_replace("pu" ,"ぷ" ,$message);
		$message = str_replace("pe" ,"ぺ" ,$message);
		$message = str_replace("po" ,"ぽ" ,$message);

		$message = str_replace("a" ,"あ" ,$message);
		$message = str_replace("i" ,"い" ,$message);
		$message = str_replace("u" ,"う" ,$message);
		$message = str_replace("e" ,"え" ,$message);
		$message = str_replace("o" ,"お" ,$message);

		return $message;
	}

	/**
	 * @param string $string
	 * @return mixed|string
	 */
	private function onChange(string $string): string
	{
		$check = array("§1", "§2", "§3", "§4", "§5", "§6", "§7", "§8", "§9", "§a", "§b", "§c", "§d", "§e" ,"§f" ,"§k", "§l", "§m", "§n" ,"§o", "§r");
		$string = str_replace($check ,"" ,$string);
		return $string;
	}
}