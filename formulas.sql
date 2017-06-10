-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Wrz 2016, 21:56
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
  `titlePL` text CHARACTER SET utf8 NOT NULL,
  `TeX` text CHARACTER SET utf8 NOT NULL COMMENT 'mathjax',
  `position` text CHARACTER SET utf8 NOT NULL,
  `symbolsEN` text CHARACTER SET utf8 NOT NULL,
  `symbolsPL` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `imageName` text CHARACTER SET utf8 NOT NULL,
  `descriptionEN` text CHARACTER SET utf8 NOT NULL,
  `descriptionPL` text CHARACTER SET utf8 NOT NULL,
  `sequent` int(11) NOT NULL DEFAULT '0',
  `votes` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `allformulas`
--

INSERT INTO `allformulas` (`formula_id`, `titleEN`, `titlePL`, `TeX`, `position`, `symbolsEN`, `symbolsPL`, `imageName`, `descriptionEN`, `descriptionPL`, `sequent`, `votes`) VALUES
(1, 'Area of square', 'Pole kwadratu', 'A=a^{2}', 'Math/Geometry/Area', 'a - length of side', 'a - długość boku', 'square.png', '', '', 10, 14),
(2, 'Area of circle', 'Pole koła', 'A= \\pi r^{2}', 'Math/Geometry/Area', 'r - radius <br/>\r\n&#960; &#8776; 3,14', 'r - promień <br/>\r\n&#960; &#8776; 3,14', 'circle.png', '', '', 30, 10),
(3, 'Perimeter of square', 'Obwód kwadratu', 'P=4a', 'Math/Geometry/Perimeter', 'a - length of side', 'a - długość boku', 'square2.png', '', '', 10, 0),
(4, 'Area of triangle(1)', 'Pole trójkąta(1)', 'A=\\frac{a*h}{2}', 'Math/Geometry/Area', 'a - the length of the base<br/>\r\nh - height', 'a - długość podstawy<br/>\r\nh - wysokość', 'triangle1.png', '', '', 40, 0),
(5, 'Area of triangle(2)', 'Pole trójkąta(2)', 'A=\\sqrt{s(s-a)(s-b)(s-c)}', 'Math/Geometry/Area', 's - half of perimeter <br/>\r\na,b,c - length of each sides', 's - połowa obwody <br/>\r\na,b,c - długości poszczególnych boków', 'triangle2.png', 'You can simply count the area of triangle when you know all sides', '', 50, 0),
(6, 'Area of triangle(3)', 'Pole trójkąta(3)', 'A=\\frac{ab*sinC}{2}', 'Math/Geometry/Area', 'a and b - lenth of any of two sides <br/>\r\nC - angle between a and b', 'a i b - długość dwóch wybranych boków<br/>\nC - kąt pomiędzy tymi bokami', 'triangle3.png', '', '', 60, 0),
(7, 'Area of regular triangle', 'Pole trójkąta równobocznego', 'A=\\frac{a^{2}*\\sqrt{3}}{4}', 'Math/Geometry/Area', 'a - length of one sides', 'a - długość jednego z boków', 'regulartriangle.png', '', '', 70, 1),
(8, 'Area of isosceles triangle', 'Pole trójkąta równoramiennego', 'A=\\frac{b}{4}\\sqrt{4a^{2}-b^{2}}', 'Math/Geometry/Area', 'a - the length of one of the two equal sides <br/>\r\nb - the length of a different side', 'a - długość jednego z dwóch przystających boków\n<br/>\nb - długość trzeciego boku', 'isoscelestriangle.png', '', '', 80, 11),
(9, 'Area of rectangle', 'Pole prostokąta', 'A=a*b', 'Math/Geometry/Area', 'a - length of first side<br/>\r\nb - length of second side', 'a - długość pierwszego boku<br/>\nb - długość drugiego boku', 'rectangle.png', '', '', 20, 1),
(10, 'Area of rhombus', 'Pole rombu', 'A=\\frac{p*q}{2}', 'Math/Geometry/Area', 'p and q - length of diagonals', 'p i q - długości przeciwprostokątnych', 'rhombus.png', '', '', 120, 0),
(11, 'Perimeter of circle', 'Obwód koła', 'P=2 \\pi r', 'Math/Geometry/Perimeter', 'r - radius <br/>\r\n&#960; &#8776; 3,14', 'r - promień\r\n&#960; &#8776; 3,14', 'circle2.png', '', '', 20, 0),
(12, 'Perimeter of rectangle', 'Obwód prostokąta', 'P=2(a&plus;b)', 'Math/Geometry/Perimeter', 'a - length of first side <br/>\r\nb - length of second side ', 'a - długość jednego boku <br />\r\nb - długość drugiego boku', 'rectangle2.png', '', '', 30, 0),
(13, 'Perimetr of equilateral polygon', 'Obwód wielokąta równobocznego', 'P=n*a', 'Math/Geometry/Perimeter', 'n - number of sides <br/>\r\na - length of one side', 'n - ilość ścian <br/>\r\na - długość jednej ściany', 'polygon.png', '', '', 40, 0),
(14, 'Perimeter of regular polygon', 'Obwód wielokąta foremnego', 'P=2nb*sin\\left(\\frac{\\pi}{n}\\right)', 'Math/Geometry/Perimeter', 'n - number of sides <br/>\nb - distance between center of the polygon and one of the vertices of the polygon<br/>\n&#960; &#8776; 3,14', 'n - ilość ścian <br/>\nb - odległość między środkiem wielokąta i jednym z jego wierzchołków<br/>\n&#960; &#8776; 3,14', 'polygon1.png', '', '', 50, 0),
(15, 'Perimeter of polygon(general)', 'Obwód wielokątu (ogólnie)', 'P=\\sum_{i=1}^{n}a_{i}', 'Math/Geometry/Perimeter', 'n - number of sides <br/>\r\na<sub>i</sub> - length od i-th side', 'n - ilość ścian <br/>\r\na<sub>i</sub> - długość i-tej ściany', 'polygon2.png', '', '', 60, 0),
(16, 'Area of ellipse', 'Pole elipsy', 'A= \\pi ab', 'Math/Geometry/Area', 'a - major axis <br/>\nb - minor axis <br/>&#960; &#8776; 3,14', 'a - półoś wielka <br/>\nb - półoś mała <br/>&#960; &#8776; 3,14', 'ellipse.png', '', '', 110, 0),
(17, 'Area of regular hexagon', 'Pole sześciokąta foremnego', 'A=\\frac{3\\sqrt{3}a^{2}}{2}', 'Math/Geometry/Area', 'a - length of one side', 'a - długość jednego boku', 'regularhexagon.png', '', '', 90, 0),
(18, 'Area of regular octagon', 'Pole ośmiokąta foremnego', 'A=2(1&plus;\\sqrt{2})a^{2}', 'Math/Geometry/Area', 'a - length of one side', 'a - długość jednej ściany', 'regularoctagon.png', '', '', 130, 3),
(19, 'Area of regular polygon(1)', 'Pole wielokąta foremnego(1)', 'A=\\frac{na^{2}}{4}*\\cot\\left(\\frac{\\pi}{n}\\right)', 'Math/Geometry/Area', 'a - length of one side <br/>n - number of sides <br/>&#960; &#8776; 3,14', 'a - długość jednego boku <br/>\nn - ilość boków<b/>&#960; &#8776; 3,14', 'regularpolygon1.png', '', '', 140, 0),
(20, 'Area of regular polygon(2)', 'Pole wielokąta foremnego(2)', 'A=\\frac{p^{2}}{4n}*cot\\left(\\frac{\\pi}{n}\\right)', 'Math/Geometry/Area', 'p - perimeter of polygon <br/>\nn - number of sides<br/>&#960; &#8776; 3,14', 'p - obwód wielokąta <br/>\nn - ilość ścian<br/>&#960; &#8776; 3,14', 'regularpolygon1.png', '', '', 150, 0),
(21, 'Area of regular polygon(3)', 'Pole wielokąta foremnego', 'A=\\frac{nR^{2}}{2}*\\sin\\left(\\frac{2 \\pi }{n}\\right)', 'Math/Geometry/Area', 'n - number of sides <br/>\nR - radius of a circumscribed circle <br/>&#960; &#8776; 3,14', 'n - ilość ścian <br/>\nR - długość promienia koła opisanego na tym wielokącie<br/>&#960; &#8776; 3,14', 'regularpolygon2.png', '', '', 160, 0),
(22, 'Area of regular polygon(4)', 'Pole wielokąta foremnego', 'A=nr^{2}*\\tan\\left(\\frac{\\pi}{n}\\right)', 'Math/Geometry/Area', 'n - number of sides <br/>\nr - radius of an inscribed circle<br/>&#960; &#8776; 3,14', 'n - ilość ścian <br/>\nr - długość promienia koła wpisanego w ten wielokąt<br/>&#960; &#8776; 3,14', 'regularpolygon3.png', '', '', 170, 0),
(23, 'Area of cube', 'Pole sześcianu', 'A=6a^{2}', 'Math/Geometry/Area', 'a - length of one edge', 'a - długość jednej krawędzi', 'cube1.png', '', '', 100, 2),
(24, 'Area of circular sector(1)', 'Pole wycinka koła(1)', 'A=\\frac{\\theta *r^{2}}{2}', 'Math/Geometry/Area', '&Theta; - angle [rad] <br/>\r\nr - radius', '&Theta; - kąt [rad] <br/>\r\nr - promień', 'circularSelector1.png', '', '', 131, 4),
(25, 'Area of circular sector(2)', 'Pole wycinka koła(2)', 'A=\\frac{L*r}{2}', 'Math/Geometry/Area', 'r - radius <br/>\r\nL - length of the perimeter', 'r - promień <br/>\r\nL - obwód', 'circularSelector2.png', '', '', 132, 4),
(26, 'Innermost stable circular orbit', 'Orbita marginalnie stabilna', 'R_{ISCO}=\\frac{6GM}{c^{2}}', 'Physics/Astrophysics/BlackHoles', 'G - gravitational constant <span style="float: right; margin-right: 490px; margin-top: -36px">\\[\\approx 6,67*10^{-11}\\frac{m^{3}}{kg*s^{3}} \\]</span> \n<br/>\n<div style = "clear:both"></div>\nM - black hole mass <br/><br/>\nc - velocity of the light <span style="float: right; margin-right: 617px; margin-top: -26px">\\[\\approx 3*10^{8}\\frac{m}{s}\\] </span> \n', 'G - stała grawitacji <span style="float: right; margin-right: 548px; margin-top: -36px">\\[\\approx 6,67*10^{-11}\\frac{m^{3}}{kg*s^{3}} \\]</span> \n<br />\n<div style="clear:both"></div>\nM - masa czarnej dziury <br/><br/>\nc - prędkość  światła<span style="float: right; margin-right: 637px; margin-top: -26px">\\[\\approx 3*10^{8}\\frac{m}{s}\\] </span> \n', 'InnermostStableCircularOrbit.png', 'R<sub>ISCO</sub>&nbsp is a minimal distance from black hole in which matter can stably orbit. If matter is closer to the black hole, it fall on this object instantly.', 'R<sub>ISCO</sub>&nbsp  jest minimalnym dystansem od czarnej dziury na którym materia może ustabilizować swoją orbitę. Jeśli materia znajdzie się bliżej czarnej dziury zacznie na nią błyskawicznie opadać.', 20, 3),
(27, 'Schwarzschild radius', 'Promień Schwarzschilda', '{ R }_{ schw }=\\frac { 2GM }{ { c }^{ 2 } } ', 'Physics/Astrophysics/BlackHoles', 'G - gravitional constant\n<span style="float: right; margin-right: 506px; margin-top: -36px">\\[\\approx 6,67*10^{-11}\\frac{m^{3}}{kg*s^{3}} \\]</span>\n<div style="clear:both"></div>\nM - mass of the object<br/><br/>\nc - velocity of the light\n<span style="float: right; margin-right: 617px; margin-top: -26px">\\[\\approx 3*10^{8}\\frac{m}{s}\\] </span>', 'G - stała grawitacji\n<span style="float: right; margin-right: 548px; margin-top: -36px">\\[\\approx 6,67*10^{-11}\\frac{m^{3}}{kg*s^{3}} \\]</span><br/>\n<div style="clear:both"></div>\nM - masa obiektu<br/><br/>\nc - prędkość światła\n<span style="float: right; margin-right: 637px; margin-top: -26px">\\[\\approx 3*10^{8}\\frac{m}{s}\\] </span>', 'InnermostStableCircularOrbit.png', 'If object with mass M has the Schwarzschild radius, it collapse to black hole. Surface determine by this radius is call event horizon and even light cannot escape from it.', 'Jest to to promień określony dla danej masy M po osiągnięciu którego obiekt zapada się w czarną dziurę. Powierzchnia wyznaczana przez promień Schwarzschilda spełnia rolę horyzontu zdarzeń.', 10, 0),
(28, 'Pogson''s formula', 'Wzór Pogsona', '{ m }_{ 2 }-{ m }_{ 1 }=-2,5\\log _{ 10 }{ \\left( \\frac { { I }_{ 2 } }{ { I }_{ 1 } }  \\right)  } ', 'Physics/Astrophysics/Stars', 'm<sub>1</sub> and m<sub>2</sub> - observe brightness of compared astronomical objects in magnitudo scale [mag] <br/>\nI<sub>1</sub> and I<sub>2</sub> - observe brightness of compared objects in illuminance scale [lx]', 'm<sub>1</sub> i m<sub>2</sub> - jasność obserwowana porównywanych obiektów astronomicznych w skali magnitudo [mag] <br/>\nI<sub>1</sub> i I<sub>2</sub> - jasność obserwowana porównywanych obiektów w skali oświetlenia [lx]', 'pogson.png', 'You can simply change brightness scale from mag to lx and vice versa and compere two luminous <br/> objects, for example stars.', 'Dzięki tej zależności można łatwo zamienić skalę magnitudo na luxy i odwrotnie oraz porównać dwa świecące obiekty, m.in gwiazdy.', 10, 0),
(29, 'Sine', 'Sinus', '\\sin { \\alpha  } = \\frac { a }{ c } ', 'Math/Geometry/TrygFunctions', '&alpha; - value of the angle', '&alpha; - wartość rozwartości kąta', 'trygFunctions.png', '', '', 10, 1),
(30, 'Cosine', 'Cosinus', '\\cos { \\alpha  } = \\frac { b }{ c } ', 'Math/Geometry/trygFunctions', '&alpha; - value of the angle', '&alpha; - wartość rozwartości kąta', 'trygFunctions.png', '', '', 20, 0),
(31, 'Tangent', 'Tangens', '\\tan { \\alpha  } = \\frac { a }{ b } ', 'Math/Geometry/trygFunctions', '&alpha; - value of the angle', '&alpha; - wartość rozwartości kąta', 'trygFunctions.png', '', '', 30, 0),
(32, 'Cotangent', 'Cotangens', '\\cot { \\alpha  } = \\frac { b }{ a } ', 'Math/Geometry/trygFunctions', '&alpha; - value of the angle', '&alpha; - wartość rozwartości kąta', 'trygFunctions.png', '', '', 40, 0),
(33, 'Secans', 'Secans', '\\sec { \\alpha  } = \\frac { c }{ b } ', 'Math/Geometry/trygFunctions', '&alpha; - value of the angle', '&alpha; - wartość rozwartości kąta', 'trygFunctions.png', '', '', 50, 0),
(34, 'Cosecans', 'Cosecans', '\\csc { \\alpha  } = \\frac { c }{ a } ', 'Math/Geometry/trygFunctions', '&alpha; - value of the angle', '&alpha; - wartość rozwartości kąta', 'trygFunctions.png', '', '', 60, 0),
(35, 'Logarithm definition', 'Logarytm definicja', '\\log _{ a }{ b } =c\\Longleftrightarrow { a }^{ c }=b', 'Math/Algebra/Logarithm', 'a &gt; 1 <br/>b &gt; 0 <br/> c &isin; R', 'a &gt; 1 <br/>b &gt; 0 <br/> c &isin; R', 'none', '', '', 10, 1),
(36, 'Adding logarithms', 'Dodawanie logarytmów', '\\log _{ a }{ b } +\\log _{ a }{ c= } \\log _{ a }{ \\left( b*c \\right)  } ', 'Math/Algebra/Logarithm', 'a &gt; 1 <br/>b,c &gt; 0 ', 'a &gt; 1 <br/>b,c &gt; 0 ', 'none', '', '', 20, 0),
(37, 'Subtracting logarithms', 'Odejmowanie logarytmów', '\\log _{ a }{ b } -\\log _{ a }{ c= } \\log _{ a }{ \\left( \\frac { b }{ c }  \\right)  } ', 'Math/Algebra/Logarithm', 'a &gt; 1 <br/>b,c &gt; 0 ', 'a &gt; 1 <br/>b,c &gt; 0 ', 'none', '', '', 30, 0),
(38, 'Change of logarithm base(1)', 'Zmiana podstawy logarytmu(1)', '\\log _{ a }{ b } =\\frac { \\log _{ c }{ b }  }{ \\log _{ c }{ a }  } ', 'Math/Algebra/Logarithm', 'a,c &gt; 1 <br/>b &gt; 0 ', 'a,c &gt; 1 <br/>b &gt; 0 ', 'none', '', '', 70, 0),
(39, 'Multiply logarithms', 'Mnożenie logarytmów', 'n*\\log _{ a }{ b } =\\log _{ a }{ \\left( { b }^{ n } \\right)  } =\\log _{ { a }^{ \\frac { 1 }{ n }  } }{ b } ', 'Math/Algebra/Logarithm', 'a &gt; 1 <br/> b &gt; 0 <br/>n &isin; R', 'a &gt; 1 <br/> b &gt; 0 <br/>n &isin; R', 'none', '', '', 40, 0),
(40, 'Number to the power of logarithm', 'Liczba do potęgi logarytmu', '{ a }^{ \\log _{ a }{ b }  }=b', 'Math/Algebra/Logarithm', 'a &gt; 1 <br/>b &gt; 0 ', 'a &gt; 1 <br/>b &gt; 0 ', 'none', '', '', 110, 0),
(41, 'Natural logarithm', 'Logarytm naturalny', '\\ln { a=\\log _{ e }{ a }  } ', 'Math/Algebra/Logarithm', 'a &gt; 0\n<br/>e &#8776; 2,72\n', 'a &gt; 0\n<br/>e &#8776; 2,72', 'none', '', '', 120, 0),
(42, 'Logarithm of the root', 'Logarytm z pierwiastka', '\\log _{ a }{ \\sqrt [ p ]{ x }  } =\\frac { \\log _{ a }{ x }  }{ p } ', 'Math/Algebra/Logarithm', 'a &gt; 1 <br/> p   &ne; 0 <br/>\nx &ge; 0\n', 'a &gt; 1 <br/> p   &ne; 0 <br/>\nx &ge; 0\n', 'none', '', '', 100, 0),
(43, 'Change of logarithm base(2)', 'Zmiana podstawy logarytmu(2)', '\\log _{ b }{ a } =\\frac { 1 }{ \\log _{ a }{ b }  } ', 'Math/Algebra/Logarithm', 'a,b &gt; 1', 'a,b &gt; 1', 'none', '', '', 80, 0),
(44, 'Change of logarithm base(3)', 'Zmiana podstawy logarytmu(3)', '\\log _{ b }{ a } =\\log _{ c }{ a } *\\log _{ b }{ c } ', 'Math/Algebra/Logarithm', 'b,c &gt; 1 <br/>\r\na &gt; 0', 'b,c &gt; 1 <br/>\r\na &gt; 0', 'none', '', '', 90, 0),
(45, 'Logarithm of 1', 'Logarytm z 1', '\\log _{ a }{ 1 } =0', 'Math/Algebra/Logarithm', 'a &gt; 1', 'a &gt; 1', 'none', '', '', 50, 0),
(46, 'Logarithm of the base', 'Logarytm z podstawy', '\\log _{ a }{ a } =1', 'Math/Algebra/Logarithm', 'a &gt; 1', 'a &gt; 1', 'none', '', '', 60, 0),
(47, 'Logarithm of infinity', 'Logarytm z nieskończoności', '\\lim _{ x\\rightarrow \\infty  }{ \\log _{ a }{ x }  } =\\infty ', 'Math/Algebra/Logarithm', 'a &gt; 1 <br/>\r\nx approach infinity\r\n', 'a &gt; 1 <br/>\r\nx zmierza do nieskończoności', 'none', '', '', 130, 0),
(48, 'Integral of logarithm', 'Całka z logarytmu', '\\int { \\log _{ b }{ (x) }  } dx=x*\\frac { \\log _{ b }{ x } -1 }{ \\ln { b }  } +C', 'Math/Algebra/Logarithm', 'b &gt; 1 <br/>\r\nx &gt; 0 <br/>\r\nC - constant of integration', 'b &gt; 1 <br/>\nx &gt; 0 <br/>\nC - stała całkowania', 'none', '', '', 150, 1),
(49, 'Logarithm derivative', 'Pochodna logarytmu', 'f\\left( x \\right) =\\log _{ a }{ x\\Rightarrow f^{ '' }\\left( x \\right)  } =\\frac { 1 }{ x\\ln { a }  } ', 'Math/Algebra/Logarithm', 'a &gt; 1 <br/>\r\nx &gt; 0', 'a &gt; 1 <br/>\r\nx &gt; 0', 'none', '', '', 140, 0),
(50, 'Absolute value definition', 'Wartość bezwzględna definicja', '\\left| x \\right| =\\begin{cases} x \\\\ -x \\end{cases}', 'Math/Algebra/AbsoluteValue', 'x - real number', 'x - liczba rzeczywista', 'none', 'Absolute value of x is equal x if x is greater or equal 0. <br/>\r\nAbsolute value of x is equal -x if x if lower than 0.', 'Wartość bezwzględna z x jest równa x jeśli x jest większe lub równe 0. <br/>\nWartość bezwzględna z x jest równa -x jeśli x jest mniejsze od 0', 10, 0),
(51, 'Root of square', 'Pierwiastek z kwadratu', '\\sqrt { { a }^{ 2 } }  = \\left| a \\right|', 'Math/Algebra/AbsoluteValue', 'a - real number', 'a - real number', 'none', '', '', 20, 0),
(52, 'Non-negativity', 'Nieujemność', '\\left| a \\right| \\ge 0', 'Math/Algebra/AbsoluteValue', 'a - real number', 'a - liczba rzeczywista', 'none', '', '', 30, 0),
(53, 'Multiplicativeness of absolue values', 'Rozdzielność mnożenia w. bezwzględnych', '\\left| ab \\right| =\\left| a \\right| *\\left| b \\right| ', 'Math/Algebra/AbsoluteValue', 'a,b - real numbers', 'a,b - liczby rzeczywiste', 'none', '', '', 50, 0),
(54, 'Subadditivity of absolute values', 'Rozdzielność dodawania w. bezwzględnych', '\\left| a+b \\right| \\le \\left| a \\right| +\\left| b \\right| ', 'Math/Algebra/AbsoluteValue', 'a,b - real numbers', 'a,b - liczby rzeczywiste', 'none', '', '', 60, 0),
(55, 'Absolute value of absolue value', 'Wartość bezwzględna z wartości bezwzględnej', '\\left| \\left( \\left| a \\right|  \\right)  \\right| =\\left| a \\right| ', 'Math/Algebra/AbsoluteValue', 'a - real number', 'a - liczba rzeczywista', 'none', '', '', 70, 0),
(56, 'Absolute value of fraction', 'Wartość bezwzględna z ułamaka', '\\left| \\frac { a }{ b }  \\right| =\\frac { \\left| a \\right|  }{ \\left| b \\right|  } ', 'Math/Algebra/AbsoluteValue', 'a - real number <br/>\r\nb &ne; 0', 'a - liczba rzeczywista <br/>\r\nb &ne; 0', 'none', '', '', 80, 0),
(57, 'Integral of absolute value', 'Całka z wartości absolutnej', '\\int { \\left| x \\right| dx } =\\frac { x\\left| x \\right|  }{ 2 } +C', 'Math/Algebra/AbsoluteValue', 'x - real number <br/>\r\nC - constant of integration', 'x - liczba rzeczywista <br/>\r\nC - stała całkowania', 'none', '', '', 90, 0),
(58, 'Commutative subtraction in absolue value', 'Przemienność odejmowania w w. bezwzględnej', '\\left| a-b \\right| =\\left| b-a \\right| ', 'Math/Algebra/AbsoluteValue', 'a,b -real numbers', 'a,b - liczby rzeczywiste', 'none', '', '', 40, 0),
(59, 'Negation', 'Negacja', '\\sim  p', 'Math/Logic/TruthValue', 'p - logic sentence', 'p - zdanie logiczne', '.<table class="logicTable">\n<tr><td>p</td><td>~p</td></tr>\n<tr><td>1</td><td>0</td></tr>\n<tr><td>0</td><td>1</td></tr>\n</table>', '', '', 10, 0),
(60, 'Logical disjunction', 'Alternatywa', 'p\\vee q', 'Math/Logic/TruthValue', 'p,q - logic sentences', 'p,q - zdania logiczne', '.<table class="logicTable">\n<tr><td>p</td><td>q</td><td>p &or; q</td></tr>\n<tr><td>1</td><td>1</td><td>1</td></tr>\n<tr><td>1</td><td>0</td><td>1</td></tr>\n<tr><td>0</td><td>1</td><td>1</td></tr>\n<tr><td>0</td><td>0</td><td>0</td></tr>\n</table>', '', '', 20, 0),
(61, 'Exclusive or', 'Alternatywa wykluczająca', 'p\\underline{\\vee}q', 'Math/Logic/TruthValue', 'p,q - logic sentences', 'p,q - zdania logiczne', '.<table class="logicTable">\n<tr><td>p</td><td>q</td><td>p &#8891; q</td></tr>\n<tr><td>1</td><td>1</td><td>0</td></tr>\n<tr><td>1</td><td>0</td><td>1</td></tr>\n<tr><td>0</td><td>1</td><td>1</td></tr>\n<tr><td>0</td><td>0</td><td>0</td></tr>\n</table>', '', '', 30, 0),
(62, 'Conjunction', 'Koniunkcja', 'p\\wedge q', 'Math/Logic/TruthValue', 'p,q - logic sentences', 'p,q - zdania logiczne', '.<table class="logicTable">\n<tr><td>p</td><td>q</td><td>p &and; q</td></tr>\n<tr><td>1</td><td>1</td><td>1</td></tr>\n<tr><td>1</td><td>0</td><td>0</td></tr>\n<tr><td>0</td><td>1</td><td>0</td></tr>\n<tr><td>0</td><td>0</td><td>0</td></tr>\n</table>', '', '', 40, 0),
(63, 'If and only if', 'Równoważność', 'p\\Leftrightarrow q', 'Math/Logic/TruthValue', 'p,q - logic sentences', 'p,q - zdania logiczne', '.<table class="logicTable">\n<tr><td>p</td><td>q</td><td>p ⇔ q</td></tr>\n<tr><td>1</td><td>1</td><td>1</td></tr>\n<tr><td>1</td><td>0</td><td>0</td></tr>\n<tr><td>0</td><td>1</td><td>0</td></tr>\n<tr><td>0</td><td>0</td><td>1</td></tr>\n</table>', '', '', 50, 2),
(64, 'Material conditional', 'Implikacja', 'p\\Rightarrow q', 'Math/Logic/TruthValue', 'p,q - logic sentences', 'p,q - zdania logiczne', '.<table class="logicTable">\r\n<tr><td>p</td><td>q</td><td>p &rArr; q</td></tr>\r\n<tr><td>1</td><td>1</td><td>1</td></tr>\r\n<tr><td>1</td><td>0</td><td>0</td></tr>\r\n<tr><td>0</td><td>1</td><td>1</td></tr>\r\n<tr><td>0</td><td>0</td><td>1</td></tr>\r\n</table>', '', '', 60, 0),
(65, 'Law of excluded middle', 'Prawo wyłączonego środka', 'p \\vee \\sim p', 'Math/Logic/PropositionalCalculus', 'p - logic sentence', 'p - zdanie logiczne', 'none', 'This law says that for every sentence in logical sense, truth is that this sentence is true <br/>or its negation is true.', 'To prawo mówi, że dla dowolnego zdania w sensie logiki prawdziwe jest albo to zdanie albo jego zaprzeczenie.', 10, 0),
(66, 'Law of double negation', 'Prawo podwójnej negacji', '\\sim (\\sim p) \\Leftrightarrow p', 'Math/Logic/PropositionalCalculus', 'p - logic sentence', 'p - zdanie logiczne', 'none', '', '', 20, 0),
(67, 'Commutativity of conjunction', 'Przemienność koniunkcji', 'p \\wedge q \\Leftrightarrow q \\wedge p', 'Math/Logic/PropositionalCalculus', 'p,q - logic senteces', 'p,q - zdania logiczne', 'none', '', '', 30, 0),
(68, 'Connection of conjunction', 'Łączności koniunkcji', '(p \\wedge q) \\wedge r \\Leftrightarrow p \\wedge (q \\wedge r)', 'Math/Logic/PropositionalCalculus', 'p,q,r - logic senteces', 'p,q,r - zdania logiczne', 'none', '', '', 40, 0),
(69, 'Commutativity of disjunction', 'Przemienność alternatywy', 'p \\vee q \\Leftrightarrow q \\vee p', 'Math/Logic/PropositionalCalculus', 'p,q - logic senteces', 'p,q - zdania logiczne', 'none', '', '', 50, 0),
(70, 'Connection of disjunction', 'Łączności alternatywy', '(p \\vee q) \\vee r \\Leftrightarrow p \\vee (q \\vee r)', 'Math/Logic/PropositionalCalculus', 'p,q,r - logic senteces', 'p,q,r - zdania logiczne', 'none', '', '', 60, 0),
(71, 'I de Morgan''s law', 'I prawo de Morgana', '\\sim (p \\wedge q) \\Leftrightarrow \\left[ (\\sim p) \\vee ( \\sim q) \\right]', 'Math/Logic/PropositionalCalculus', 'p,q - logic sentences', 'p,q - zdania logiczne', 'none', '', '', 70, 0),
(72, 'II de Morgan''s law', 'II prawo de Morgana', '\\sim ( p \\vee q) \\Leftrightarrow \\left[ ( \\sim p) \\wedge ( \\sim q)  \\right]', 'Math/Logic/PropositionalCalculus', 'p,q - logic sentences', 'p,q - zdania logiczne', 'none', '', '', 80, 1),
(73, 'Transitive implication', 'Przechodniość implikacji', '\\left[ (p \\Rightarrow q ) \\wedge (q \\Rightarrow r)\\right] \\Leftrightarrow (p \\Rightarrow r)', 'Math/Logic/PropositionalCalculus', 'p,q - logic sentences', 'p,q - zdania logiczne', 'none', '', '', 90, 0),
(74, 'Law of identity', 'Prawo tożsamości', 'p\\Rightarrow p', 'Math/Logic/PropositionalCalculus', 'p - logic sentence', 'p - zdanie logiczne', 'none', '', '', 21, 0),
(75, 'Idempotence of conjunction', 'Idempotentność koniunkcji', 'p\\Leftrightarrow (p\\wedge p)', 'Math/Logic/PropositionalCalculus', 'p - logic sentence', 'p - zdanie logiczne', 'none', '', '', 22, 0),
(76, 'Idempotence of disjunction', 'Idempotentność alternatywy', 'p\\Leftrightarrow (p\\vee p)', 'Math/Logic/PropositionalCalculus', 'p - logic sentence', 'p - zdanie logiczne', 'none', '', '', 23, 0),
(77, 'Distributive conjunction over disjunction', 'Rozdzielności koniunkcji względem alternatywy', '\\left[ p\\wedge \\left( q\\vee r \\right)  \\right] \\Leftrightarrow \\left[ \\left( p\\wedge q \\right) \\vee \\left( p\\wedge r \\right)  \\right] ', 'Math/Logic/PropositionalCalculus', 'p,q,r - logic sentences', 'p,q,r - zdania logiczne', 'none', '', '', 100, 0),
(78, 'Distributive disjunction over conjunction', 'Rozdzielności alternatywy względem koniunkcji', '\\left[ p\\vee \\left( q\\wedge r \\right)  \\right] \\Leftrightarrow \\left[ \\left( p\\vee q \\right) \\wedge \\left( p\\vee r \\right)  \\right] ', 'Math/Logic/PropositionalCalculus', 'p,q,r - logic sentences', 'p,q,r - zdania logiczne', 'none', '', '', 110, 0),
(79, 'Law of noncontradiction', 'Prawo niesprzeczności', '\\sim \\left( p\\wedge \\sim p \\right) ', 'Math/Logic/PropositionalCalculus', 'p - logic sentence', 'p - zdanie logiczne', 'none', 'It states that contradictory statements cannot both be true in the same sense at the same time.', 'Mówi, że zdanie nie może być w tym samym czasie jednocześnie prawdziwe i fałszywe.', 120, 0),
(80, 'Law of absorption', 'Prawo pochłaniania', '\\left[ p\\wedge \\left( p\\vee q \\right)  \\right] \\Leftrightarrow \\left[ p\\vee \\left( p\\wedge q \\right)  \\right] \\Leftrightarrow p', 'Math/Logic/PropositionalCalculus', 'p,q - logic sentences', 'p,q - zdania logiczne', 'none', '', '', 130, 0),
(81, 'Clavius''s law', 'Prawo Claviusa', '\\left( \\sim p\\Rightarrow p \\right) \\Rightarrow p', 'Math/Logic/PropositionalCalculus', 'p - logic sentence', 'p - zdanie logiczne', 'none', 'If sentence arise from its negation it is truth sentence.', 'Jeśli zdanie wynika ze swojego zaprzeczenia to jest prawdziwe.', 140, 0),
(82, 'Duns Scotus''s law', 'Prawo Dunsa Szkota', '\\sim p\\Rightarrow \\left( p\\Rightarrow q \\right) ', 'Math/Logic/PropositionalCalculus', 'p,q - logic sentences', 'p,q - zdania logiczne', 'none', 'If logic sentence isn''t true, then from this sentence arise every other sentence.', 'Gdy zdanie jest fałszywe to wynika z niego każde inne zdanie.', 150, 0),
(83, 'Law of simplification', 'Prawo symplifikacji', 'p\\Rightarrow \\left( q\\Rightarrow p \\right) ', 'Math/Logic/PropositionalCalculus', 'p,q - logic sentences', 'p,q - zdania logiczne', 'none', 'If logic sentence is true, then this sentence arise from any other sentence.\r\n', 'Gdy zdanie logiczne jest prawdziwe wynika z każdego innego.', 160, 0),
(84, 'Law of transitive implication', 'Prawo przechodności implikacji', '\\left[ \\left( p\\Rightarrow q \\right) \\wedge \\left( q\\Rightarrow r \\right)  \\right] \\Rightarrow \\left( p\\Rightarrow r \\right) ', 'Math/Logic/PropositionalCalculus', 'p,q,r - logic sentences', 'p,q,r - zdania logiczne', 'none', '\r\n', '', 170, 0),
(85, 'Law of transposition(1)', 'Prawo transpozycji(1)', '\\left( p\\Rightarrow q \\right) \\Rightarrow \\left( \\sim q\\Rightarrow \\sim p \\right) ', 'Math/Logic/PropositionalCalculus', 'p,q - logic sentences', 'p,q - zdania logiczne', 'none', '', '', 180, 0),
(86, 'Law of transposition(2)', 'Prawo transpozycji(2)', '\\left( \\sim p\\Rightarrow q \\right) \\Rightarrow \\left( \\sim q\\Rightarrow p \\right) ', 'Math/Logic/PropositionalCalculus', 'p,q - logic sentences', 'p,q - zdania logiczne', 'none', '', '', 190, 0),
(87, 'Law of transposition(3)', 'Prawo transpozycji(3)', '\\left( p\\Rightarrow \\sim q \\right) \\Rightarrow \\left( q\\Rightarrow \\sim p \\right) ', 'Math/Logic/PropositionalCalculus', 'p,q - logic sentences', 'p,q - zdania logiczne', 'none', '', '', 200, 0),
(88, 'Implication elimination', 'Eliminacja implikacji', '\\left( p\\Rightarrow q \\right) \\Leftrightarrow \\left( \\sim p\\vee q \\right) ', 'Math/Logic/PropositionalCalculus', 'p,q - logic sentences', 'p,q - zdania logiczne', 'none', '', '', 210, 0),
(89, 'The negation of an implication', 'Zaprzeczenie implikacji', '\\sim \\left( p\\Rightarrow q \\right) \\Leftrightarrow \\left( p\\wedge \\sim q \\right)  ', 'Math/Logic/PropositionalCalculus', 'p,q - logic sentences', 'p,q - zdania logiczne', 'none', '', '', 220, 0),
(90, 'Reductio ad Absurdum', 'Prawo redukcji do absurdu', '\\left[ \\left( p\\Rightarrow q \\right) \\wedge \\left( p\\Rightarrow \\sim q \\right)  \\right] \\Rightarrow \\sim p', 'Math/Logic/PropositionalCalculus', 'p,q - logic sentences', 'p,q - zdania logiczne', 'none', '', '', 230, 0),
(91, 'Frege''s law', 'Prawo Fregego', '\\left[ p\\Rightarrow \\left( q\\Rightarrow r \\right)  \\right] \\Rightarrow \\left[ \\left( p\\Rightarrow q \\right) \\Rightarrow \\left( p\\Rightarrow r \\right)  \\right] ', 'Math/Logic/PropositionalCalculus', 'p,q,r - logic sentences', 'p,q,r - zdania logiczne', 'none', '', '', 240, 0),
(92, 'Universal quantification', 'Kwalifikator ogólny', '\\bigwedge _{ x }^{  }{ \\longleftrightarrow  } \\forall ', 'Math/Logic/Quantifiers', 'x - for every sentece like x', 'x - dla każdego zdania takiego jak x', 'none', '', '', 10, 0),
(93, 'Existential quantification', 'Kwalifikator egzystencjalny', '\\bigvee _{ x }^{  }{ \\longleftrightarrow \\exists  } ', 'Math/Logic/Quantifiers', 'x - exists sentence x such that ...', 'x - istnieje takie zdanie x, że ...', 'none', '', '', 20, 1),
(94, 'Identity', 'Identyczność', 'A=B', 'Math/Logic/Signs', 'A,B - sets, numbers etc. ', 'A,B - zbiory, liczby itp.', 'none', '', '', 10, 0),
(95, 'Membership', 'Przynależność', 'a\\in A', 'Math/Logic/Signs', 'a - element of A set', 'a - element zbioru A', 'none', '', '', 20, 0),
(96, 'Equivalence quantification', 'Kwalifikator jednoznaczności', '\\bigvee _{ x }^{  }{ !\\longleftrightarrow \\exists  } !', 'Math/Logic/Quantifiers', 'x - exists ONLY ONE sentence x such that ...', 'x - istnieje TYLKO JEDNO takie zdanie x, że ...', 'none', '', '', 30, 1),
(97, 'Natural numbers', 'Liczby naturalne', 'N=\\left\\{ 0,1,2,... \\right\\} ', 'Math/Logic/SetsOfNumbers', 'N - set of natural numbers', 'N - zbiór liczb naturalnych', 'none', '', '', 10, 0),
(98, 'Integers', 'Liczby całkowite', 'Z=\\left\\{ 0,1,-1,2,-2,... \\right\\} ', 'Math/Logic/SetsOfNumbers', 'Z - set of integers', 'Z - zbiór liczb całkowitych', 'none', '', '', 20, 0),
(99, 'Rational numbers', 'Liczby wymierne', 'Q=\\left\\{ \\frac { p }{ q } :p,q\\in Z\\wedge q\\neq 0 \\right\\} ', 'Math/Logic/SetsOfNumbers', 'Q - set of rational numbers', 'Q - zbiór liczb wymiernych', 'none', '', '', 30, 0),
(100, 'Real numbers', 'Liczby rzeczywiste', 'R', 'Math/Logic/SetsOfNumbers', 'R - set of real numbers', 'R - zbiór liczb rzeczywistych', 'none', '', '', 40, 0),
(101, 'Complex numbers', 'Liczby zespolone', 'C', 'Math/Logic/SetsOfNumbers', 'C - set of complex numbers', 'C - zbiór liczb zespolonych', 'none', '', '', 50, 0),
(102, 'Rule of distribution', 'Zasada dystrybutywności', '\\left\\{ a \\right\\} \\neq a', 'Math/Logic/Signs', 'a - element of the set', 'a - element zbioru', 'none', 'There isn''t exist set which is equal to the element of this set.', 'Żaden zbiór nie jest identyczny z żadnym ze swych elementów.', 30, 0),
(103, 'Inclusion(subset)', 'Inkluzja(podzbiór)', 'A\\subset B\\Leftrightarrow \\forall x\\left( x\\in A\\Rightarrow x\\in B \\right) ', 'Math/Logic/Signs', 'A - set <br/>\r\nB - subset', 'A - zbiór <br/>\r\nB - podzbiór', 'none', 'We say that set A contains B set.', 'Mówimy, że zbiór B zawiera się w zbiorze A.', 40, 0),
(104, 'Power set', 'Zbiór potęgowy', 'P\\left( A \\right) ={ 2 }^{ n }', 'Math/Logic/UniqueSets', 'P(A) - power set of A set <br/>\r\nn - number of elements in A set', 'P(A) - zbiór potęgowy zbioru A <br/>\r\nn - ilość elementów w zbiorze A', 'none', '', '', 50, 0),
(105, 'Complement', 'Dopełnienie zbioru', 'A''=U\\setminus A=\\left\\{ x:x\\in U\\wedge x\\notin A \\right\\} ', 'Math/Logic/UniqueSets', 'A'' - complement of A set<br/>U - universe<br/>x - element of set \n', 'A'' - dopełnienie zbioru A<br/>U - uniwersum<br/> x - element zbioru \n', 'none', '', '', 60, 0),
(106, 'Sets union', 'Suma zbiorów', 'A\\cup B=\\left\\{ x:x\\in A\\vee x\\in B \\right\\} ', 'Math/Logic/SetsOperations', 'A,B - sets', 'A,B - zbiory', 'none', '', '', 10, 0),
(107, 'Sets intersection', 'Iloczyn zbiorów', 'A\\cap B=\\left\\{ x:x\\in A\\wedge x\\in B \\right\\} ', 'Math/Logic/SetsOperations', 'A,B - sets', 'A,B - zbiory', 'none', '', '', 20, 0),
(108, 'Sets difference', 'Różnica zbiorów', 'A\\setminus B=\\left\\{ x:x\\in A\\wedge x\\notin B \\right\\} ', 'Math/Logic/SetsOperations', 'A,B - sets', 'A,B - zbiory', 'none', '', '', 30, 0),
(109, 'Sets symmetric difference', 'Symetryczna różnica zbiorów', 'A\\Delta B=\\left\\{ x:\\left( x\\in A\\wedge x\\notin B \\right) \\vee \\left( x\\in B\\wedge x\\notin A \\right)  \\right\\} ', 'Math/Logic/SetsOperations', 'A,B - sets', 'A,B - zbiory', 'none', '', '', 40, 0),
(110, 'Connection of union', 'Łączność sumy', '\\left( A\\cup B \\right) \\cup C=A\\cup \\left( B\\cup C \\right) ', 'Math/Logic/LawsOfSetsAlgebra', 'A,B,C - sets', 'A,B,C - zbiory', 'none', '', '', 10, 0),
(111, 'Connection of intersection', 'Łączność iloczynu', '\\left( A\\cap B \\right) \\cap C=A\\cap \\left( B\\cap C \\right) ', 'Math/Logic/LawsOfSetsAlgebra', 'A,B,C - sets', 'A,B,C - zbiory', 'none', '', '', 20, 0),
(112, 'Commutativity of union', 'Przemienność sumy', 'A\\cup B=B\\cup A', 'Math/Logic/LawsOfSetsAlgebra', 'A,B - sets', 'A,B - zbiory', 'none', '', '', 30, 0),
(113, 'Commutativity of intersection', 'Przemienność iloczynu', 'A\\cap B=B\\cap A', 'Math/Logic/LawsOfSetsAlgebra', 'A,B - sets', 'A,B - zbiory', 'none', '', '', 40, 0),
(114, 'Infinitary union', 'Suma rodziny zbiorów', '\\bigcup { D=\\left\\{ x:\\left( \\exists A\\in D \\right) \\left( x\\in A \\right)  \\right\\}  } ', 'Math/Logic/SetsOperations', 'D - family of sets <br/>\nA - set<br/>\nx - element of set', 'D - rodzina zbiorów <br/>\nA - zbiór <br/>x - element zbioru', 'none', '', '', 11, 0),
(115, 'Infinitary intersection', 'Iloczyn rodziny zbiorów', '\\bigcap { { D=\\left\\{ x:\\left( \\forall A\\in D \\right) \\left( x\\in A \\right)  \\right\\}  } } ', 'Math/Logic/SetsOperations', 'D - family of sets <br/>\nA - set<br/>\nx - element of set', 'D - rodzina zbiorów <br/>\nA - zbiór<br/>\n', 'none', '', '', 21, 0),
(116, 'Empty set', 'Zbiór pusty', '\\emptyset =\\left\\{ \\exists A\\quad \\forall x\\left( x\\notin A \\right)  \\right\\} ', 'Math/Logic/UniqueSets', 'A - set <br/>\nx - element of set ', 'A - zbiór <br/>\nx - element zbioru', 'none', '', '', 20, 0),
(117, 'Intersection distributes over union', 'Rozdzielność iloczynu względem sumy', '\\left( A\\cup B \\right) \\cap C=\\left( A\\cap C \\right) \\cup \\left( B\\cap C \\right) ', 'Math/Logic/LawsOfSetsAlgebra', 'A,B,C - sets', 'A,B,C - zbiory', 'none', '', '', 50, 0),
(118, 'Union distributes over intersection', 'Rozdzielność sumy względem iloczynu', '\\left( A\\cap B \\right) \\cup C=\\left( A\\cup C \\right) \\cap \\left( B\\cup C \\right) ', 'Math/Logic/LawsOfSetsAlgebra', 'A,B,C - sets', 'A,B,C - zbiory', 'none', '', '', 60, 0),
(119, 'De Morgan law(1)', 'Prawo de Morgana(1)', '\\left( A\\cup B \\right) ''=A''\\cap B''', 'Math/Logic/LawsOfSetsAlgebra', 'A,B - sets', 'A,B - zbiory', 'none', 'Complement of sets union is equal to selection of their complement.', 'Dopełnienie sumy zbiorów jest równe części wspólnej ich dopełnień.', 70, 0),
(120, 'De Morgan law(2)', 'Prawo de Morgana(2)', '\\left( A\\cap B \\right) ''=A''\\cup B''', 'Math/Logic/LawsOfSetsAlgebra', 'A,B - sets', 'A,B - zbiory', 'none', 'Intersection of sets union is equal to union of their complement', 'Dopełnienie części wspólnej zbiorów jest równe sumie ich dopełnień.', 80, 0),
(121, 'Law of union absorption', 'Prawo absorpcji sumy', 'A\\cup \\left( A\\cap B \\right) =A', 'Math/Logic/LawsOfSetsAlgebra', 'A,B - sets', 'A,B - zbiory', 'none', '', '', 90, 0),
(122, 'Law of intesection absorption', 'Prawo absorpcji iloczynu', 'A\\cap \\left( A\\cup B \\right) =A', 'Math/Logic/LawsOfSetsAlgebra', 'A,B - sets', 'A,B - zbiory', 'none', '', '', 100, 0),
(123, 'Idempotence of union', 'Idempotentność sumy', 'A\\cup A=A', 'Math/Logic/LawsOfSetsAlgebra', 'A - set', 'A - zbiór', 'none', '', '', 110, 0),
(124, 'Idempotence of intersection', 'Idempotentność iloczynu', 'A\\cap A=A', 'Math/Logic/LawsOfSetsAlgebra', 'A - set', 'A - zbiór', 'none', '', '', 120, 0),
(125, 'Union of set and its complement', 'Suma zbioru i jego dopełniena', 'A\\cup A''=U', 'Math/Logic/LawsOfSetsAlgebra', 'A - set <br/>\r\nU - universe', 'A - zbiór<br/>\r\nU - uniwersum', 'none', '', '', 130, 0),
(126, 'Intersection of set and its complement', 'Iloczyn zbioru i jego dopełniena', 'A\\cap A''=\\emptyset ', 'Math/Logic/LawsOfSetsAlgebra', 'A - set', 'A - zbiór', 'none', '', '', 140, 0),
(127, 'Union of set and universe', 'Suma zbioru i uniwersum', 'A\\cup U=U', 'Math/Logic/LawsOfSetsAlgebra', 'A - set <br/>\r\nU - universe', 'A - zbiór<br/>\r\nU - uniwersum', 'none', '', '', 150, 0),
(128, 'Intersection of set and universe', 'Iloczyn zbioru i uniwersum', 'A\\cap U=A', 'Math/Logic/LawsOfSetsAlgebra', 'A - set <br/>\r\nU - universe', 'A - zbiór<br/>\r\nU - uniwersum', 'none', '', '', 160, 0),
(129, 'Sum of set and empty set', 'Suma zbioru i zbioru pustego', 'A\\cup \\emptyset =A', 'Math/Logic/LawsOfSetsAlgebra', 'A - set', 'A - zbiór', 'none', '', '', 170, 0),
(130, 'Intersection of set and empty set', 'Iloczyn zbioru i zbioru pustego', 'A\\cap \\emptyset =\\emptyset', 'Math/Logic/LawsOfSetsAlgebra', 'A - set', 'A - zbiór', 'none', '', '', 180, 0),
(131, 'Complement of universe', 'Dopełnienie uniwersum', 'U''=\\emptyset ', 'Math/Logic/LawsOfSetsAlgebra', 'U - universe', 'U - universum', 'none', '', '', 190, 0),
(132, 'Complement of empty set', 'Dopełnienie zbioru pustego', '\\emptyset ''=U', 'Math/Logic/LawsOfSetsAlgebra', 'U - universe', 'U - universum', 'none', '', '', 200, 0),
(133, 'Distributive of sets intersection', 'Rozłożenie iloczynu zbiorów', 'A\\cap B=\\left( A\\cup B \\right) \\setminus \\left( A\\Delta B \\right) ', 'Math/Logic/LawsOfSetsAlgebra', 'A,B - sets', 'A,B - zbiory', 'none', '', '', 210, 0),
(134, 'Distributive of sets difference', 'Rozłożenie różnicy zbiorów', 'A\\setminus B=A\\setminus \\left( A\\cap B \\right) ', 'Math/Logic/LawsOfSetsAlgebra', 'A,B - sets', 'A,B - zbiory', 'none', '', '', 220, 0),
(135, 'Intersection of set and sets difference', 'Iloczyn zbioru i różnicy zbiorów', 'A\\cap \\left( B\\setminus C \\right) =\\left( A\\cap B \\right) \\setminus C', 'Math/Logic/LawsOfSetsAlgebra', 'A,B,C - sets', 'A,B,C - zbiory', 'none', '', '', 230, 0),
(136, 'Difference of sets intersection and set&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'Różnica iloczynu zbiorów i zbioru &nbsp;', '\\left( A\\cap B \\right) \\setminus C=B\\cap \\left( A\\setminus C \\right) ', 'Math/Logic/LawsOfSetsAlgebra', 'A,B,C - sets', 'A,B,C - zbiory', 'none', '', '', 240, 0),
(137, 'Infinitary union of A sets', 'Suma rodziny zbiorów A', '\\bigcup { \\left\\{ A \\right\\}  } =A', 'Math/Logic/LawsOfSetsAlgebra', 'A - set', 'A - zbiór', 'none', '', '', 250, 0),
(138, 'Infinitary intersection of A sets', 'Iloczyn rodziny zbiorów A', '\\bigcap { \\left\\{ A \\right\\}  } =A', 'Math/Logic/LawsOfSetsAlgebra', 'A - set', 'A - zbiór', 'none', '', '', 260, 0),
(139, 'Infinitary union of power set', 'Suma rodziny zbiorów potęgowych', '\\bigcup { P\\left( A \\right)  } =A', 'Math/Logic/LawsOfSetsAlgebra', 'P(A) - power set<br/>\r\nA - set', 'P(A) - zbiór potęgowy<br/>\r\nA - zbiór', 'none', '', '', 270, 0),
(140, 'Infinitary intersection of power set', 'Iloczyn rodziny zbiorów potęgowych', '\\bigcap { P\\left( A \\right)  } =\\emptyset ', 'Math/Logic/LawsOfSetsAlgebra', 'P(A) - power set<br/>\r\nA - set', 'P(A) - zbiór potęgowy<br/>\r\nA - zbiór', 'none', '', '', 280, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comm_id` int(11) NOT NULL,
  `who` text NOT NULL,
  `content` text NOT NULL,
  `whereFormId` int(11) NOT NULL COMMENT 'formula id',
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`comm_id`, `who`, `content`, `whereFormId`, `date`) VALUES
(1, 'Admin', 'before 301 !', 14, '2016-08-23 19:45:39'),
(2, 'Admin', 'Yea', 25, '2016-08-23 20:05:09'),
(3, '1234567890', 'oo', 25, '2016-08-24 12:12:25'),
(5, 'Admin', 'a', 25, '2016-08-24 12:25:08'),
(6, 'Admin', 's', 25, '2016-08-24 12:28:02'),
(8, 'Admin', 'www', 25, '2016-08-24 12:30:24'),
(9, 'Admin', 'aaa', 25, '2016-08-24 12:31:25'),
(10, 'Admin', 'w', 25, '2016-08-24 12:31:45'),
(11, 'Admin', 'ojojoj', 25, '2016-08-24 12:32:06'),
(12, 'Admin', 'tatata', 25, '2016-08-24 12:34:35'),
(13, 'Admin', 'toooo', 25, '2016-08-24 12:35:05'),
(14, 'Admin', 'noooooo', 25, '2016-08-24 12:35:40'),
(15, 'Admin', 'teraz sie udalo !', 25, '2016-08-24 12:36:36'),
(16, 'Admin', 'f', 25, '2016-08-24 12:37:18'),
(17, 'Admin', 'p', 25, '2016-08-24 12:40:18'),
(18, 'Admin', 'b', 25, '2016-08-24 12:40:52'),
(19, 'Admin', 'd', 25, '2016-08-24 12:41:31'),
(20, 'Admin', 'e', 25, '2016-08-24 12:41:40'),
(21, 'Admin', 'r', 25, '2016-08-24 12:42:50'),
(22, 'Admin', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 25, '2016-08-24 12:43:39'),
(23, 'Admin', 'E', 25, '2016-08-24 13:03:07'),
(24, 'Admin', 't', 25, '2016-08-24 13:03:38'),
(25, 'Admin', 't', 25, '2016-08-24 13:03:41'),
(26, 'Admin', 'fff', 25, '2016-08-24 13:04:18'),
(27, 'Admin', 'gg', 25, '2016-08-24 13:04:31'),
(28, 'Ala15', 'soo', 25, '2016-08-24 13:05:02'),
(29, 'Admin', 'd\nd', 25, '2016-08-24 13:23:26'),
(30, 'Admin', 'dw\ndwed\nwdwed\nwedwe\ndwed', 25, '2016-08-24 13:23:32'),
(32, 'Admin', 'dfdfv&lt;/br&gt;dsc', 25, '2016-08-24 13:23:53'),
(33, 'Admin', 'dscd\n\ndsdc\n', 25, '2016-08-24 13:24:37'),
(34, 'Admin', 'ok', 25, '2016-08-24 14:06:36'),
(35, 'Admin', 'f', 25, '2016-08-24 16:23:27'),
(36, 'Admin', 'f', 25, '2016-08-24 16:23:50'),
(38, 'Admin', 'https://www.youtube.com/watch?v=QaOkTnPQGSM', 28, '2016-08-24 18:17:05'),
(39, 'Admin', 'D', 22, '2016-09-02 14:36:07'),
(40, 'Admin', 'f', 25, '2016-09-03 18:15:48'),
(41, 'Admin', 'd', 25, '2016-09-03 18:16:24'),
(42, 'Admin', 'f', 25, '2016-09-03 18:17:16'),
(43, 'Admin', 'd', 25, '2016-09-03 18:19:45'),
(44, 'Admin', 'f', 2, '2016-09-03 18:26:06'),
(45, 'qwewqe', 'Ale fajna strona polecam !', 1, '2016-09-04 16:06:18'),
(46, 'Admin', 'NEW COMMENT', 25, '2016-09-10 09:37:24'),
(47, 'Admin', 'aaaa &lt;br/&gt;\nassd', 25, '2016-09-10 09:37:48'),
(48, 'Admin', 'dcsd\ndscdsc', 25, '2016-09-10 09:38:52'),
(49, 'Admin', 'a <br/>\nb', 25, '2016-09-10 09:47:27'),
(50, 'Admin', 'a\nb', 25, '2016-09-10 09:47:33'),
(51, 'Admin', 'f\nf\nf', 25, '2016-09-10 09:53:13'),
(52, 'Admin', 'a <br/> d', 25, '2016-09-10 09:53:19'),
(53, 'Admin', 'a /n\nd', 25, '2016-09-10 09:53:28'),
(54, 'Admin', 'A<br/>A', 25, '2016-09-10 09:59:34'),
(57, 'Admin', '', 25, '2016-09-10 10:00:26'),
(58, 'Admin', 'A<br/>A<br/>A<br/>A<br/>A<br/>A<br/>', 25, '2016-09-10 10:00:49'),
(59, 'Admin', 'ASDA &frac14;BR&iquest;&frac34;<br/>D', 25, '2016-09-10 10:01:03'),
(60, 'Admin', 'S<br/>S', 25, '2016-09-10 10:01:15'),
(61, 'Admin', '&frac14;SPAN&frac34;&frac14;&iquest;SPAN&frac34;', 25, '2016-09-10 10:01:35'),
(62, 'Admin', 'FFF', 25, '2016-09-10 10:07:14'),
(63, 'Admin', 'a\n\ns\n\ns', 25, '2016-09-10 10:10:54'),
(111, 'asiaaa', 'dcsdc', 63, '2016-09-10 15:44:29'),
(183, 'Admin', 'sddc', 25, '2016-09-17 10:43:40'),
(184, 'Admin', 'sad', 25, '2016-09-17 10:43:41'),
(190, 'Admin', 'dsf', 0, '2016-09-17 10:50:49'),
(199, 'Admin', 'thgr', 25, '2016-09-17 10:54:51'),
(200, 'Admin', 'ef', 25, '2016-09-17 10:56:18'),
(201, 'Admin', '<br/><br/><br/>', 25, '2016-09-17 10:56:19'),
(205, 'Admin', 'a', 25, '2016-09-17 10:57:09'),
(206, 'Admin', 'b', 25, '2016-09-17 10:57:11'),
(207, 'Admin', 'c', 25, '2016-09-17 10:57:13'),
(208, 'Admin', 'a', 25, '2016-09-17 10:58:01'),
(209, 'Admin', 'b', 25, '2016-09-17 10:58:02'),
(210, 'Admin', 'c', 25, '2016-09-17 10:58:04'),
(211, 'Admin', 'd', 25, '2016-09-17 10:58:05'),
(212, 'Admin', 'e', 25, '2016-09-17 10:58:06'),
(214, 'Admin', '<br/>fwver', 25, '2016-09-17 10:58:09'),
(259, 'Admin', 'sdfsdfdsf', 25, '2016-09-18 09:48:51'),
(262, 'Admin', 'Niezłe', 27, '2016-09-18 09:53:14'),
(263, 'Admin', 'wqr', 17, '2016-09-18 10:00:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `votedFor` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `votedFor`) VALUES
(1, 'Admin', '$2y$10$yP9RXYgF5OQxDqFJLZ43ZOAJZqBRVcAjqm/hINHR73Gf7914OmDiy', 'barti775@interia.pl', '!25?U!2?U!8?U!24?U!23?U!1?U!26?U!18?U!29?U!10?U!48?U!72?U!63?U!93?U!27?U'),
(7, 'Ala15', '$2y$10$hXgKfyR/pK2sAq8o0RMBO.lUZBW8ZbyfjpYqzVpY06r/wt8bf/lAK', 'ala@wp.pl', '!7?U'),
(8, 'arekmalek', '$2y$10$kyWUr.6axBoM9dgqdC69SeyH77iF4pLuguhp.x15aCZyRdQ/S/pAK', 'arek@jp.pl', '!26?U'),
(9, '1234567890', '$2y$10$RwCeFJPXMSZZcrXwOK4dTek7AkRa9x6kmqtvBLZ2PZ.G378PQdGc6', 'num@qp.pl', '!8?U'),
(10, 'qwerty', '$2y$10$JlpE0WbyFzO2hVWAR0Mwluv6uwAV7K0vfANpSieZa5VquANmXf71q', 'qw@qw.pl', ''),
(11, 'burak', '$2y$10$6rY4embXUMLEQ.sl.nRKke2qW.CqUYlYUEu5asfzzx8.U2XopPbRq', 'burak@b.pl', '!26?U'),
(12, 'muszelka', '$2y$10$Ul1vbZOt/BvT/nowfBCzvuKutSLiZ4HXCmwRuVMhjgJNt5F.fs/JC', 'm@w.wp', ''),
(13, 'wale', '$2y$10$ARE3hD3lSdmvCn..5WIF4eMvPc.8nV0m099gVgzBHEfdLcoYRqKh2', 'w@w.pl', '!8?D!9?U!2?U!25?U!23?U'),
(14, 'newc', '$2y$10$lA9z/NjynBlTSRy0cv/y4Oqv04hovwRL.GG5LZobPCGxUQNktAtYq', 'newc@w.pl', ''),
(15, 'dddd', '$2y$10$LVWuJaaCQoqoZnylkov7XOyCZ5MPtqw6uAAhwfIAcioeWxbuh5flS', 'dd@w.pl', ''),
(16, 'qweqwe', '$2y$10$3oodCriy9o.2cPCKwUdcuex4knbhIFHJjoTkm59YHtQDS1lo8HlGe', 'asd@qw.pl', ''),
(17, 'qwdqwd', '$2y$10$8U1wjslYdTRg/uEAfJ97j.jlg5oF.FqYnFt8tTkghQM3g2rhpNuTS', 'qwd@qw.pl', ''),
(18, 'qwewqe', '$2y$10$NlRqOS/pf/1WaWhu7ty72uwgDFyptV4JiabWHQu.H1IlkJ5WcBdeu', 'qwe@qwe.sf', '!1?U!35?U'),
(19, 'asiaaa', '$2y$10$2bqynFycri1KH0X/LLplIejWc17h7yFBH744Nf6weJLeeFV1Cbuh.', 'bjds@xscs.pl', '!63?U!27?D');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `allformulas`
--
ALTER TABLE `allformulas`
  ADD PRIMARY KEY (`formula_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comm_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `allformulas`
--
ALTER TABLE `allformulas`
  MODIFY `formula_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=264;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
