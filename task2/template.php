<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<? if ($arResult["isFormErrors"] == "Y"): ?><?= $arResult["FORM_ERRORS_TEXT"]; ?><? endif; ?>

<? if ($arResult["isFormNote"] === "Y"): ?>
    <?= $arResult["FORM_NOTE"] ?>
<? else: ?>

    <div class="contact-form">
    <div class="contact-form__head">
        <? if ($arResult["isFormTitle"]): ?>
            <div class="contact-form__head-title"><?= $arResult["FORM_TITLE"] ?></div>
        <? endif; ?>
        <? if ($arResult["isFormDescription"] == "Y"): ?>
            <div class="contact-form__head-text"><?= $arResult["FORM_DESCRIPTION"] ?></div>
        <? endif; ?>

    </div>

<form name="<?= $arResult["WEB_FORM_NAME"] ?>" action="<?= POST_FORM_ACTION_URI ?>" method="POST"
      enctype="multipart/form-data" class="contact-form__form" novalidate="novalidate">
    <input type="hidden" name="WEB_FORM_ID" value="<?= $arParams["WEB_FORM_ID"] ?>">
    <?= bitrix_sessid_post() ?>

    <?
    $nameField = 'form_' . $arResult['QUESTIONS']['NAME']['STRUCTURE'][0]['FIELD_TYPE'] . '_' . $arResult['QUESTIONS']['NAME']['STRUCTURE'][0]['ID'];
    $emailField = 'form_' . $arResult['QUESTIONS']['EMAIL']['STRUCTURE'][0]['FIELD_TYPE'] . '_' . $arResult['QUESTIONS']['EMAIL']['STRUCTURE'][0]['ID'];
    $companyField = 'form_' . $arResult['QUESTIONS']['COMPANY']['STRUCTURE'][0]['FIELD_TYPE'] . '_' . $arResult['QUESTIONS']['COMPANY']['STRUCTURE'][0]['ID'];
    $phoneField = 'form_' . $arResult['QUESTIONS']['PHONE']['STRUCTURE'][0]['FIELD_TYPE'] . '_' . $arResult['QUESTIONS']['PHONE']['STRUCTURE'][0]['ID'];
    $messageField = 'form_' . $arResult['QUESTIONS']['MESSAGE']['STRUCTURE'][0]['FIELD_TYPE'] . '_' . $arResult['QUESTIONS']['MESSAGE']['STRUCTURE'][0]['ID'];
    ?>
    <div class="contact-form__form-inputs">
        <div class="input contact-form__input"><label class="input__label" for="<?= $nameField ?>">
                <div class="input__label-text"><?= $arResult['QUESTIONS']['NAME']["CAPTION"] ?><? if ($arResult['QUESTIONS']['NAME']["REQUIRED"] == "Y"): ?><?= $arResult["REQUIRED_SIGN"]; ?><? endif; ?></div>
                <input class="input__input"
                       type="<?= $arResult['QUESTIONS']['NAME']['STRUCTURE'][0]['FIELD_TYPE'] ?>"
                       id="<?= $nameField ?>" name="<?= $nameField ?>" value=""
                       required="">
                <? if (is_array($arResult["FORM_ERRORS"]) && array_key_exists('NAME', $arResult['FORM_ERRORS'])): ?>
                    <div class="input__notification"><?= htmlspecialcharsbx($arResult["FORM_ERRORS"]['NAME']) ?></div>
                <? endif; ?>
            </label></div>
        <div class="input contact-form__input"><label class="input__label" for="<?= $emailField ?>">
                <div class="input__label-text"><?= $arResult['QUESTIONS']['EMAIL']["CAPTION"] ?><? if ($arResult['QUESTIONS']['EMAIL']["REQUIRED"] == "Y"): ?><?= $arResult["REQUIRED_SIGN"]; ?><? endif; ?></div>
                <input class="input__input"
                       type="<?= $arResult['QUESTIONS']['EMAIL']['STRUCTURE'][0]['FIELD_TYPE'] ?>"
                       id="<?= $emailField ?>" name="<?= $emailField ?>" value=""
                       required="">
                <? if (is_array($arResult["FORM_ERRORS"]) && array_key_exists('EMAIL', $arResult['FORM_ERRORS'])): ?>
                    <div class="input__notification"><?= htmlspecialcharsbx($arResult["FORM_ERRORS"]['EMAIL']) ?></div>
                <? endif; ?>
            </label></div>
        <div class="input contact-form__input"><label class="input__label" for="<?= $companyField ?>">
                <div class="input__label-text"><?= $arResult['QUESTIONS']['COMPANY']["CAPTION"] ?><? if ($arResult['QUESTIONS']['COMPANY']["REQUIRED"] == "Y"): ?><?= $arResult["REQUIRED_SIGN"]; ?><? endif; ?></div>
                <input class="input__input"
                       type="<?= $arResult['QUESTIONS']['COMPANY']['STRUCTURE'][0]['FIELD_TYPE'] ?>"
                       id="<?= $companyField ?>" name="<?= $companyField ?>" value=""
                       required="">
                <? if (is_array($arResult["FORM_ERRORS"]) && array_key_exists('NAME', $arResult['FORM_ERRORS'])): ?>
                    <div class="input__notification"><?= htmlspecialcharsbx($arResult["FORM_ERRORS"]['COMPANY']) ?></div>
                <? endif; ?>
            </label></div>
        <div class="input contact-form__input"><label class="input__label" for="<?= $phoneField ?>">
                <div class="input__label-text"><?= $arResult['QUESTIONS']['PHONE']["CAPTION"] ?><? if ($arResult['QUESTIONS']['PHONE']["REQUIRED"] == "Y"): ?><?= $arResult["REQUIRED_SIGN"]; ?><? endif; ?></div>
                <input class="input__input"
                       type="<?= $arResult['QUESTIONS']['PHONE']['STRUCTURE'][0]['FIELD_TYPE'] ?>"
                       id="<?= $phoneField ?>" name="<?= $phoneField ?>" value=""
                       required="">
                <? if (is_array($arResult["FORM_ERRORS"]) && array_key_exists('PHONE', $arResult['FORM_ERRORS'])): ?>
                    <div class="input__notification"><?= htmlspecialcharsbx($arResult["FORM_ERRORS"]['PHONE']) ?></div>
                <? endif; ?>
            </label></div>


        <div class="contact-form__form-message">
            <div class="input"><label class="input__label" for="<?= $messageField ?>">
                    <div class="input__label-text"><?= $arResult['QUESTIONS']['MESSAGE']["CAPTION"] ?></div>
                    <textarea class="input__input"
                              type="<?= $arResult['QUESTIONS']['MESSAGE']['STRUCTURE'][0]['FIELD_TYPE'] ?>"
                              id="<?= $messageField ?>" name="<?= $companyField ?>>"
                              value=""></textarea>
                    <div class="input__notification"></div>
                </label></div>
        </div>
    </div>
    <div class="contact-form__bottom">
        <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
            ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку
            персональных
            данных&raquo;.
        </div>
        <button type="submit" class="form-button contact-form__bottom-button" data-success="Отправлено"
                data-error="Ошибка отправки">
            <div class="form-button__title"><?= htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]); ?></div>
            <input type="hidden" name="web_form_apply" value="Y"/>
        </button>
    </div>

    <?= $arResult["FORM_FOOTER"] ?>

<?php endif; ?>