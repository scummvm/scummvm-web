<div id="recommended-download" class="{($recommendedDownload) ? 'visible':'hidden'}">
    <div class="subhead">{#downloadsBadge#}</div>
    <div class="subhead-content">
        <div id="downloadContainer">
            <a id="downloadButton" href={$recommendedDownload.url}>
                <img src="images/scummvm.png" alt="Download ScummVM icon">
                <div class="downloadText">Download ScummVM</div>
                <div id="downloadDetails">Version {$recommendedDownload.ver} • {$recommendedDownload.os} • {$recommendedDownload.desc}</div>
            </a>
        </div>
    </div>
</div>
<br>