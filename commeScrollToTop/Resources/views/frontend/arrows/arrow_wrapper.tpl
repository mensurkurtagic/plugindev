<div
    class="cc-stt-floater"
    style="{foreach from=$positionConfig key=property item=value}{$property}: {$value};{/foreach}"
    data-show-from="{$showButtonFrom}"
    data-show-desktop="{$showDesktopArrow}"
    data-show-tablet-landscape="{$showTabletLandscapeArrow}"
    data-show-tablet-portrait="{$showTabletPortraitArrow}"
    data-show-mobile-landscape="{$showMobileLandscapeArrow}"
    data-show-mobile-portrait="{$showMobilePortraitArrow}">
    {block name="cc-stt-arrow-svg"}{/block}
</div>
