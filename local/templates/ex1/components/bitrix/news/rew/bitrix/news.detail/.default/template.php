<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="review-block">
	<div class="review-text">
		<div class="review-text-cont">
		<?if($arResult["DETAIL_TEXT"] <> ''):?>
			<?echo $arResult["DETAIL_TEXT"];?>
		<?else:?>
			<?echo $arResult["PREVIEW_TEXT"];?>
		<?endif?>
		</div>
		<div class="review-autor">
		<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
			<?=$arResult["NAME"]?>, 
		<?endif;?>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
			<?=$arResult["DISPLAY_ACTIVE_FROM"]?>, 
		<?endif;?>
		<?if($arResult["PROPERTIES"]["POSITION"]):?>
			<?=$arResult["PROPERTIES"]["POSITION"]["VALUE"]?>, 
		<?endif;?>
		<?if($arResult["PROPERTIES"]["COMPANY"]):?>
			<?=$arResult["PROPERTIES"]["COMPANY"]["VALUE"]?>
		<?endif;?>
		</div>
	</div>
	<div style="clear: both;" class="review-img-wrap">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" 
		alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>">
	<?else:?>
		<img src="<?=SITE_TEMPLATE_PATH?>/img/rew/no_photo.jpg" alt="img">
	<?endif;?>
	</div>
</div>
<?if(isset($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"])):?>
<div class="exam-review-doc">
	<p><?=GetMessage("DOC")?></p>
	<?foreach($arResult["DISPLAY_PROPERTIES"]["DOCUMENTS"]["FILE_VALUE"] as $pid=>$arProperty):?>
	<div class="exam-review-item-doc">
		<img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png">
		<a href="<?=$arProperty["SRC"]?>">
			<?=$arProperty["ORIGINAL_NAME"]?>
		</a>
	</div>
	<?endforeach;?>
</div>
<?endif;?>
<hr>
<?
$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
		"HANDLERS" => $arParams["SHARE_HANDLERS"],
		"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
		"PAGE_TITLE" => $arResult["~NAME"],
		"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
		"HIDE" => $arParams["SHARE_HIDE"],
	),
	$component,
	array("HIDE_ICONS" => "Y")
);
?>