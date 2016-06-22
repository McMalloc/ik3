<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use Mail;

$app->post('contact', function () use ($app) {
    $name = app("request")->input("name");
    $mailaddr = app("request")->input("replyaddr");
    $message = app("request")->input("message");
    $message = "Gesendet über das Kontaktformular. Nachricht von ".$name." (".$mailaddr.")\r\n" . $message;
    $to = "robert.wlcek@googlemail.com";
    $subject = "Kontaktanfrage von " . $name . " über infantking.de";

    Mail::raw($message, function ($message) {
        $message->from($address, $name = null);
        $message->sender("kontaktformular@infantking.de", '{name} über Kontaktformular');
        $message->to($to, null);
        $message->replyTo($mailaddr, $name);
        $message->subject($subject);
    });
    if ($success) {
        return "ok";
    } else {
        return "bad";
    }
});

$app->get('/', function () use ($app) {
    $accepted_language = str_split(app("request")->header('Accept-Language'), 2)[0];
    $requested_language = app("request")->input('lc');

    if (isset($requested_language)) {
        $accepted_language = $requested_language;
    }

    if ($accepted_language == "de") {
        setlocale(LC_TIME, "de_DE.utf8");
        $dateformat = "%d. %B %Y";
        $biofilename = "bio_de.html";
        $translationstrings = [
            "konzerte"          => "Konzerte",
            "bandbiographie"    => "Bandbiographie",
            "kontakt"           => "Kontakt",
            "das_album"         => "Das Album",
            "anhoeren"          => "anhören",
            "kaufen"            => "kaufen",
            "auf"               => "auf",
            "oder"              => "oder",
            "presskit_laden"    => "Vollständiges Presskit herunterladen",
            "impressum"         => "Impressum",
            "name"              => "Name",
            "mailadresse"       => "Gültige E-Mail-Adresse",
            "addr_disclaimer"   => "Ohne können wir dir nicht antworten. Deine Adresse wird vertraulich behandelt.",
            "nachricht"         => "Nachricht",
            "kontakt_hinweis"   => "Wir werden dir so schnell wie möglich antworten, aber eine Rockband ist kein D-Zug",
            "senden"            => "senden"
        ];
    } else {
        setlocale(LC_TIME, "en_US");
        $dateformat = "%B %d, %Y";
        $biofilename = "bio_en.html";
        $translationstrings = [
            "konzerte"          => "Gigs",
            "bandbiographie"    => "Biography",
            "kontakt"           => "Contact",
            "das_album"         => "The Album",
            "anhoeren"          => "listen",
            "kaufen"            => "grab",
            "auf"               => "on",
            "oder"              => "or",
            "presskit_laden"    => "Download complete presskit",
            "impressum"         => "Impress",
            "name"              => "Name",
            "mailadresse"       => "Valid e-mail address",
            "addr_disclaimer"   => "Without a valid adress we can't come back to you. We won't give it to someone else.",
            "nachricht"         => "Message",
            "kontakt_hinweis"   => "We will reply as fast as possible!",
            "senden"            => "send"
        ];
    }

    $bio = file_get_contents(__DIR__ . "/../../resources/" . $biofilename, "r");
    $gigs = array_map('str_getcsv', file('__DIR__ . "/../../resources/gigs.csv'));

    foreach ($gigs as &$gig) {
        $dateobj = date_create_from_format('d-m-Y', $gig[0]);
        $gig[0] = strftime($dateformat, $dateobj->getTimestamp());
    }

    return view('index', ['bio' => $bio, 'gigs' => $gigs, 'translationstrings' => $translationstrings, 'locale' => $accepted_language]);
});
