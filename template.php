<? include 'result_modifier.php'; ?>
<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>

<?=$arResult["FORM_HEADER"]?>

<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{

	?>
<div class="contact-form__form-inputs">
<div class="input contact-form__input"><label class="input__label" for="medicine_name">
                <div class="input__label-text" ><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></div>
                <?=$arQuestion["HTML_CODE"]?>
            </label></div>
            </div>
            <?php
             continue;
            ?>
            
		<tr>
        
			<td>
                
				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				<span class="error-fld" title="<?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?>"></span>
				<?endif;?>
				<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
				<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
			</td>
			<td><?=$arQuestion["HTML_CODE"]?></td>
		</tr>
                </div>  
	<?
		}
	} //endwhile 
  
    ?>

<input class="form-button contact-form__bottom-button" data-success="Отправлено"
                    data-error="Ошибка отправки"  <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
<p>
<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
</p>
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)


