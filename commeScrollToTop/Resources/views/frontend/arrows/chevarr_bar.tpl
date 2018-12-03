{extends file="frontend/arrows/arrow_svg.tpl"}

{block name="cc-stt-arrow-svg-content" }
    <rect class="cc-stt-arrow" x="10" y="10" width="80" height="15"/><polygon class="cc-stt-arrow" points="50,30 90,70 80,80 58,58 58,95 42,95 42,58 20,80 10,70"/>
    {$smarty.block.parent}
{/block}
