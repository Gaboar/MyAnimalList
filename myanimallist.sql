-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 14. 01:37
-- Kiszolgáló verziója: 10.4.22-MariaDB
-- PHP verzió: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `myanimallist`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `allatok`
--

CREATE TABLE `allatok` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_hungarian_ci NOT NULL,
  `alias` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `leiras` text COLLATE utf8_hungarian_ci NOT NULL,
  `tipus` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `ertekelesdb` int(11) NOT NULL,
  `ertekeles` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `allatok`
--

INSERT INTO `allatok` (`id`, `name`, `alias`, `leiras`, `tipus`, `ertekelesdb`, `ertekeles`) VALUES
(1, 'Macska (Felis silvestris catus)', 'Macska', 'A macska, más néven házi macska (Felis silvestris catus) kisebb termetű húsevő emlős, amely a ragadozók rendjén belül a macskafélék (Felidae) családjának Felis neméhez és vadmacska (Felis silvestris) fajához tartozik. A vadmacska alfaja. Ügyes ragadozó, több mint 1000 faj tekinthető a zsákmányának. Emellett meglehetősen intelligens, beidomítható egyszerű parancsok végrehajtására vagy szerkezetek működtetésére - illetve képes önállóan is kisebb feladatok betanulására.\r\n\r\nKörülbelül 10 000 évvel ezelőtt kezdett az ember társaságában élni, háziasításának első ábrázolása mintegy 4000 éve Egyiptomban történt.\r\n\r\n2004-ben Jean-Denis Vigne és kollégái (Nemzeti Természettudományi Múzeum, Párizs) jelentése a macska háziasítására vonatkozó legkorábbi tárgyi bizonyíték feltárásával foglalkozik. A lelet egy ciprusi emberi sírból került elő, melyben egy meghatározatlan nemű felnőtt ember és egy macska csontjai találhatók. A lelet mintegy 9500 éves. A sírból a csontok mellett kőszerszámok, vasoxid-maradványok, maroknyi tengeri kagyló és (az emberi csontoktól 40 cm-re) a saját sírjából egy nyolc hónapos macska csontváza került elő, melyet az emberrel megegyezően nyugati irányba nézve fektettek. Mivel a macska nem őshonos a Mediterrán medence szigetein, ezért csak a szárazföldről kerülhetett oda, minden bizonnyal a közeli levantei partokról. A lelet az ember és a macska tudatos együttélésének bizonyítéka kb. 10 000 évvel ezelőttről a mai Közel-Keletnek nevezett területen. Ez összhangban van a genetikai kutatások eredményeivel is, melyek szintén ezt a földrajzi és időbeli eredetet erősítik. Úgy tűnik, a macska háziasítása az első emberi települések létrejöttének idején, a neolitikus korban történhetett a termékeny félholdként ismert területen.\r\n\r\nA macskának számos fajtája és színváltozata létezik. Csupasz és farok nélküli változatait is kitenyésztették. A macskák több mint százféle hangjel és testbeszéd segítségével kommunikálnak, mint például nyávogás („miaú”), dorombolás, bújás, fújás, morgás, perregés. A lovakhoz és más háziállatokhoz hasonlóan a macskák is képesek vadon élve fennmaradni. Az önállóan élő macskák gyakran kisebb kolóniákat alkotnak. Az állatvédők beszámolói szerint azonban hosszú távon csak igen kevés példány képes gazdátlanul életben maradni, többségüket elpusztítják a járművek, a ragadozók, az éhség, az időjárás viszontagságai és a betegségek. Ezért számos országban, köztük hazánkban is a macskák és más háziállatok elhagyása, illetve otthonukból való szándékos eltávolítása (bántalmazásukhoz hasonlóan) büntetendő. A macska sok kultúra legendáiban és mítoszaiban tölt be jelentős szerepet, az egyiptomiak, a kínaiak és a vikingek ősi történeteiben is szerepel. Általában tisztelik, de olykor becsmérlik is.', 'Ragadozó', 6, '8.83'),
(2, 'Kutya (Canis lupus familiaris)', 'Kutya', 'A kutya a farkas egy mára már kihalt alfajának háziasításával (domesztikációjával) jött létre, amint azt mitokondriális DNS-adatok is bizonyítják. A háziasítás kezdetének időpontját tudományos viták övezik, de általában 10 000–100 000 évvel ezelőttre teszik, vagyis a kutya a középső kőkorszak vagy az újkőkorszak óta társa az embernek. A háziasítás kezdeteiről semmilyen dokumentum sem maradt fent, ezért főképp feltételezésekre, illetve régészeti leletekre hagyatkozhatunk. A németországi Oberkassel környékén feltártak egy hozzávetőleg 33 ezeréves kutya-állkapcsot, amely a legkorábbi ismert háziasított állat maradványa lehet, illetve Szibériában egy koponyát. A két lelet azt a feltételezést támasztja alá, hogy a domesztikáció egyszerre több helyen párhuzamosan ment végbe.\r\n\r\nMivel a kutya és az ember több tízezer éve együtt él, emiatt gyakran közös genetikai nyomásnak voltak kitéve, ezért több hasonló genetikai változást lehet felfedezni a két faj fejlődésében.', 'Ragadozó', 2, '9.50'),
(4, 'Szarvasmarha (Bos taurus taurus)', 'Szarvasmarha', 'A szarvasmarha (Bos taurus) az emlősök (Mammalia) osztályának párosujjú patások (Artiodactyla) rendjébe, ezen belül a tülkösszarvúak (Bovidae) családjába tartozó faj. Húsáért kezdték tenyészteni, később tejét is hasznosították, sőt, az ember munkáját is segítette igavonóként. Azóta számos fajtáját tenyésztették ki, részben visszakeresztezve a vad rokonokkal. Várható élettartama 21 év.\r\nA zebu ősét egyes szerzők külön fajnak tekintik (Bos namadicus), ez azonban vitatott, mivel keresztezhető a közönséges szarvasmarhával, de a többi rokon fajjal csak korlátozottan. Az európai bölénnyel keresztezve żubroń, az amerikai bölénnyel keresztezve beefalo, a jakkal keresztezve dzo (hímnemű) vagy zhom születik. Ázsiában több rokon fajt is háziasítottak, így a bantenget, a gaurt és a jakot. A vad rokonok azóta veszélyeztetettekké váltak.\r\nAz eddig megnevezett fajokkal szemben a vízibivaly a Bubalus nembe tartozik. Belőle háziasították a házi bivalyt.\r\nUgyan a szarvasmarhát leginkább tej- és hústermelésre használják, a gépesítés előtt jelentős volt az aránya az igavonásban is; az igába - amely szekérhez vagy ekéhez van kötve - főleg az ökröket (kiherélt bikák) használták, illetve egyes térségekben még használják fel, de ha nem túl nagy a teher, akkor tehenet is igába lehet fogni. Ezenkívül felhasználják a tülkét, valamint a bőrét is. Trágyája felhasználható trágyázás céljára, de lehet belőle tüzelő vagy építőanyag is. A rideg tartású fajták tájgondozást is végeznek, mint a skót felföldi marha, a magyar szürkemarha, a heck-marha, a Galloway-marha vagy a dél-európai ősi fajták.\r\nA Newcastle-i Egyetem munkatársai 516 tejtermelő megkérdezése nyomán kimutatták, hogy a tehén több tejet ad, ha a gazdája a nevén szólítja, mint ha csupán a csorda részeként kezelnék.\r\nHasznosítás szerint vannak tejtermelő, hústermelő és vegyes hasznosítású fajták. A közöttük levő különbségek genetikailag meghatározottak. A specializáció a 18. században kezdődött. A magas tejtermelésű képességű fajták szervezetében a növekedési hormon magasabb szintjét mérték. A húsmarhákat arra tenyésztették, hogy húsuk szerkezete kedvezőbb legyen. Régebben a vágóba szánt hímnemű állatokat kasztrálták, ugyanebből a célból. Vágnak mind hím-, mind nőnemű egyedeket. Vannak fajták, melyek gyorsan nőnek, és vannak, amelyeknek inkább a végsúlyuk nagy.', 'Növényevő', 1, '7.00'),
(5, 'Mezei veréb (Passer montanus)', 'Veréb', 'A mezei veréb (Passer montanus) a madarak (Aves) osztályának verébalakúak (Passeriformes) rendjébe és a verébfélék (Passeridae) családjába tartozó faj. A Magyar Madártani és Természetvédelmi Egyesület 2007-ben „Az év madarává” választotta.\r\nMagas északot leszámítva egész Európa, egész Szibéria Japánig és Kínáig, továbbá valószínűleg Észak-Afrika is. Közép- és Délnyugat-Ázsiában, Indiában, Szumátra, Jáva, Borneó és Tajvan szigetén különböző alfajokban fordul elő. Szabad mezők, lomberdők lakója. Az emberi lakások környékét leginkább csak télen keresi föl.\r\n\r\nEredeti elterjedési területén kívül a következő területekre betelepítették: Fülöp-szigetek, Mariana-szigetek, Kis-Szunda-szigetek, Celebesz, Ausztrália, az Egyesült Államok középső része, Malajzia keleti része és Szingapúr. Nem sikerült meghonosítani Új-Zélandon és a Bermuda-szigeteken.\r\nHossza 12,5-14 centiméter, szárnyfesztávolsága 21-26 centiméter, testtömege 24-38 gramm. Feje teteje, halántéka és nyakszirtje vörösbarna. Szemsávja, a szeme alatt levő sáv, hátsó fültájék-foltja és az állát-torkát beborító nagy folt fekete. Pofája és nyaka felső része fehér; hasi oldala fehéresbarnás.\r\n\r\nVedlési időszaka június közepétől kb. novemberig tart. Az adult egyedek a fészkelést befejezve postnuptialis, a fiatalok a fészket elhagyva postjuvenilis komplett vedlést végeznek. Az elsőrendű evezők átvedlésének harmadánál kezdődik a másod- és harmadrendű evezők, valamint a kormánytollak cseréje, és közel azonos időben fejeződnek be. A másodrendű evezőkkel közel egy időben indul a faroktollak váltása. A tollazat cseréje során az egyedek mindvégig röpképesek maradnak. A hosszú vedlési időszak (közel 5 hónap) abból következik, hogy az első költés fiataljai a kirepülés után nem sokkal elkezdik vedlésüket, az öreg madarak nagyjából a második fészekalj fiataljaival vedlenek egy időben, néhány madár pedig harmadszor is költ, és pótköltés is előfordul. Így az utolsók csak ősz vége felé fejezik be vedlésüket. Egy-egy egyednek mindössze kb. 70 napra van szüksége a teljes folyamathoz hazánkban és a környező országokban, míg az északabbra (például Nagy-Britanniában) élőknek ettől kevesebbre, 60 napra, ennek oka az, hogy az északi területeken élőknek kevesebb idő áll rendelkezésükre, mint délebbre élő fajtársaiknak. Különbség figyelhető meg a fiatalok és az idősebb példányok között is, előbbiek lassabban váltanak tollruhát, míg utóbbiak gyorsabban.\r\n\r\nA házi verebet a mezei verébtől többek közt úgy lehet megkülönböztetni, hogy a mezei verébnek van pofafoltja, míg a házi verébnek nincs.\r\nŐsszel és télen gyommagvakkal táplálkozik. Tavasszal és nyáron hernyók és levéltetvek teszik ki az étrendjét. Nem vonuló, állandó madár. Régebben kártevőnek minősítették és irtották is, mert megdézsmálta a gabonaföldeket.\r\nFaodvakban, elvétve háztetőkön fészkel, 2-3-szor évenként, de elfoglaja a fecskefészkeket, a hasznos odulakók részére kihelyezett mesterséges fészekodvakat is. Az első fészekalj áprilisban, a második júniusban, a harmadik pedig augusztusban teljes. Fészke gyökerekből, szénából és tollakból van magasra halmozva. Fészke kerek, melyet oldalbejáróval épít. 5-6 tojása szennyesfehér alapon sűrűen borítva szürke és szürkésbarna pontokkal és foltokkal tarkított.', 'Mindenevő', 1, '9.00'),
(6, 'Szarvas (Cervidae)', 'Szarvas', 'A szarvasfélék vagy szarvasok (Cervidae) az emlősök (Mammalia) osztályába és a párosujjú patások (Artiodactyla) rendjébe tartozó család.\r\n\r\nA családba ötvenöt recens faj tartozik, ezekből egy, a Schomburgk-szarvas (Rucervus schomburgki) kihalt a túlvadászás miatt. Az elfogadott fajok mellett bizonytalan helyzetűek, illetve a recens nemekben fosszilis fajok is vannak.\r\n\r\nEbben az emlőscsaládban korábban négyalcsaládot tartottak számon, azonban az újabb DNS-vizsgálatok, melyek a mitokondriális citokróm-b gént voltak hivatottak feltérképezni, azt mutatták, hogy a szarvasféléken belül, csak két alcsalád van. A muntyákszarvasformákat (Muntiacinae) behelyezték a szarvasformák (Cervinae) közé, míg a magányos víziőz (Hydropotes inermis) az őzformák (Capreolinae) alcsaládjába került; azonban mivel alaktanilag eléggé eltér új alcsaládjának többi tagjától, egyes rendszerezők még mindig a hagyományos alcsaládjába sorolják be.\r\n\r\nA legkorábbra tehető szarvaskövületet az európai oligocén rétegben találták meg. A későbbi ősszarvasok nagyobb testűek voltak és agancsuk is fejlettebb volt. Ilyen faj a késő pleisztocén korból származó leletekben megtalált Eucladoceros és az óriásszarvas (Megaloceros giganteus), amely agancsának fesztávolsága elérte a 3,65 métert.\r\n\r\nA szarvasfélék nagy területen terjedtek el. A család fajai megtalálhatók minden kontinensen az Antarktisz és Ausztrália kivételével; az utóbbira betelepítettek néhány fajt. Észak-Afrikában manapság csak egy faj él, ez a gímszarvas, amelynek utolsó példányai az Atlasz-hegységbe szorultak vissza.\r\n\r\nA szarvasfélék a párosujjú patások második legnagyobb családja. A víziőz kivételével mindegyik fajnak van agancsa. A víziőz és a Muntiacini-fajok felső szemfoga meghosszabbodott. Az állandó szarvú antilopokkal ellentétben a szarvasfélék agancsa minden évben elhull, és a következő évben újra kinő. Bár a pézsmaszarvasfélék (Moschidae) családjának a nevében a „szarvas” szó is szerepel, ezek nem tartoznak ide. A pézsmaszarvasfélék konvergens evolúciót mutatnak a muntyákszarvasformákkal, de leginkább a víziőzzel, mivel azok felső szemfogai is meghosszabbodtak, agancsuk pedig nincsen.\r\n\r\nA család fajainak élőhelyei nagyon eltérőek: a tundrától a trópusi esőerdőkig. Bár a szarvasféléket sokszor az erdőkkel társítjuk, sok faj az erdők és füves puszták közötti átmeneti területen él. A legtöbb nagy testű faj a mérsékelt övi lombhullató erdőkben, a magashegyi vegyes fenyvesekben, a trópusi időszakosan száraz erdőkben vagy a füves pusztákon él. Mivel lerágják a fiatal fák kérgét és így elpusztítják a sarjadékot, gyakran utat nyitnak az aljnövényzetnek (füvek, lágy szárú növények). Néha belekóstolnak a kultúrnövényekbe is. Ahhoz, hogy egy adott helyen egészséges állomány alakuljon ki, erdőkre vagy legalább cserjesekre van szükség.\r\n\r\nA sűrű erdőket kedvelik, a nyílt térségeket kerülik az olyan kisebb fajok, mint a nyársasszarvasok és törpeszarvasok Közép- és Dél-Amerikában, valamint az ázsiai muntyákszarvasformák, éppen a névadó indiai muntyákszarvas kivételével. Némely fajok egy-egy konkrét élőhelyre specializálódtak, és csak ezeken fordulnak elő, így egyes szarvasfélék csak a hegyvidéken, mások a sztyeppén, mocsárban vagy a mocsár és a sivatag közti élőhelyeken élnek. Néhány faj a sarkvidék közelébe húzódott: ilyen a rénszarvas, amely az arktikus tundrán és tajgán él, valamint a jávorszarvas, amely a tajgán és környékén található meg. Az andesi villásszarvasok azt az ökológiai fülkét töltik be, amit az Óvilágban a kecskeformák; borjaik a többi szarvasborjútól eltérően inkább kecskegidaszerűen játszanak.\r\n\r\nA ma élő szarvasfélék mérete a 8–10 kilogrammos északi törpeszarvastól a 200–700 kilogrammos jávorszarvasig változik. Testük általában karcsú, gerincük egyenes és hosszú. Erős lábukkal jól futnak az erdős talajon, kitűnően ugranak és úsznak.\r\n\r\nKérődzők, négy részből álló összetett gyomorral. A nyelőcső után a bendő (rumen) található, majd a recésgyomor (reticulum) következik. A harmadik rész a leveles vagy százrétű gyomor (omasus), az oltógyomor (abomasus). Ezzel a rendszerrel a füveket, a leveleket és kérgeket is meg tudják emészteni. Fogazatuk jól alkalmazkodott a növényevéshez; mint a többi kérődzőnek, a szarvasféléknek sincsenek felső metszőfogai, helyükön a szájpadlás kemény nyúlványa található. Egyes fajok, mint a Rùm-szigeti gímszarvas vagy a rénszarvas, az állati eredetű táplálékot is megeszik, ha hozzájutnak. A víziőz, a bóbitás szarvas és a muntyákszarvasok felső szemfogai meghosszabbodtak, míg más fajoknál a felső szemfog gyakran hiányzik. Őrlőfogaikon félkör alakú a fogzománc, ami igen változatos növények fogyasztását teszi lehetővé.\r\nMajdnem az összes faj szeme előtt szagmirigy van; az állat területének határát ezzel az erős szagú feromonnal jelöli meg. Sok faj bikája szélesre széttárja mirigyeit, amikor mérges vagy izgatott. Mindegyik szarvasfélének epehólyag nélküli mája van. Szemükben egy tapetum lucidum nevű fényvisszaverő réteg segíti éjjeli látásukat.\r\n\r\n', 'Növényevő', 1, '8.00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ertekeles`
--

CREATE TABLE `ertekeles` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `allatid` int(11) NOT NULL,
  `ertekeles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `ertekeles`
--

INSERT INTO `ertekeles` (`id`, `username`, `allatid`, `ertekeles`) VALUES
(1, 'martin', 1, 10),
(2, 'hecker', 1, 10),
(3, 'ezszalai', 1, 9),
(4, 'valter', 1, 9),
(5, 'NagyKakas', 1, 10),
(6, 'goblin', 1, 5),
(7, 'hecker', 2, 10),
(8, 'martin', 4, 7),
(9, 'martin', 2, 9),
(10, 'martin', 5, 9),
(11, 'martin', 6, 8);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(14) COLLATE utf8_hungarian_ci NOT NULL,
  `password` text COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `szulido` date NOT NULL,
  `nem` tinyint(1) NOT NULL,
  `bemutatkozas` text COLLATE utf8_hungarian_ci NOT NULL,
  `kedvencid` int(11) NOT NULL,
  `profilkep` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `nemlathato` tinyint(1) NOT NULL,
  `szullathato` tinyint(1) NOT NULL,
  `isadmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `szulido`, `nem`, `bemutatkozas`, `kedvencid`, `profilkep`, `nemlathato`, `szullathato`, `isadmin`) VALUES
