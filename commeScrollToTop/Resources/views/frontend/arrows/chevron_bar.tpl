{extends file="frontend/arrows/arrow_svg.tpl"}

{block name="cc-stt-arrow-svg-content"}
    <rect class="cc-stt-arrow" x="10" y="15" width="80" height="15"/>
    <polygon class="cc-stt-arrow" points="50,35 90,75 80,85 50,55 20,85 10,75"/>
      {$smarty.block.parent}
{/block}
