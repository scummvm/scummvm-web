<div id="recommended-download" class="{($recommendedDownload) ? 'visible':'hidden'}">
    <div class="subhead">{#downloadsBadge#}</div>
    <div class="subhead-content">
        <div id="downloadContainer">
            <a id="downloadButton" href={$recommendedDownload.url|download}>
                <img src="/images/scummvm.png" alt="Download ScummVM icon">
                <div class="downloadText">{#downloadsBadgeTitle#|replace:'{version}':$recommendedDownload.version}</div>
                <div id="downloadDetails">{$recommendedDownload.os}{if $recommendedDownload.extra_text != ""} • {$recommendedDownload.extra_text}{/if}</div>
            </a>
        </div>
    </div>
</div>
<br>
