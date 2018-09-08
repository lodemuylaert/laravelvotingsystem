<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Parties;
class PartiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parties = [
            ['name' => 'CD&V', 'imgurl' => 'images\partijen\CD&V.png', 'description' => 'Voor CD&V Aalst moet politiek vertrekken vanuit mensen, omdat mensen belangrijk zijn. De mens is de maat van de dingen. Elke mens -ook de Aalstenaar- voelt diep in zich de behoefte een ‘Ik’ te zijn, in alle vrijheid én verantwoordelijkheid, met rechten én plichten tegenover de medemens en de leefomgeving. Tegelijk verlangt eenieder op te gaan in het ‘Wij’ van een gemeenschap. Een gezin, familie, vriendenkring, buurt of vereniging schept met andere mensen om ons heen door empathie, sympathie, medeleven, vriendschap, engagement en liefde.', 'deleted' => false, 'created_at' => Carbon::now('Europe/Brussels'),'updated_at' => Carbon::now('Europe/Brussels')],
            ['name' => 'Groen', 'imgurl' => 'images\partijen\Groen.png', 'description' => 'Sinds maart 2016 startte Groen Aalst met een nieuwe, sterk verjongde bestuursploeg. Samen vormen we een hechte groep die positieve voorstellen en begeleidende acties op touw zetten.  We willen bouwen aan een betere stad waar plaats in voor iedereen, ongeacht afkomst, religie of overtuiging. Tijdens de algemene vergadering van 28 februari 2016 beslisten de leden van Groen Aalst om te focussen op de thema\'s duurzame mobiliteit, klimaatneutrale stad, ruimte voor jeugd, solidair sociaal beleid en sterke lokale economie. ', 'deleted' => false , 'created_at' => Carbon::now('Europe/Brussels'),'updated_at' => Carbon::now('Europe/Brussels')],
            ['name' => 'N-VA', 'imgurl' => 'images\partijen\N-VA.png', 'description' => 'Om werken voldoende lonend te maken, moeten de lasten op arbeid omlaag. Zowel voor de werkgever als voor de werknemer. Bovendien houden we onze welvaart alleen op peil wanneer meer mensen werken. Werklozen moeten sneller terug aan de slag. En vijftigplussers mogen niet uit de arbeidsmarkt worden geweerd. De N-VA wil dan ook werk maken van een economisch beleid gericht op het verlagen van de lasten, het afbouwen van de schuld en het afslanken van de overheid. Tegelijk wil de N-VA de ondernemende Vlaming weer zuurstof geven. De overheid moet niet alles regelen. Door bureaucratie verliezen ondernemers te veel tijd met het invullen van formulieren en het aflopen van loketten. ' , 'deleted' => false, 'created_at' => Carbon::now('Europe/Brussels'),'updated_at' => Carbon::now('Europe/Brussels')],
            ['name' => 'Open Vld', 'imgurl' => 'images\partijen\Open Vld.png', 'description' => 'Open Vld kiest voor economische groei, want dat betekent meer jobs en een betere toekomst. Daarom hebben we meer ondernemerschap nodig. Meer KMO’s dus en meer zelfstandigen, ook in de maakindustrie. Ondernemerschap is een vorm van sociaal engagement. Succesvol ondernemen moet lonen. Ondernemers verdienen respect van de overheid. Omdat we meer durf in onze samenleving nodig hebben, koesteren we ook het recht om te falen. Open Vld wil administratieve, statutaire en fiscale drempels die werken en ondernemen afremmen, verwijderen.' , 'deleted' => false, 'created_at' => Carbon::now('Europe/Brussels'),'updated_at' => Carbon::now('Europe/Brussels')],
            ['name' => 'SD&P', 'imgurl' => 'images\partijen\SD&P.png', 'description' => 'De Sociaal Democraten & Progressieven (SD&P) werden opgericht in Aalst op 20 januari 2014. SD&P gaat voor een eigen, positief en progressief verhaal voor de Aalstenaar en voor Vlaanderen. Deze politieke beweging plaats zich hierdoor in de rijke Aalsterse traditie van politieke en maatschappelijk bewogen figuren zoals Daens, Boon en Van Hoorick en anderen. Sociaal, vooruitstrevend maar ook eigenzinnig. Hun sociaal progressieve erfenis blijft meer dan ooit actueel.' , 'deleted' => false , 'created_at' => Carbon::now('Europe/Brussels'),'updated_at' => Carbon::now('Europe/Brussels')],
            ['name' => 'sp.a','imgurl' => 'images\partijen\sp.a.png',  'description' => 'Hand in hand om discriminatie op de arbeidsmarkt tegen te gaan. Arbeid is de beste remedie om armoede te bestrijden en sociale inclusie te bereiken. Als Aalst wil uitgroeien tot een competitieve en innovatieve economie met een internationale uitstraling moet het investeren in de eigen interculturele realiteit. We moeten streven naar een evenredige participatie van alle groepen en op alle niveaus, een weerspiegeling van onze diverse samenleving op de arbeidsmarkt.' , 'deleted' => false, 'created_at' => Carbon::now('Europe/Brussels'),'updated_at' => Carbon::now('Europe/Brussels')],
            ['name' => 'Vlaams Belang', 'imgurl' => 'images\partijen\Vlaams Belang.png','description' => 'België blijft een trekpleister voor immigratie uit alle windstreken: elk jaar komen meer dan 100.000 vreemdelingen dit land binnen, met alle gevolgen van dien. De massa-immigratie ondermijnt ons sociaal systeem en leidt tot almaar meer samenlevingsproblemen. Het Vlaams Belang pleit voor een waterdichte immigratiestop. Illegale en criminele vreemdelingen moeten effectief worden uitgewezen. Vreemdelingen die hier legaal verblijven, moeten zich aanpassen aan onze waarden en normen. Niet omgekeerd. ' , 'deleted' => false , 'created_at' => Carbon::now('Europe/Brussels'),'updated_at' => Carbon::now('Europe/Brussels')],

        ];
        DB::table(CreatePartiesTable::TABLE)->insert($parties);

    }
}
