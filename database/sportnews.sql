-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2024 pada 16.50
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportnews`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'heru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` varchar(10) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `liga` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `headline` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `penulis`, `judul`, `isi`, `sumber`, `liga`, `kategori`, `tanggal`, `headline`) VALUES
('b01', 'Susanto Mario', 'SEA Games 2023: Susunan Pemain Timnas Indonesia', 'Timnas Indonesia U-22 berhadapan dengan Timor Leste dalam lanjutan Grup A SEA Games 2023. Berikut susunan pemainnya!<br><br>\r\nIndonesia vs Timor Leste akan berlangsung di National Olympic Stadium, Phnom Penh, Kamboja, Minggu (7/5/2023). Laga itu kickoff pada pukul 16.00 WIB.<br><br>\r\nDi klasemen SEA Games 2023 Grup A, Indonesia masih ada di posisi teratas. Tim Merah-Putih sudah mengumpulkan sebanyak enam poin hasil dari dua kali bermain. Kemenangan bisa mengantarkan Indonesia mengunci tiket ke semifinal. Demi meraih hal itu, pelatih Indra Sjafri masih mengandalkan Muhammad Ramadhan Sananta di lini depan.<br><br>\r\nMarselino Ferdinan, yang sangat sip sejak matchday pertama, kembali menjadi starter. Witan Sulaiman juga main sejak awal untuk menopang Sananta.', 'DETIK.com', 'Indonesia', 'Indonesia', '2023-05-07 15:19:00', 0),
('b02', 'Radila', 'Tiga Tim Liga Inggris yang Belum Erling Haaland Jebol', '- Erling Haaland langsung menjelma jadi mesin gol tajam Manchester City dan pecahkan rekor-rekor. Tapi rupanya, ada tiga tim Liga Inggris yang belum dijebolnya.<br><br>\r\nErling Haaland sudah pecahkan rekor pencetak gol terbanyak Liga Inggris selama semusim, dengan 35 gol. Haaland sang pembelian baru Manchester City itu sepertinya tak butuh lama waktu untuk beradaptasi di kerasnya Premier League.<br><br>\r\nErling Haaland sudah kemas total 51 gol dari 45 laga di seluruh kompetisi. Masih berusia 22 tahun, masa depan pemain asal Norwegia itu dinilai cerah betul.<br><br>\r\nDilansir dari berbagai sumber, Erling Haaland sudah jadi mimpi buruk tim-tim Liga Inggris. Usut punya usut rupanya masih ada tiga tim yang belum pernah Haaland jebol sejauh ini!<br><br>\r\nTiga tim itu adalah Liverpool, Brentford, dan Chelsea. Namun, Haaland masih punya peluang untuk jebol dua tim terakhir.', 'INDOSPORT.COM', 'Inggris', 'Internasional', '2023-03-26 09:00:00', 0),
('b03', 'Alifia Khairunnisa', 'Lionel Messi Mendekat ke Liga Arab Saudi Eks Bomber Man United Bisa Terusirnaknya Bertahan di Madri', '– Lionel Messi merapat ke Liga Arab Saudi, Al-Hilal, eks bomber Manchester United bernama Odion Ighalo bisa saja terusir.<br><br>\r\nLionel Messi sudah dipastikan tidak akan membela Paris Saint-Germain lagi, apalagi setelah pria berusia 35 tahun itu ‘berulah’.<br><br>\r\nYa, megabintang asal Argentina itu malah bertolak ke Arab Saudi tanpa izin dari PSG yang membuat klub mencak-mencak karenanya.\r\n<br><br>\r\nPasalnya, Les Parisiens menghukum pemainnya dengan tak diberi waktu libur karena kalah 1-3 dari Lorient dalam laga lanjutan Liga Prancis pada Minggu (30/04/23) lalu.<br><br>\r\nAlhasil, efek domino dari tindakan Lionel Messi itu membuat Paris Saint-Germain ogah memperpanjang kontraknya yang akan berakhir akhir musim nanti.<br><br>\r\nSementara itu, pakar transfer Calciomercato, Rudy Gatti, mengabarkan bahwa peraih tujuh Ballon d’Or itu bisa membela klub Arab Saudi, Al Hilal, musim depan.<br><br>\r\nAl Hilal dikabarkan menaikkan tawaran sekitar 500 juta dolar AS pada Messi supaya La Pulga tergoda untuk merapat ke Arab Saudi.', 'Bola.net', 'France', 'Internasional', '2023-04-11 01:22:00', 0),
('b04', 'Hakim Rasyid', 'ISC Diundur, Adam Alis Sedih', '- Gelandang Barito Putera, Adam Alis angkat bicara terkait kabar diundurnya kick-off Indonesia Soccer Championship (ISC). Pesepakbola asal Jakarta itu menilai kabar tersebut membuatnya merasa sedih.\r\n<br><br>\r\n\"Duh kalau buat saya bukan cuma kesel, tapi juga sedih,\" ujar Adam saat dihubungi Bola.net, Jumat (8/4).\r\n<br><br>\r\nKekecewaan Adam bukan tanpa alasan. Sebab, mantan pemain Tim Nasional (Timnas) U23 Indonesia itu sudah sangat rindu berlaga di kompetisi sepakbola tanah air.\r\n<br><br>\r\n\"Pastinya sebagai pemain saya berharap ISC cepat bergulir karena sudah terlalu lama kami menunggu,\" ungkap Adam.\r\n<br><br>\r\nISC sendiri sebelumnya direncanakan bergulir pada 16 April mendatang. Namun, hingga saat ini belum ada kepastian kapan ISC akan dihelat sejak kabar pengunduran jadwal pembukaan tersebut beredar.\r\n<br><br>\r\n\"Dengan tidak adanya kepastian sama saja pemain di php-in (pemberi harapan palsu),\" pungkas Adam. <b>(fit/asa)</b>', 'okezone.com', 'Indonesia', 'Indonesia', '2023-02-02 12:35:00', 0),
('b05', 'Yesi Yosita', 'Hala Madrid! Ucapan Terima Kasih Kapten Real Madrid Usai Juara', '- Kesuksesan <b>Real Madrid</b> meraih trofi Liga Champions disambut penuh sukacita suporternya. Pesta pun digelar di stadion kebanggaan mereka, Santiago Bernabeu.\r\n<br><br>\r\nHadir dalam pesta di Bernabeu tersebut seluruh permain Real Madrid dan juga tim pelatih. Hampir semua pemain memberikan sambutan di depan suporter Los Blancos yang memenuhi bernabeu salah satunya Sang Kapten, Sergio Ramos.\r\n<br></br>\r\n<i>Kami telah berjuang untuk impian juara Liga Champions dan anda adalah fans yang paling menuntut di dunia karena kami adalah klub terbaik di dunia dan kami harus menikmati trofi ini. Sebagai kapten, ini adalah kehormatan mengenakan ban kapten dengan bergitu banyak tanggung jawab dan mengangkat trofi Liga Champions di tahun pertama saya sebagai kapten adalah mimipi yang jadi kenyataan.<br><br>\r\nBeberaoa tahun yang lalu tak ada yang berpikir bahwa kami bisa memenangkan Liga Champions dua kali dalam tiga tahun, ini butuh kerja yang sangat keras. Pengorbanan dan upaya akhirnya terbayar setelah tahun yang sulit.</i>', 'bolasport.com', 'Champions', 'Internasional', '2023-05-01 20:52:00', 1),
('b06', 'Alizar', 'Giggs Punya Ambisi Jadi Pelatih Terbaik', '-Ikon Manchester United, Ryan Giggs, mengaku ia memiliki ambisi besar untuk menjadi pelatih jempolan di masa yang akan datang.\r\n<br><br>\r\nGiggs mengatakan bahwa ia mendalami dunia manajerial dengan sama seriusnya, seperti kala ia masih menjalani masa keemasan sebagai pemain bintang di Premier League.\r\n<br><br>\r\nGiggs mengatakan pada Inside United: \"Saya ingin menjadi yang terbaik sebagai pemain dan saya juga ingin menjadi yang terbaik sebagai pelatih.\"\r\n<br><br>\r\n\"Itu artinya saya harus bekerja keras dan melakukan semua yang saya bisa untuk meraih hal tersebut, namun juga sekaligus menikmati semuanya dan menjalani tantangan yang ada.\"\r\n<br><br>\r\nUnited saat ini tengah menjadi asisten manajer klub, yang diasuh oleh pelatih kepala, Louis van Gaal.\r\n<br><br>\r\nMereka tengah duduk di peringkat lima klasemen sementara liga dan bakal bermain melawan tim yang duduk di urutan dua, Tottenham, di akhir pekan ini. <b>(ins/rer)</b>', 'kompas.com', 'Inggris', 'Internasional', '2023-03-30 17:07:00', 0),
('b07', 'Briptu Norman', 'Rooney Puji Generasi Emas Anyar Inggris', '- Kapten Inggris, Wayne Rooney, mengatakan bahwa manajer Roy Hodgson kini punya banyak pemain muda yang tidak kalah menariknya dengan generasi emas di era Sven-Goran Eriksson.\r\n<br><br>\r\nInggris kini punya gelandang muda Dele Alli, Ross Barkley, dan bek John Stones. Selain itu masih ada nama anyar seperti Eric Dier.\r\n<br><br>\r\n\"Ini adalah tim yang amat menarik. Saya kira ini adalah skuat Inggris paling menarik yang pernah saya lihat, jika boleh jujur. Ada banyak hal yang menarik, tidak hanya dari fans, namun juga dari para pemain,\" tutur Rooney menurut laporan BBC Sport.\r\n<br><br>\r\n\"Kami tahu bahwa kami harus membangun kembali kekuatan kami. Saya ingat dua tahun lalu ada banyak tekanan mengapa tidak ada banyak pemain muda Inggris yang berkualitas.\"\r\n<br><br>\r\n\"Saya ingat pernah duduk bersama Roy Hodgson dan ia mengatakan: Lihat para pemain yang baru bergabung ini, bagaimana bisa orang-orang berkata seperti itu? Dan sekarang, sepertinya semuanya perlahan mulai terbukti.\" <b>(bbc/rer)</b>', 'goal.com', 'Inggris', 'Internasional', '2023-01-17 07:41:00', 0),
('b08', 'Hakim Rasyid', 'Real Madrid Dapat Bernapas Lega, Cedera Camavinga Tak Parah dan Siap Bentrok Lawan Man City', 'Carlo Ancelotti memutuskan untuk melakukan rotasi besar-besaran pada skuadnya saat bentrok dengan Getafe pada pekan ke-34 Liga Spanyol 2022-2023.\r\n<br><br>\r\nAlasannya agar para pemain inti Real Madrid bisa fit saat bertandang ke markas Manchester City pada laga leg kedua semifinal Liga Champions 2022-2023 di Etihad Stadium, Rabu (17/5/2023) waktu setempat atau Kamis pukul 02.00 WIB.\r\n<br><br>\r\nHanya terdapat tiga pilar dalam starting line-up Real Madrid vs Getafe, yaitu Thibaut Courtois, Federico Valverde, dan Eduardo Camavinga.\r\n<br><br>\r\nSementara sisanya adalah pemain cadangan.\r\n<br><br>\r\nHasilnya, El Real berhasil memetik kemenangan tipis 1-0 atas Getafe di Santiago Bernabeu, Minggu (14/5/2023).\r\n<br><br>\r\nGol kemenangan Real Madrid dicetak Marco Asensio pada menit ke-70.\r\n<br><br>\r\nNamun, kemenangan itu harus dibayar mahal oleh Real Madrid karena Eduardo Camavinga mengalami cedera lutut.\r\n<br><br>\r\nCedera tersebut didapatkan gelandang timnas Prancis itu setelah mengalami benturan pada kakinya.', 'BolaSport.com', 'Spanyol', 'Internasional', '2023-05-14 20:07:00', 0),
('b09', 'Aga Deta', 'Bantai Real Madrid 4-0, Malam yang Indah bagi Manchester City', 'Gelandang Manchester United Bernardo Silva mengaku sangat senang dengan keberhasilan timnya mengalahkan Real Madrid dalam ajang Liga Champions.\r\n<br><br>\r\nMan City baru saja mengalahkan Real Madrid dengan skor telak 4-0 di semifinal leg kedua Liga Champions 20/2022. Pertandingan ini berlangsung di Etihad Stadium, Kamis (18/5/2023) dini hari WIB.\r\n<br><br>\r\nBernardo Silva menjadi pahlawan bagi Manchester City. Pemain asal Portugal tersebut memborong dua gol ke gawang Real Madrid di babak pertama.\r\n<br><br>\r\nSetelah unggul dua gol, Manchester City ternyata masih belum puas. Mereka kemudian menambah gol lagi melalui Manuel Akanji dan Julian Alvarez pada babak kedua.\r\n<br><br>\r\nDengan kemenangan ini, Manchester City melaju ke final bermodalkan agregat skor 5-1. Di partai puncak Liga Champions, skuad asuhan Josep Guardiola akan bertemu Inter Milan.\r\n<br><br>\r\nBernardo Silva tidak bisa menahan perasaan gembiranya setelah Manchester City meraih kemenangan penting ini. Terlebih lawan yang mereka kalahkan adalah sang juara bertahan Real Madrid.\r\n<br><br>\r\n\"Ini malam yang indah bagi kami,\" kata Bernardo Silva di situs resmi klub.\r\n<br><br>\r\n\"Kami tahu itu akan sulit. Tetapi bisa mengalahkan tim Madrid ini 4-0 di kandang adalah hal yang luar biasa. Rasanya luar biasa berada di final lagi. Semoga kali ini kami dapat mencoba dan memenangkannya.\"\r\n<br><br>\r\nBernardo Silva juga memuji performa yang ditunjukkan Manchester City saat mengalahkan Real Madrid. Menurutnya, The Citizens sudah tampil luar biasa.\r\n<br><br>\r\n\"Dengan pemain-pemain, kami selalu sangat kuat. Mereka luar biasa sekali lagi hari ini,\" lanjutnya.\r\n<br><br>\r\n\"Mereka membantu kami mendapatkan momentum untuk mengejar Madrid. Kami tahu betapa tangguhnya mereka. Bahkan di babak kedua mereka menekan kami dan bisa saja mencetak gol.\r\n<br><br>\r\n\"Kami sangat tangguh, sangat bersemangat dan terorganisir pada saat yang sama, saya sangat senang dengan penampilan ini.\"', 'Bola.net', 'Champions', 'Internasional', '2023-05-18 23:20:00', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `skor_a` int(11) NOT NULL,
  `skor_b` int(11) NOT NULL,
  `id_jadwal` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `skor_a`, `skor_b`, `id_jadwal`) VALUES
