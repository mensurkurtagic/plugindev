{extends file="frontend/arrows/arrow_svg.tpl"}

{block name="cc-stt-arrow-svg-content" }
    <rect class="cc-stt-arrow" x="10" y="20" width="80" height="20"/><polygon class="cc-stt-arrow" points="50,40 90,80 10,80" />
      {$smarty.block.parent}
{/block}
