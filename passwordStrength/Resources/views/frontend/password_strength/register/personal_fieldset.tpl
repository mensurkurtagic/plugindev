{extends file="parent:frontend/register/personal_fieldset.tpl"}

{* Password *}
{block name='frontend_register_personal_fieldset_input_password'}
    <div class="register--password">
        <input name="register[personal][password]"
               type="password"
               autocomplete="new-password"
               required="required"
               aria-required="true"
               placeholder="{s name='RegisterPlaceholderPassword'}{/s}{s name="RequiredField" namespace="frontend/register/index"}{/s}"
               id="register_personal_password"
               class="register--field password is--required{if isset($error_flags.password)} has--error{/if}" />
    </div>
{/block}

{* Password confirmation *}
{block name='frontend_register_personal_fieldset_input_password_confirm'}
    {if {config name=doublePasswordValidation}}
        <div class="register--passwordconfirm">
            <input name="register[personal][passwordConfirmation]"
                   type="password"
                   autocomplete="new-password"
                   aria-required="true"
                   placeholder="{s name='RegisterPlaceholderPasswordRepeat'}{/s}{s name="RequiredField" namespace="frontend/register/index"}{/s}"
                   id="register_personal_passwordConfirmation"
                   class="register--field passwordConfirmation is--required{if isset($error_flags.passwordConfirmation)} has--error{/if}" />
        </div>
    {/if}
{/block}

{* Password description *}
{block name='frontend_register_personal_fieldset_password_description'}
    <div class="register--password-description">
        {s name='RegisterInfoPassword'}{/s} {config name=MinPassword} {s name='RegisterInfoPasswordCharacters'}{/s}<br />{s name='RegisterInfoPassword2'}{/s}
    </div>
{/block}