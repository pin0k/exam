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
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="review-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="review-text">
			<div class="review-block-title">
				<span class="review-block-name">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<?echo $arItem["NAME"]?>
					</a>
				</span>
				<span class="review-block-description">
				<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
					<?echo $arItem["DISPLAY_ACTIVE_FROM"]?>, 
				<?endif?>
				<?if($arItem["PROPERTIES"]["POSITION"]):?>
					<?echo $arItem["PROPERTIES"]["POSITION"]["VALUE"]?>, 
				<?endif?>
				<?if($arItem["PROPERTIES"]["COMPANY"]):?>
					<?echo $arItem["PROPERTIES"]["COMPANY"]["VALUE"]?>
				<?endif?>
				</span>
			</div>			
			<div class="review-text-cont">
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
			</div>
		</div>
		<div class="review-img-wrap">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
			<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
				<?$arFileTmp = CFile::ResizeImageGet(
					$arItem["PREVIEW_PICTURE"]["ID"],
					["width" => 25, "height" => 25],
					BX_RESIZE_IMAGE_EXACT,
					true
				);?>
				<img src="<?=$arFileTmp["src"]?>" 
				alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
			<?else :?>
				<img src="<?=SITE_TEMPLATE_PATH?>/img/rew/no_photo.jpg" alt="img">
			<?endif;?>
			</a>
		</div>
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
