<?
/**
 * Copyright (c) 30/1/2020 Created By/Edited By ASDAFF asdaff.asad@yandex.ru
 */

if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="collect-cfeedback">
<?if(!empty($arResult["ERROR_MESSAGE"])):
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
endif;

if(strlen($arResult["OK_MESSAGE"]) > 0):
	?><div class="collect-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
else:
?>

<form action="<?=$APPLICATION->GetCurPage()?>" method="POST">
<?=bitrix_sessid_post()?>
	<table class="collect-tab-form">

		<?if ($arParams["USE_FIELD_NAME"]=="Y"):?>
			<tr><td class="collect-field-label"><?=$arParams["FIELD_NAME_TITLE"]?><?if($arParams["CHECK_FIELD_NAME"]=="Y"):?><span class="collect-req">*</span><?endif?></td><td class="collect-name"><input type="text" name="f_name" value="<?=$arResult["NAME"]?>"<?if($arParams["CHECK_FIELD_NAME"]=="Y"):?> required="required"<?endif?>></td></tr>
		<?endif;?>

		<?if ($arParams["USE_FIELD_PHONE"]=="Y"):?>
			<tr><td class="collect-field-label"><?=$arParams["FIELD_PHONE_TITLE"]?><?if($arParams["CHECK_FIELD_PHONE"]=="Y"):?><span class="collect-req">*</span><?endif?></td><td class="collect-phone"><input type="text" name="f_phone" value="<?=$arResult["PHONE"]?>"<?if($arParams["CHECK_FIELD_PHONE"]=="Y"):?> required="required"<?endif?>></td></tr>
		<?endif;?>

		<?if ($arParams["USE_FIELD_EMAIL"]=="Y"):?>
			<tr><td class="collect-field-label"><?=$arParams["FIELD_EMAIL_TITLE"]?><?if($arParams["CHECK_FIELD_EMAIL"]=="Y"):?><span class="collect-req">*</span><?endif?></td><td class="collect-email"><input type="text" name="f_email" value="<?=$arResult["EMAIL"]?>"<?if($arParams["CHECK_FIELD_EMAIL"]=="Y"):?> required="required"<?endif?>></td></tr>
		<?endif;?>

		<?if ($arParams["USE_FIELD_TEXT"]=="Y"):?>
			<tr><td valign="top" class="collect-field-label"><?=$arParams["FIELD_TEXT_TITLE"]?><?if($arParams["CHECK_FIELD_TEXT"]=="Y"):?><span class="collect-req">*</span><?endif?></td><td class="collect-text"><textarea name="f_text" rows="3"<?if($arParams["CHECK_FIELD_TEXT"]=="Y"):?> required="required"<?endif?>><?=$arResult["TEXT"]?></textarea></td></tr>
		<?endif;?>

		<?if($arParams["USE_CAPTCHA"] == "Y"):?>
			<tr><td colspan="2">
				<div class="collect-ctext"><?=GetMessage("COLLECT_CAPTCHA")?></div>
				<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
				<div class="collect-ctext"><?=GetMessage("COLLECT_CAPTCHA_CODE")?><span class="collect-req">*</span></div>
				<input type="text" name="captcha_word" size="30" maxlength="50" value="">
			</td></tr>
		<?endif;?>

		<tr><td colspan="2" align="right">
			<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
			<input type="submit" name="submit" value="<?=$arParams["SUBMIT_TITLE"]?>">
		</td></tr>

	</table>

</form>
<?endif;?>
</div>