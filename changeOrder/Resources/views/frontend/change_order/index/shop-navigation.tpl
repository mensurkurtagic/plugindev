{extends file="parent:frontend/index/shop-navigation.tpl"}

{block name='frontend_index_checkout_actions_include'}
    {if $value == 1}
        {include file="frontend/change_order/checkout/likedItems.tpl"}
        {include file="frontend/change_order/checkout/account.tpl"}
        {include file="frontend/change_order/checkout/cart.tpl"}
    {elseif $value == 2}
        {include file="frontend/change_order/checkout/account.tpl"}
        {include file="frontend/change_order/checkout/likedItems.tpl"}
        {include file="frontend/change_order/checkout/cart.tpl"}
    {elseif $value == 3}
        {include file="frontend/change_order/checkout/likedItems.tpl"}
        {include file="frontend/change_order/checkout/cart.tpl"}
        {include file="frontend/change_order/checkout/account.tpl"}
    {elseif $value == 4}
        {include file="frontend/change_order/checkout/cart.tpl"}
        {include file="frontend/change_order/checkout/likedItems.tpl"}
        {include file="frontend/change_order/checkout/account.tpl"}
    {elseif $value == 5}
        {include file="frontend/change_order/checkout/cart.tpl"}
        {include file="frontend/change_order/checkout/account.tpl"}
        {include file="frontend/change_order/checkout/likedItems.tpl"}
    {elseif $value == 6}
        {include file="frontend/change_order/checkout/account.tpl"}
        {include file="frontend/change_order/checkout/cart.tpl"}
        {include file="frontend/change_order/checkout/likedItems.tpl"}
    {/if}
{/block}