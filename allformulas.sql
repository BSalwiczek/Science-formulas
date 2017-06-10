-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Lip 2016, 14:46
-- Wersja serwera: 5.6.24
-- Wersja PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `formulas`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `allformulas`
--

CREATE TABLE IF NOT EXISTS `allformulas` (
  `formula_id` int(11) NOT NULL,
  `titleEN` text CHARACTER SET utf8 NOT NULL,
  `titlePL` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `linkToGenerator` text COLLATE utf8_general_mysql500_ci NOT NULL COMMENT 'https://www.codecogs.com/latex/eqneditor.php',
  `position` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `symbolsEN` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `symbolsPL` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `imageName` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `descriptionEN` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `descriptionPL` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `tags` text COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Zrzut danych tabeli `allformulas`
--

INSERT INTO `allformulas` (`formula_id`, `titleEN`, `titlePL`, `linkToGenerator`, `position`, `symbolsEN`, `symbolsPL`, `imageName`, `descriptionEN`, `descriptionPL`, `tags`) VALUES
(1, 'Area of square', 'Pole koła', 'https://latex.codecogs.com/gif.latex?\\dpi{120}&space;\\huge&space;A=a^{2}', 'Math/Geometry/Area', 'a - length of side', 'a - długość boku', 'square.png', '', '', '#Area #Square'),
(2, 'Area of circle', 'Pole koła', 'https://latex.codecogs.com/gif.latex?\\dpi{120}&space;\\huge&space;A=\\pi&space;r^{2}', 'Math/Geometry/Area', 'r - radius <br/>\r\n&#960; &#8776; 3,14', 'r - promień <br/>\r\n&#960; &#8776; 3,14', 'circle.png', '', '', '#Area #Circle'),
(3, 'Perimeter of square', 'Obwód kwadratu', 'https://latex.codecogs.com/gif.latex?\\dpi{120}&space;\\huge&space;P&space;=&space;4a', 'Math/Geometry/Perimeter', 'a - length of side', 'a - długość boku', 'square.png', '', '', '#Perimeter #Square'),
(4, 'Area of triangle(1)', 'Pole trójkąta(1)', 'https://latex.codecogs.com/gif.latex?\\dpi{120}&space;\\huge&space;A=\\frac{a*h}{2}', 'Math/Geometry/Area', 'a - the length of the base<br/>\r\nh - height', 'a - długość podstawy<br/>\r\nh - wysokość', 'triangle1.png', '', '', '#Area #Triangle'),
(5, 'Area of triangle(2)', 'Pole trójkąta(2)', 'https://latex.codecogs.com/gif.latex?\\dpi{120}&space;\\huge&space;A&space;=&space;\\sqrt{s(s-a)(s-b)(s-c)}', 'Math/Geometry/Area', 's - half of perimeter <br/>\r\na,b,c - length of each sides', 's - połowa obwody <br/>\r\na,b,c - długości poszczególnych boków', 'triangle2.png', 'You can simply count the area of triangle when you know all sides', '', '#Area #Triangle'),
(6, 'Area of triangle(3)', 'Pole trójkąta(3)', 'https://latex.codecogs.com/gif.latex?\\dpi{120}&space;\\huge&space;A&space;=&space;\\frac{ab*sin&space;C}{2}', 'Math/Geometry/Area', 'a and b - lenth of any of two sides <br/>\r\nC - angle between a and b', 'a i b - długość dwóch wybranych boków<br/>\nC - kąt pomiędzy tymi bokami', 'triangle3.png', '', '', '#Area #Triangle'),
(7, 'Area of regular triangle', 'Pole trójkąta równobocznego', 'https://latex.codecogs.com/gif.latex?\\dpi{120}&space;\\huge&space;A&space;=&space;\\frac{a^{2}*\\sqrt{3}}{4}', 'Math/Geometry/Area', 'a - length of one sides', 'a - długość jednego z boków', 'regulartriangle.png', '', '', '#Area #RegularTriangle #Triangle'),
(8, 'Area of isosceles triangle', 'Pole trójkąta równoramiennego', 'https://latex.codecogs.com/gif.latex?\\dpi{120}&space;\\huge&space;A&space;=&space;\\frac{b}{4}\\sqrt{4a^{2}-b^{2}}', 'Math/Geometry/Area', 'a - the length of one of the two equal sides <br/>\r\nb - the length of a different side', 'a - długość jednego z dwóch przystających boków\n< br/>\nb - długość trzeciego boku', 'isoscelestriangle.png', '', '', '#IsoscelesTriangle #Area #Triangle'),
(9, 'Area of rectangle', 'Pole prostokąta', 'https://latex.codecogs.com/gif.latex?\\dpi{120}&space;\\huge&space;A&space;=&space;a*b', 'Math/Geometry/Area', 'a - length of first side<br/>\r\nb - length of second side', 'a - długość pierwszego boku<br/>\nb - długość drugiego boku', 'rectangle.png', '', '', '#Rectangle #Area'),
(10, 'Area of rhombus', 'Pole rombu', 'https://latex.codecogs.com/gif.latex?\\dpi{120}&space;\\huge&space;A&space;=\\frac{&space;p*q}{2}', 'Math/Geometry/Area', 'p and q - length of diagonals', 'p i q - długości przeciwprostokątnych', 'rhombus.png', '', '', '#Diagonals #Area #Rhombus'),
(11, 'Perimeter of circle', 'Obwód koła', 'https://latex.codecogs.com/gif.latex?\\dpi{120}&space;\\huge&space;P&space;=&space;2\\pi&space;r', 'Math/Geometry/Perimeter', 'r - radius <br/>\r\n&#960; &#8776; 3,14', 'r - promień\r\n&#960; &#8776; 3,14', 'circle.png', '', '', '#Circle #Perimeter');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `allformulas`
--
ALTER TABLE `allformulas`
  ADD PRIMARY KEY (`formula_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `allformulas`
--
ALTER TABLE `allformulas`
  MODIFY `formula_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
