<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<div class="nv_topnav">
<ul>
  <li><a href="/" class="menu-img-fon"  style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/nv_home.png);" ><span></span></a></li>
<?
$previousLevel = 0;
foreach($arResult as $arItem):
?>
  <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
    <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
  <?endif?>

  <?if ($arItem["IS_PARENT"]):?>
      <li>
        <a href="<?=$arItem["LINK"]?>">
          <?= $arItem["DEPTH_LEVEL"] == 1 ? "<span>{$arItem["TEXT"]}</span>" : $arItem["TEXT"];?>
        </a>
        <ul>

  <?else:?>

    <?if ($arItem["PERMISSION"] > "D"):?>
        <li>
          <a href="<?=$arItem["LINK"]?>">
            <?= $arItem["DEPTH_LEVEL"] == 1 ? "<span>{$arItem["TEXT"]}</span>" : $arItem["TEXT"];?>
          </a>
        </li>
    <?endif?>

  <?endif?>

  <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
  <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>
  <div class="clearboth"></div>
</ul>
</div>
<?endif?>