(1, 3, 6, 'j03'),
(2, 2, 2, 'j04'),
(3, 2, 5, 'j08'),
(4, 1, 2, 'j06'),
(5, 1, 3, 'j01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(10) NOT NULL,
  `id_tim1` int(11) NOT NULL,
  `id_tim2` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `liga` varchar(50) NOT NULL,
  `id_stadion` varchar(3) NOT NULL,
  `link_siaran` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_tim1`, `id_tim2`, `tanggal`, `waktu`, `liga`, `id_stadion`, `link_siaran`) VALUES
('j01', 27, 32, '2023-09-21', '14:47:00', 'Spanyol', '1', 'https://www.rctiplus.com/tv/rcti'),
('j02', 29, 40, '2023-05-25', '04:00:00', 'Spanyol', '3', 'https://www.rctiplus.com/tv/rcti'),
('j03', 10, 16, '2023-05-20', '22:00:00', 'Inggris', '13', 'https://www.transtv.co.id/live/trans7'),
('j04', 4, 18, '2023-06-16', '00:30:00', 'Inggris', '13', 'https://www.transtv.co.id/live'),
('j05', 6, 3, '2023-05-07', '20:30:00', 'Inggris', '1', 'https://www.rctiplus.com/tv/mnctv'),
('j06', 62, 75, '2023-06-15', '02:00:00', 'German', '7', 'https://www.rctiplus.com/tv/gtv'),
('j07', 46, 56, '2023-07-05', '22:00:00', 'Italy', '5', 'https://www.transtv.co.id/live'),
('j08', 58, 50, '2023-06-10', '01:40:00', 'Italy', '11', 'https://www.rctiplus.com/tv/gtv'),
('j09', 45, 43, '2023-06-07', '12:28:00', 'Italy', '4', 'https://www.rctiplus.com/tv/gtv'),
('j10', 22, 33, '2023-06-01', '10:00:00', 'Spanyol', '4', 'https://connect-id.beinsports.com/id/tv');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasmen`
--

CREATE TABLE `klasmen` (
  `id_klasmen` varchar(10) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `main` int(5) NOT NULL,
  `menang` int(5) NOT NULL,
  `seri` int(5) NOT NULL,
  `kalah` int(5) NOT NULL,
  `gol_kandang` int(5) NOT NULL,
  `gol_tandang` int(5) NOT NULL,
  `selisih_gol` int(5) NOT NULL,
  `poin` int(5) NOT NULL,
  `liga` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klasmen`
--

INSERT INTO `klasmen` (`id_klasmen`, `id_tim`, `main`, `menang`, `seri`, `kalah`, `gol_kandang`, `gol_tandang`, `selisih_gol`, `poin`, `liga`) VALUES
('kl01', 1, 38, 23, 12, 3, 68, 36, 32, 81, 'Inggris'),
('kl02', 2, 38, 20, 11, 7, 65, 36, 29, 71, 'Inggris'),
('kl03', 3, 38, 19, 13, 6, 69, 35, 34, 70, 'Inggris'),
('kl04', 4, 38, 19, 9, 10, 71, 41, 30, 66, 'Inggris'),
('kl05', 5, 5, 2, 1, 2, 10, 8, 2, 7, 'Inggris'),
('kl06', 6, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl07', 7, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl08', 8, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl09', 9, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl10', 10, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl11', 11, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl12', 12, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl13', 13, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl14', 14, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl15', 15, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl16', 16, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl17', 17, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl18', 18, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl19', 19, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl20', 20, 0, 0, 0, 0, 0, 0, 0, 0, 'Inggris'),
('kl21', 21, 0, 0, 0, 0, 0, 0, 0, 0, 'Spanyol'),
('kl22', 22, 23, 20, 2, 1, 30, 23, 7, 62, 'Spanyol'),
('kl23', 23, 23, 19, 1, 3, 22, 21, 1, 58, 'Spanyol'),
('kl24', 44, 23, 19, 0, 4, 22, 11, 11, 57, 'Italy'),
('kl25', 62, 25, 20, 0, 5, 30, 11, 19, 60, 'German');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stadion`
--

CREATE TABLE `stadion` (
  `id_stadion` varchar(4) CHARACTER SET latin1 NOT NULL,
  `nama_stadion` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stadion`
--

INSERT INTO `stadion` (`id_stadion`, `nama_stadion`) VALUES
('1', 'JIS'),
('10', 'Etihad'),
('11', 'Anfield'),
('12', 'City of Manchester'),
('13', 'Old Trafford'),
('2', 'Wanda Metropolitano'),
('3', 'Signal Iduna Park'),
('4', 'Emirates'),
('5', 'Allianz'),
('6', 'King Power'),
('7', 'Red Bull Arena'),
('8', 'Philips'),
('9', 'Groupama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim`
--

CREATE TABLE `tim` (
  `id_tim` int(11) NOT NULL,
  `nama_tim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tim`
--

INSERT INTO `tim` (`id_tim`, `nama_tim`) VALUES
(1, 'Manchester City'),
(2, 'Arsenal'),
(3, 'Newcastle United'),
(4, 'Manchester United'),
(5, 'Liverpool'),
(6, 'Brigton'),
(7, 'Tottenham Hotspur'),
(8, 'Aston Villa'),
(9, 'Brentford'),
(10, 'Fullham'),
(11, 'Chelsea'),
(12, 'Crystal Palace'),
(13, 'Wolverhampton Wanderers'),
(14, 'Bournemouth'),
(15, 'West Ham United'),
(16, 'Nottingham Forest'),
(17, 'Everton'),
(18, 'Leeds United'),
(19, 'Leicester City'),
(20, 'Southampton'),
(21, 'Barcelona'),
(22, 'Real Madrid'),
(23, 'Atletico Madrid'),
(24, 'Real Socieded'),
(25, 'Villarreal'),
(26, 'Real Betis'),
(27, 'Girona'),
(28, 'Atletic Bilbao'),
(29, 'Osasuna'),
(30, 'Sevilla'),
(31, 'Rayo Vallecano'),
(32, 'Mallorca'),
(33, 'Celta Vigo'),
(34, 'Valencia'),
(35, 'Almeria'),
(36, 'Cadiz'),
(37, 'Valladolid'),
(38, 'Getafe'),
(39, 'Espanyol'),
(40, 'Elche'),
(41, 'Napoli'),
(42, 'Juventus'),
(43, 'Inter Milan'),
(44, 'Lazio'),
(45, 'Ac Milan'),
(46, 'As Roma'),
(47, 'Atalanta'),
(48, 'Fiorentina'),
(49, 'Monza'),
(50, 'Torino'),
(51, 'Bologna'),
(52, 'Udinese'),
(53, 'Sassuolo'),
(54, 'Empoli'),
(55, 'Salernitana'),
(56, 'Lecce'),
(57, 'Spezia'),
(58, 'Verona'),
(59, 'Cremonese'),
(60, 'Samprodia'),
(61, 'Bayern Munchen'),
(62, 'Dortmund'),
(63, 'Leipzig'),
(64, 'Union Berlin'),
(65, 'Freibrug'),
(66, 'Wolfsburg'),
(67, 'Bayern Leverkusen'),
(68, 'Eintracht Frankfurt'),
(69, 'Mainz 05'),
(70, 'Koln'),
(71, 'Monchengladbach'),
(72, 'Bremen'),
(73, 'Augsburg'),
(74, 'Hoffeinhem'),
(75, 'Bochum'),
(76, 'Schalke 04'),
(77, 'VfB'),
(78, 'Herta Berlin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_stadion` (`id_stadion`),
  ADD KEY `id_tim1` (`id_tim1`),
  ADD KEY `id_tim2` (`id_tim2`);

--
-- Indeks untuk tabel `klasmen`
--
ALTER TABLE `klasmen`
  ADD PRIMARY KEY (`id_klasmen`),
  ADD KEY `id_tim` (`id_tim`);

--
-- Indeks untuk tabel `stadion`
--
ALTER TABLE `stadion`
  ADD PRIMARY KEY (`id_stadion`);

--
-- Indeks untuk tabel `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id_tim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_stadion`) REFERENCES `stadion` (`id_stadion`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_tim1`) REFERENCES `tim` (`id_tim`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_tim2`) REFERENCES `tim` (`id_tim`);

--
-- Ketidakleluasaan untuk tabel `klasmen`
--
ALTER TABLE `klasmen`
  ADD CONSTRAINT `klasmen_ibfk_1` FOREIGN KEY (`id_tim`) REFERENCES `tim` (`id_tim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
