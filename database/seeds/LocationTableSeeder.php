<?php

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{

    /**
     * Initial database seeds for locations
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->truncate();

        Location::create([
            'title' => 'Bean Square (Theil)',
            'description' => '<p>Bean Square fungeert als een ontmoetingsplek met koffie, thee en smakelijke tussendoortjes. In de ochtenduren bieden we een wisselend ontbijtassortiment aan. Tijdens de lunch verschillende sandwiches en gedurende de dag een ruime selectie muffins, cookies en andere patisserie. </p>',
            'email' => 'vitam-office@catering.efb.eur.nl',
            'website' => '',
            'icon' => '/icons/locations/vitam.svg',
            'address' => 'Theil building (C)',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);

        Location::create([
            'title' => 'Bean Square (Mandeville)',
            'description' => '<p>Bean Square fungeert als een ontmoetingsplek met koffie, thee en smakelijke tussendoortjes. In de ochtenduren bieden we een wisselend ontbijtassortiment aan. Tijdens de lunch verschillende sandwiches en gedurende de dag een ruime selectie muffins, cookies en andere patisserie. </p>',
            'email' => 'vitam-office@catering.efb.eur.nl',
            'website' => '',
            'icon' => '/icons/locations/vitam.svg',
            'address' => 'Mandeville building (T), 4th floor',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);

        Location::create([
            'title' => 'Bean Square (V)',
            'description' => '<p>Bean Square fungeert als een ontmoetingsplek met koffie, thee en smakelijke tussendoortjes. In de ochtenduren bieden we een wisselend ontbijtassortiment aan. Tijdens de lunch verschillende sandwiches en gedurende de dag een ruime selectie muffins, cookies en andere patisserie. </p>',
            'email' => 'vitam-office@catering.efb.eur.nl',
            'website' => '',
            'icon' => '/icons/locations/vitam.svg',
            'address' => 'Building V',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);

        Location::create([
            'title' => 'Café In de Smitse',
            'description' => '<p>Café In de Smitse is dé plek op het universiteitsterrein om je vrienden, medestudenten en collega’s te ontmoeten na een dagje op de uni! Gegarandeerd voor een middag en avond gezelligheid, met lekkere muziek op de achtergrond en een heerlijk drankje uit ons assortiment erbij.</p>
                <p>`Hoogstpersoonlijk gebrouwen, hoogstpersoonlijk getapt, hoogstpersoonlijk genieten`.</p>
                <p>Als je In de Smitse eenmaal ontdekt hebt, wil je niet meer anders. Er gaan zelfs geruchten dat veel studenten overdag niet op de universiteit studeren, maar aan het eind van de middag toch even op hun fiets richting In de Smitse gaan... </p>',
            'email' => 'voorzitter@indesmitse.nl',
            'phone' => '+31 (010) 4081183',
            'website' => 'http://indesmitse.nl/',
            'icon' => '/icons/unknown.svg',
            'address' => 'Mandeville Building, ground floor',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);

        Location::create([
            'title' => 'De Etude',
            'description' => '<p>De Global Market is een samensmelting van verschillende eetculturen, heerlijke geuren en mooie producten. Dagelijks worden recepturen uit de hele wereld vers bereid met zoveel mogelijk producten uit de streek. Onze medewerkers koken met de seizoenen mee, waarbij smaak en variatie voorop staan.</p>',
            'email' => 'vitam-office@catering.efb.eur.nl',
            'website' => '',
            'icon' => '/icons/locations/vitam.svg',
            'address' => 'Tinbergen Building, begane grond',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);

        Location::create([
            'title' => 'Erasmus Paviljoen',
            'description' => '<p>Het Erasmus Paviljoen is de nieuwe bruisende ontmoetingsplek in het hart van de campus van de Erasmus Universiteit Rotterdam, waar studenten, medewerkers en bezoekers elkaar ontmoeten. Het biedt een inspirerend programma op gebied van wetenschap, kunst, cultuur en maatschappij en is een podium voor een breed scala aan onderwerpen en evenementen. Naast een theater heeft het Erasmus Paviljoen een grand café, foyer en studie- en werkplekken.</p>
                <p>Het Erasmus Paviljoen: <em>the place to be!</em></p>',
            'email' => 'info@erasmuspaviljoen.nl',
            'website' => 'http://www.erasmuspaviljoen.nl/',
            'phone' => '+31 (010) 408 9742',
            'icon' => '/icons/locations/erasmus-paviljoen.svg',
            'address' => 'Campus Woudestein, Erasmus Paviljoen',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);

        Location::create([
            'title' => 'Erasmus Sport Café',
            'description' => '<p>In het Erasmus Sport Café kun je de hele dag door terecht. Goede koffie, lunchbroodje, sportdrank, avondhap, biertje, bittergarnituur, het is goed toeven in het Erasmus Sport Café. Het terras is heerlijk bij zomerse temperaturen en op die dagen kan er in groepen worden gebarbecued. Er zijn pooltafels, dartborden en een tafelvoetbalspel. Het Erasmus Sport Café is ook een uitstekende meetingplek voor of na colleges en voor het geven van een borrel...</p>',
            'email' => 'sportcafe@erasmussport.nl',
            'website' => 'http://erasmussport.nl/nl_NL/erasmus-sport-caf-.html',
            'phone' => '+31 (010) 40 81879',
            'icon' => '/icons/unknown.svg',
            'address' => 'Building S',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);

        Location::create([
            'title' => 'Frozz',
            'description' => 'Frozz frozen yoghurt is 100% natuurlijk, verse Nederlandse yoghurt – bevroren op het moment dat je het bestelt. Lekker, fris en laag in calorieën. We serveren ze met fruitige, knapperige  of zoete toppings en zo creëer je iedere keer weer je eigen Frozz. Vanaf 3 euro.',
            'email' => 'hallo@frozz.com',
            'website' => 'http://frozz.com/',
            'icon' => '/icons/locations/frozz.svg',
            'address' => 'Erasmus Food Plaza, Sanders building',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);

        Location::create([
            'title' => 'Oodlz',
            'description' => 'Oodlz zijn de beste verse noodles, geserveerd in een vegetarische- of kippenbouillon. Kies vlees, kip of vega - met je favoriete verse groenten en kruiden. Zo maak je jouw eigen noodle soup. Licht, lekker en goed voor je. Vanaf 5 euro.',
            'email' => 'hallo@oodlz.nl',
            'website' => 'http://oodlz.com/',
            'icon' => '/icons/locations/oodlz.svg',
            'address' => 'Erasmus Food Plaza, Sanders building',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);

        Location::create([
            'title' => 'Has Döner Kebab',
            'description' => '<p>In 1999 opende het eerste HAS Döner Kebab®-restaurant zijn deuren in Rotterdam. Hier werd de unieke HAS-formule ontwikkeld, waar smaak en kwaliteit centraal staan. Dit is niet onopgemerkt gebleven: tegenwoordig is HAS niet meer weg te denken uit Rotterdam. Maar ook buiten de thuisstad groeit onze dönerkebabketen in rap tempo.</p>
                <p>Het geheim achter HAS zijn de kwalitatief hoogstaande verse ingrediënten en zelfbereide producten. Vers, eerlijk en schoon! Lang hoef je nooit te wachten op één van onze heerlijke gerechten: ons personeel serveert met zorg, maar klantvriendelijk en snel.</p>
                <p>Kom snel langs bij HAS Döner Kebab aan de EUR en ervaar onze passie voor döner kebab!</p>',
            'email' => 'info@hasdoner.nl',
            'website' => 'http://www.hasdoner.nl/',
            'icon' => '/icons/locations/has-doner.svg',
            'address' => 'Erasmus Food Plaza, Sanders building',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);

        Location::create([
            'title' => 'New Fork',
            'description' => 'Wij zijn New Fork. Een lunch- en ontbijtverzorger uit Rotterdam. Een paar jaar geleden zijn wij gestart met het maken van 100% natuurlijk, lekker eten en drinken. Een combinatie waar wij 100% in geloven.',
            'email' => 'info@newfork.nl',
            'website' => 'http://www.newfork.nl/',
            'icon' => '/icons/locations/new-fork.svg',
            'address' => 'Erasmus Food Plaza, Sanders building',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);

        Location::create([
            'title' => 'Satebar',
            'description' => 'In Indonesia, you will find the best satay along the road side. Break the journey for good food and a chat. In Holland, you just come to Satebar - the place for the tastiest of satays since 2005!',
            'email' => 'info@satebar.nl',
            'website' => 'http://www.satebar.nl/',
            'icon' => '/icons/locations/satebar.svg',
            'address' => 'Erasmus Food Plaza, Sanders building',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);


        Location::create([
            'title' => 'Starbucks',
            'description' => '
                <h2>Wereldse koffie op een campus van wereldformaat</h2>
                <p>Het is maar een kort moment - gewoon een hand die over de toonbank een andere uitgestoken hand een beker aanreikt. Maar er is connectie.</p>
                <p>Wij van Starbucks zorgen dat alles wat we doen in het teken staat van die verbinding - van ons streven naar koffie van de beste kwaliteit ter wereld tot de manier waarop we ons samen met onze klanten en omgeving inzetten voor verantwoord zaken doen.</p>
                <p>Vanaf het begin, met één vestiging bijna 40 jaar geleden, hebben we overal waar we zijn geweest en bij alles wat we aanraken, geprobeerd het wat beter te maken dan we het aantroffen.</p>',
            'email' => 'starbucks8419@albron.nl',
            'website' => 'http://www.starbucks.nl/',
            'icon' => '/icons/locations/starbucks.svg',
            'address' => 'Erasmus Food Plaza, Sanders building',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);

        Location::create([
            'title' => 'Supermarkt Spar',
            'description' => '',
            'email' => 'universityeur@despar.info',
            'website' => 'http://www.denkdifferent.nl/',
            'phone' => '+31 (010) 25 40432',
            'icon' => '/icons/locations/spar.svg',
            'address' => 'Erasmus Food Plaza, Sanders building',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);

        Location::create([
            'title' => 'Tosti World',
            'description' => 'Voor een snel ontbijt of een gezonde lunch kun je altijd terecht bij Tosti World voor een driedubbele tosti met wit of bruin brood. Je kunt kiezen uit wel 26 verschillende tosti’s.',
            'email' => 'marcworks@tostiworld.nl',
            'website' => 'http://www.tostiworld.nl/',
            'phone' => '+31 (024) 365 68 45',
            'icon' => '/icons/locations/tosti-world.svg',
            'address' => 'Erasmus Food Plaza, Sanders building',
            'postal_code' => '3062 PA',
            'city' => 'Rotterdam',
            'country' => 'NL',
            'latitude' => 51.916901,
            'longitude' => 4.525850,
            'created_by' => 1,
        ]);
    }
}
