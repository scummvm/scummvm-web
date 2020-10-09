<!DOCTYPE html>
<html lang="{$lang}" class="theme-{$smarty.const.DEFAULT_THEME}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="no-referrer">
    <base href="{$baseurl|lang}">
    <link rel="alternate" type="application/atom+xml" title="{#indexAtomFeed#}" href="{$baseurl|lang}/feeds/atom/">
    <link rel="alternate" type="application/rss+xml" title="{#indexRSSFeed#}" href="{$baseurl|lang}/feeds/rss/">
    <title>ScummVM :: {$title}</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=oLBEjaJ9ag">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=oLBEjaJ9ag">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=oLBEjaJ9ag">
    <link rel="manifest" href="/site.webmanifest?v=oLBEjaJ9ag">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=oLBEjaJ9ag" color="#046c00">
    <link rel="shortcut icon" href="/favicon.ico?v=oLBEjaJ9ag">
    <meta name="apple-mobile-web-app-title" content="ScummVM">
    <meta name="application-name" content="ScummVM">
    <meta name="msapplication-TileColor" content="#cc6600">
    <meta name="theme-color" content="#cc6600">
    <!-- OpenGraph -->
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:title" content="ScummVM">
    <meta property="og:description" content="ScummVM is a collection of game engines for playing classic graphical RPGs and point-and-click adventure games on modern hardware.">
    <meta property="og:url" content="{'https://www.scummvm.org'|lang}">
    <meta property="og:image" content="https://www.scummvm.org/images/og-image.jpg">
    <!-- Translations -->
    {foreach from=$available_languages key=key item=item}
    {if $lang != $key}
    <link rel="alternate" hreflang="{$key}" href="{$baseurl}{$key}{$pageurl}">
    {/if}
    {/foreach}
    {* Cache bust CSS if making major changes *}
    {$css = "2.2.0"}
    <link rel="stylesheet" href="/css/main_{($rtl) ? 'rtl' : 'ltr'}.css?v={$css}">
    {* Page specific, or other extra CSS rules. *}
    {foreach from=$css_files item=filename}
    <link rel="stylesheet" href="/css/{$filename}">
    {/foreach}

    {if $smarty.cookies.cookie_consent == "true"}
    <!-- Matomo -->
    <script type="text/javascript">
        var _paq = _paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(["setCookieDomain", "*.scummvm.org"]);
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u = "https://analytics.scummvm.org/";
            _paq.push(['setTrackerUrl', u + 'piwik.php']);
            _paq.push(['setSiteId', '1']);
            var d = document,
                g = d.createElement('script'),
                s = d.getElementsByTagName('script')[0];
            g.type = 'text/javascript';
            g.async = true;
            g.defer = true;
            g.src = u + 'piwik.js';
            s.parentNode.insertBefore(g, s);
        })();
    </script>
    <noscript>
        <p><img src="https://analytics.scummvm.org/piwik.php?idsite=1&amp;rec=1" style="border:0;" alt="" /></p>
    </noscript>
    <!-- End Matomo Code -->
    {/if}
</head>

<body>
    <input type="checkbox" autocomplete="off" id="nav-trigger" class="nav-trigger" />
    <label for="nav-trigger"></label>

    <div class="site-wrap">
        {* Header. *}
        <header class="site-header">
            <div class="logo">
                <img class="background hide-small" src="/images/maniac-half.png" alt="Maniac Mansion kids">
                <a href="{$baseurl|lang}">
                    <img class="foreground" src="/images/scummvm_logo.png" alt="{#indexLogo#}">
                </a>
            </div>
            <div class="row top">
                <div class="col-1-1">
                    <img class="heroes hide-small" src="/images/heroes{$heroes_num|rand:0}.png" alt="{#indexCharacters#}">
                </div>
            </div>
            <div class="row bottom hide-small">
                <div class="col-1-1">
                    <span class="scummvm float_right">Script Creation Utility for Maniac Mansion Virtual Machine</span>
                </div>
            </div>
        </header>

        {* Content *}
        <div class="container row">
            <div class="col-4-5 col-sm-1">
                <div class="content">
                    {* Introduction text and screenshot viewer. *}
                    {if isset($show_intro) && $show_intro}
                    {include file='components/intro_header.tpl'}
                    {/if}

                    {* The actual content. *}
                    {include file='components/roundbox.tpl' header=$content_title content=$content}
                </div>
            </div>

            {* Menu. *}
            <div class="col-1-5 col-sm-1">
                {include file='layout/menu.tpl'}
            </div>
        </div>
        <footer class="row">
            <div class="col-4-5 col-sm-1">
                {#indexLegal#}
            </div>
            <div class="col-1-5 hide-small">
                <div class="tentacle">
                    <img src="/images/tentacle.svg" alt="Tentacle">
                </div>
            </div>
        </footer>
    </div>

    {foreach from=$js_files item=script}
    <script src="/js/{$script}"></script>
    {/foreach}

    <script>
        document.querySelector('.nav-trigger').addEventListener('change', function() {
            if (this.checked)
                document.body.classList.add('no-scroll');
            else
                document.body.classList.remove('no-scroll');
        });

        for (var link of document.querySelectorAll('nav a.theme-link')) {
            link.addEventListener('click', function(evt) {
                evt.preventDefault();
                if (!evt.target.href.indexOf('#')) return;
                var theme = evt.target.href.split('#')[1];
                document.querySelector('html').className = 'theme-' + theme;
                localStorage.setItem('theme', theme);
            })
        }

        window.addEventListener('DOMContentLoaded', function() {
            var theme = localStorage.getItem('theme');
            if (theme) {
                document.querySelector('html').className = 'theme-' + theme;
            }
        })
    </script>
    {if $smarty.cookies.cookie_consent == "true"}
    {* Google analytics javascript. *}
    <script src="https://www.google-analytics.com/urchin.js" type="text/javascript"></script>
    <script type="text/javascript">
        _uacct = "UA-1455743-1";
        _udn = "scummvm.org";
        urchinTracker();
    </script>
    {* End Google analytics javascript. *}
    {else if $smarty.cookies.cookie_consent == "false"}
    {* Do nothing *}
    {else}
    {include file='components/cookie.tpl'}
    {/if}
</body>

</html>
