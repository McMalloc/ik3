<!doctype html>
<html lang="de-DE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta property="og:title" content="Infant King"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://http://infantking.de/"/>
    <meta property="og:image" content="http://infantking.de/?attachment_id=89"/>
    <meta property="og:description"
          content="Infant King create a captivating GarageBluesRock that commands you to share their joy and suffering, to learn about their worries and to join them in their narcissistic cry for just one more second of relevance. Then again—who ever listens to an Infant King?"/>
    <title>Infant King</title>


    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Place favicon.ico in the root directory -->
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700|Open+Sans+Condensed:300italic|EB+Garamond&subset=latin,latin-ext'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="skeleton.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="main.js"></script>
</head>

<body>

<nav class="pinned-bar">

    <div class="menu-hauptmenue-container">
        <ul id="menu-hauptmenue" class="menu">
            <li id="menu-item-60" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-60"><a
                    href="#konzerte">{{$translationstrings["konzerte"]}}</a></li>
            <li id="menu-item-61" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-61"><a
                    href="#bandbiographie">{{$translationstrings["bandbiographie"]}}</a></li>
            <li id="menu-item-62" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-62"><a
                    href="#kontakt">{{$translationstrings["kontakt"]}}</a></li>
            <li id="menu-item-80" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-80"><a
                    href="http://infantking.bigcartel.com/">Shop</a></li>
        </ul>
    </div>
</nav>

<span class="site-title keyvisual-copy">Infant King</span>
<img class="keyvisual" src="IK2_MatthiasPiekacz.jpg" alt="keyvisual"/>
<span class="photo-credits">Photo: Matthias Piekacz / <a href="http://blog.dressedinblack.de/" title="Dressed in Black">dressedinblack</a></span>

<div class="container">
    <div class="teaser keyvisual-copy row">
        <!--<div class="six columns">-->
        <!--<iframe class="player" src="https://embed.spotify.com/?uri=spotify:album:5ECiaOGPau0djt7vlJ5PgN" width="300" height="80" frameborder="0" allowtransparency="true"></iframe>-->
        <!--</div>-->
        <div class="twelve columns cta" style="text-align: center;">
            <h3>{{$translationstrings["das_album"]}}</h3>
            <span style='font-family: "EB Garamond", sans-serif; text-transform: uppercase;'>Superschizophrenic</span><br/>

            <h3>{{$translationstrings["anhoeren"]}}</h3>

            <div class="player-buttons">
                <input class="player-button" data-player="spotify"
                       style="background-color: rgba(0,0,0,0.8); color: white;" type="button" value="Spotify-Player"/>
                <input class="player-button" data-player="bandcamp"
                       style="background-color: rgba(0,0,0,0.8); color: white;" type="button" value="Bandcamp-Player"/>
            </div>

            <div class="player-container">
                <iframe
                        id="player-frame"
                        class="to-hide"
                        data-bandcamp="https://bandcamp.com/EmbeddedPlayer/album=2124783771/size=small/bgcol=333333/linkcol=0f91ff/transparent=true/"
                        data-spotify="https://embed.spotify.com/?uri=spotify:album:5ECiaOGPau0djt7vlJ5PgN"
                        src=""
                        width="380"
                        height="80"
                        frameborder="0"
                        allowtransparency="true">
                    Superschizophrenic by Infant King
                </iframe>

            </div>
            <h3>{{$translationstrings["kaufen"]}}</h3>

            <p style="text-align: center;">{{$translationstrings["auf"]}} 
                <a href="http://www.amazon.de/Superschizophrenic-Infant-King/dp/B0106OM0X4/ref=sr_1_1?s=dmusic&ie=UTF8&qid=1435503977&sr=1-1&keywords=infant+king">Amazon</a>,
                <a href="https://itunes.apple.com/de/album/ptgd/id1010437582?i=10104">iTunes</a> 
                {{$translationstrings["oder"]}} <a href="http://infantking.bigcartel.com/">{{$translationstrings["auf"]}} CD</a>
            </p>

        </div>
    </div>
</div>
<div class="opaque">
    <div id="wrapper" class="container">

        <div class="row">
            <div class="twelve columns">
                <!--<iframe class="iframe" width="640" height="360" src="https://www.youtube-nocookie.com/embed/KVnxD1JpgYo" frameborder="0" allowfullscreen></iframe>-->
            </div>
        </div>

        <div class="row">
            <section id="konzerte" class="twelve columns hyphenate">
                <h2>{{$translationstrings['konzerte']}}</h2>
                <table class="gigtable">
                    <tbody>
                    @foreach ($gigs as $gig)
                    <tr>
                        <td>
                            {{$gig[0]}}
                        </td>
                        <td>
                            @if ($gig[5] != "")
                                <a href="{{$gig[5]}}">
                            @endif
                            {{$gig[2]}}
                            @if (isset($gig[5]))
                                </a>
                            @endif
                        </td>
                        <td>
                            {{$gig[3]}}
                            @if ($gig[4] != "")
                            ({{$gig[4]}})
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </section>
        </div>
        <div class="row">
            <section id="bandbiographie" class="twelve columns hyphenate">
                <h2>{{$translationstrings["bandbiographie"]}}</h2>
                {!!$bio!!}
                <input type="button" class="show-past-btn"
                       onclick="window.location=\'http://infantking.de/wp-content/uploads/2015/05/20150504_Presskit_D.pdf\';"
                       value="{{$translationstrings['presskit_laden']}}"/></section>
        </div>
        <div class="row">
            <section id="kontakt" class="twelve columns">
                <h2>{{$translationstrings["kontakt"]}}</h2>

                <div role="form" id="contact">
                    <div class="screen-reader-response"></div>
                    <form name="contact-form" action="contact" method="post"
                          novalidate="novalidate" class="wpcf7-form">
                        {{$translationstrings["name"]}}<br/>
                            <span><input type="text" name="your-name" value=""
                                        size="40"
                                        aria-required="true"
                                        aria-invalid="false"/></span>

                        {{$translationstrings["mailadresse"]}}<br/>
                            <span class="form-info">{{$translationstrings["addr_disclaimer"]}}</span><br/>
                            <span><input type="email" name="your-email"
                                        value="" size="40"
                                        aria-required="true"
                                        aria-invalid="false"/></span>
                        {{$translationstrings["nachricht"]}}<br/>
                                <span>
                                    <textarea name="your-message" cols="40"
                                            rows="10"
                                            aria-required="true"
                                            aria-invalid="false"></textarea>
                                </span>
                            <br/>
                            <span class="form-info">{{$translationstrings["kontakt_hinweis"]}} ;)</span>

                        <input id="contact-submit" type="submit" value="{{$translationstrings['senden']}}"/>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <!--<div id="listen" class="tooltip">Hier ins Album reinhören.</div>-->

    <footer class="pinned-bar">
        <div class="six columns offset-by-one">
            <a href="http://infantking.de/impressum-datenschutz/">
                {{$translationstrings["impressum"]}} </a>&ensp;|&ensp;
            <a href="http://infantking.de/downloads"></i>&nbsp;Presskit</a>&ensp;|&ensp;
            @if ($locale == 'de')
                <a href="?lc=en"></i>English</a></div>
            @else 
                <a href="?lc=de"></i>Deutsch</a></div>
            @endif
        <div class="four columns">
            <div class="social-buttons">
                <a href="https://www.facebook.com/infantking.official"></i>Facebook</a>
                <a href="https://play.spotify.com/album/5ECiaOGPau0djt7vlJ5PgN"></i>Spotify</a>
            </div>
        </div>
    </footer>
</div>

</body>
</html>