(1, 'martin', 'b6f8d434a847fb0f0c1a8d9b936b8ca952e224f205a55f4ba9b2c20f88fdc9e7', 'martin@martin.martin', '2002-06-25', 1, 'Martin vagyok, boss.', 1, 'martin.jpg', 1, 1, 1),
(2, 'hecker', '9d7edb6445cc938ea3a19bb3549be9ec203c2f986cc9c2bec65cb08a55702cc2', 'hecker@l33t.com', '1998-02-22', 1, 'hecker vagyok a hegyről', 1, 'hecker.png', 1, 1, 1),
(3, 'figura', '2bcf69e7fd9457b4aa5279953698a21867aeca55c3c870d816f8f19ab8d2c4a1', 'figura@kapufa.hu', '0000-00-00', 1, 'néptáncol a nyakamon 4 lánc, de te mit látsz, mátkám, néptáncol a nyakamon 4 lánc, rázzad a feneked néptánc néptánc néptánc', 0, 'figura.jpg', 0, 0, 0),
(4, 'valter', '29be43d35cb3b16d2a6c931495db103373cae3cf16e7217dffb85df217c5568b', 'ibbigang@otlinc.hu', '0000-00-00', 1, '100 évig élek és befalok 100 tortát, oda megyek ahol nem vár több lábnyom már', 0, 'valter.jpg', 0, 0, 0),
(5, 'ezszalai', '7ba7d31bfa1ed86327ecfa9deb2dd8a44488fba943ca78c86c1e21f2d1be0a10', 'ezszalai@ibbigang.com', '0000-00-00', 1, 'otl matricák végig a suli falán ezek másolják a házink de nem értik igazán amit hoztok copy paste tiszta fuf kirakat fufufull büdös a szád tesó nem mond igazat', 1, 'ezszalai.jpg', 0, 0, 0),
(6, 'NagyKakas', '408f31d86c6bf4a8aff4ea682ad002278f8cb39dc5f37b53d343e63a61f3cc4f', 'bruh@gmail.com', '6969-06-09', 1, 'nagy kakas', 1, 'NagyKakas.jpg', 0, 0, 0),
(7, 'goblin', 'f59ddf918f384a1b7e1d1011c49c3f3fd38421fc3ed3d90dfaa9bb1633325478', 'goblin@clash.royale', '2016-03-02', 1, 'hehehe ha grrr hehehe ha grrr hehehe ha grrr', 0, 'goblin.png', 1, 1, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenet`
--

CREATE TABLE `uzenet` (
  `id` int(11) NOT NULL,
  `feladonev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `vevonev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `ido` datetime NOT NULL,
  `uzenet` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `uzenet`
--

INSERT INTO `uzenet` (`id`, `feladonev`, `vevonev`, `ido`, `uzenet`) VALUES
(1, 'martin', 'hecker', '2022-04-09 19:31:50', 'Csá hecker!'),
(2, 'hecker', 'martin', '2022-04-09 19:35:21', 'na mi a helyzet martin, aki egy a boss?!'),
(3, 'martin', 'hecker', '2022-04-09 19:50:21', 'semmi tesom csak lazulok tudod'),
(4, 'martin', 'hecker', '2022-04-09 19:50:33', 'semmi tesom csak lazulok tudod'),
(5, 'hecker', 'martin', '2022-04-09 19:51:04', 'ja jolvan akkor more'),
(6, 'hecker', 'martin', '2022-04-09 19:51:31', 'de miert irtad le ketszer'),
(7, 'martin', 'hecker', '2022-04-09 19:51:33', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(8, 'hecker', 'martin', '2022-04-09 19:51:35', 'kutya'),
(9, 'martin', 'hecker', '2022-04-09 19:51:58', '??????'),
(10, 'martin', 'hecker', '2022-04-09 19:52:09', ''),
(11, 'martin', 'hecker', '2022-04-09 19:54:02', ''),
(12, 'martin', 'hecker', '2022-04-09 20:03:34', 'asd'),
(13, 'hecker', 'martin', '2022-04-09 20:06:01', 'csao'),
(14, 'hecker', 'martin', '2022-04-09 20:08:41', 'kokain'),
(15, 'valter', 'hecker', '2022-04-09 23:12:51', 'szia hecker érdekel 100 beat 100 flow és egy tátott száj?'),
(16, 'hecker', 'valter', '2022-04-09 23:14:01', 'nem'),
(17, 'valter', 'hecker', '2022-04-09 23:14:23', 'nem is adtam volna mert ez más still más genetika más pontszám'),
(18, 'valter', 'NagyKakas', '2022-04-09 23:42:38', 'szia udv az oldalon! :) kell 100 beat 100 flow es egy tatott szaj?'),
(19, 'NagyKakas', 'valter', '2022-04-09 23:43:48', 'nekem csak segg izű elfbarod?'),
(20, 'NagyKakas', 'valter', '2022-04-09 23:44:13', 'mennyiert adód'),
(21, 'valter', 'NagyKakas', '2022-04-09 23:44:18', ':) :D'),
(22, 'valter', 'NagyKakas', '2022-04-09 23:44:31', '100 év életért :D'),
(23, 'NagyKakas', 'valter', '2022-04-09 23:45:10', 'ne legyel buzi'),
(24, 'goblin', 'NagyKakas', '2022-04-09 23:52:04', 'hehehe ha'),
(25, 'NagyKakas', 'goblin', '2022-04-09 23:53:31', 'boblin garrel'),
(26, 'goblin', 'NagyKakas', '2022-04-09 23:53:52', 'grrr'),
(27, 'NagyKakas', 'goblin', '2022-04-09 23:54:10', 'kurva anyad'),
(28, 'goblin', 'figura', '2022-04-09 23:59:26', 'grrr'),
(29, 'hecker', 'hecker', '2022-04-10 02:41:04', 'hek'),
(30, 'hecker', 'martin', '2022-04-10 02:42:25', ' '),
(31, 'hecker', 'martin', '2022-04-10 11:19:11', 'uzenet?');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `allatok`
--
ALTER TABLE `allatok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `ertekeles`
--
ALTER TABLE `ertekeles`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `uzenet`
--
ALTER TABLE `uzenet`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `allatok`
--
ALTER TABLE `allatok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `ertekeles`
--
ALTER TABLE `ertekeles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `uzenet`
--
ALTER TABLE `uzenet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
