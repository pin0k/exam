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

<div class="item-wrap">
		<div class="rew-footer-carousel">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="side-block side-opin">
			<div class="inner-block">
				<div class="title">
					<div class="photo-block">
					<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
						<?$arFileTmp = CFile::ResizeImageGet(
							$arItem["PREVIEW_PICTURE"]["ID"],
							["width" => 50, "height" => 50],
							BX_RESIZE_IMAGE_EXACT,
							true
						);?>
						<img src="<?=$arFileTmp["src"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
					<?else:?>
						<img src="<?=SITE_TEMPLATE_PATH?>/img/rew/no_photo.jpg" alt="">
					<?endif;?>
					</div>
					<div class="name-block">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
							<?echo $arItem["NAME"]?>
						<?endif;?>
						</a>
					</div>
					<div class="pos-block">
					<?if($arItem["PROPERTIES"]["POSITION"]):?>
						<?echo $arItem["PROPERTIES"]["POSITION"]["VALUE"]?>, 
					<?endif;?>
					<?if($arItem["PROPERTIES"]["COMPANY"]):?>
						<?echo $arItem["PROPERTIES"]["COMPANY"]["VALUE"]?>
					<?endif;?>
					</div>
				</div>
				<div class="text-block">
				<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
					<?echo mb_substr($arItem["PREVIEW_TEXT"], 0, 150);?>
				<?endif;?>	
				<?if(strlen($arItem["PREVIEW_TEXT"])):?>
					...
				<?endif;?>
				</div>
			</div>
		</div>
	</div>
<?endforeach;?>
</div></div>
