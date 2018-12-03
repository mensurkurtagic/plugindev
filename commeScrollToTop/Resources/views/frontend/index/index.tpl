{extends file="parent:frontend/index/index.tpl"}

{block name="frontend_index_body_inline"}
    {if $templateFile}
        {include file="frontend/arrows/$templateFile.tpl"}
    {/if}
    {$smarty.block.parent}
{/block}
