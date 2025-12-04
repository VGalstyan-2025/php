<?php
echo "<h1>Տնային աշխատանք</h1>";

echo "<h2>Խնդիր 1: Կլորացում</h2>";
$price = 12.34567;
echo "<h3>Թիվը։ $price</h3>";
echo "<b>Կլորացում մինչև 2 տասնորդական: </b>" . round($price, 2) . "<br>";
echo "<b>Կլորացում դեպի վեր (ceil): </b>" . ceil($price) . "<br>";
echo "<b>Կլորացում դեպի ներքև (floor): </b>" . floor($price) . "<br>";

echo "<h2>Խնդիր 2: Գեներացնում</h2>";
$rand1 = rand(1, 100);
echo "<b>Պատահական թիվ 1-ից 100: </b> $rand1<br>";
$rand2 = rand(0, 100) / 100;
echo "<b>Պատահական տասնորդական թիվ 0-ից 1 </b>: $rand2<br>";
$numbers = [];
for ($i = 0; $i < 5; $i++) {
    $numbers[] = rand(1, 100);
}
echo "<b>Թվերի զանգվածը: </b>";
print_r($numbers);
echo "<br>";
echo "<b>Թվերի զանգվածից մեծագույնը: </b>" . max($numbers) . "<br>";
echo "<b>Թվերի զանգվածից փոքրագույնը: </b>" . min($numbers) . "<br>";

echo "<h2>Խնդիր 3: Թվաբանական գործողություններ</h2>";
$num1 = -15.7;
$num2 = 8.3;
echo "<h3>Տրված են․ $num1 & $num2</h3>";
echo "<b>Բացարձակ արժեք num1: </b>" . abs($num1) . "<br>";
echo "<b>Բացարձակ արժեք num2: </b>" . abs($num2) . "<br>";
echo "<b>num1-ի քառակուսի: </b>" . pow($num1, 2) . "<br>";
echo "<b>num2-ի քառակուսի արմատ: </b>" . sqrt($num2) . "<br>";
echo "<b>num1-ը num2-ի աստիճանով: </b>" . pow($num1, $num2) . "<br>";

echo "<h2>Խնդիր 4: Տողի երկարություն և փոխակերպում</h2>";
$text = "   heLlO wOrLd   ";
echo "<h3>Տրված է։ $text</h3>";
$trimmed = trim($text);
echo "<b>Հեռացնել բացատները սկզբից և վերջից: </b> '$trimmed'<br>";
echo "<b>Փոխարկել մեծատառ: </b>" . strtoupper($trimmed) . "<br>";
echo "<b>Փոխարկել փոքրատառ: </b>" . strtolower($trimmed) . "<br>";
echo "<b>Գտնել տողի երկարությունը: </b>" . strlen($trimmed) . "<br>";
echo "<b>Փոխարկել առաջին տառը մեծատառի: </b>" . ucfirst($trimmed) . "<br>";

echo "<h2>Խնդիր 5: Տողի որոնում և փոխարինում</h2>";
$sentence = "I love JavaScript, JavaScript is great";
echo "<h3>Տրված է։ $sentence</h3>";
$replaced = str_replace("JavaScript", "PHP", $sentence);
echo "<b>Փոխարինել բոլոր JavaScript-ները PHP-ով: </b> $replaced<br>";
echo "<b>Գտիր JavaScript բառի առաջին հանդիպման դիրքը: </b>" . strpos($sentence, "JavaScript") . "<br>";
if (strpos($sentence, "love") !== false) {
    echo "<b>Տողը պարունակում է 'love' </b> <br>";
} else {
    echo "<b>Տողը չի պարունակում 'love'  </b><br>";
}
$count = substr_count($sentence, "JavaScript");
echo "<b>JavaScript բառի հանդիպումների քանակը:  </b> $count<br>";

echo "<h2>Խնդիր 6: Տողի բաժանում և միացում</h2>";
$email = "user@example.com";
echo "<h3>Տրված է email։ $email</h3>";
echo "<b>Բաժանիր email-ը @ նշանով</b>"."<br>";
$parts = explode("@", $email);
$username = $parts[0];
$domain = $parts[1];
echo "<b>Username: </b> $username<br>";
echo "<b>Domain: </b> $domain<br>";
$newString = $username . " at " . $domain;
echo "<b>Ստեղծիր նոր տող միացնելով username-ը և domain-ը at բառով: </b> $newString<br>";
echo "<b>Reverse: </b> " . strrev($email) . "<br>";
echo "<b>Վերջին 4 սիմվոլներ: </b>" . substr($email, -4) . "<br>";

echo "<h2>Խնդիր 7: Տողի մշակում</h2>";
function getInitials($fullname) {
    $parts = explode(" ", trim($fullname));
    $initials = strtoupper($parts[0][0]) . "." . strtoupper($parts[1][0]) . ".";
    return $initials;
}
echo "<b>Վերադարձնում է անվան և ազգանվան առաջին տառերը մեծատառերով (john smith): </b>" . getInitials("john smith");

echo "<h2>Խնդիր 8: Զանգվածի ստեղծում և հասանելիություն</h2>";
$fruits = ["apple", "banana", "orange", "kiwi", "mango"];
echo "<h3>Ստեղծիր զանգված 5 մրգերի անվանումներով</h3>";
echo "<pre>"; 
print_r($fruits);
echo "</pre>";
echo "<b>Տպիր երկրորդ տարրը: </b>" . $fruits[1] . "<br>";
$fruits[] = "grape";
echo "<b>Ավելացրու նոր միրգ վերջում: </b>";
echo implode(", ", $fruits) . "<br>";
array_unshift($fruits, "peach");
echo "<b>Ավելացրու նոր միրգ սկզբում: </b>";
echo implode(", ", $fruits) . "<br>";
array_pop($fruits);
echo "<b>Հեռացրու վերջին տարրը: </b>";
echo implode(", ", $fruits) . "<br>";
echo "<b>Զանգվածի երկարություն: </b>" . count($fruits) . "<br>";

echo "<h2>Խնդիր 9: Ասոցիատիվ զանգվածներ</h2>";
$student = [
    "name" => "Varduhi",
    "age" => 21,
    "grade" => "A"
];
echo "<b>Ստեղծիր ասոցիատիվ զանգված ուսանողի տվյալներով (անուն, տարիք, գնահատական): </b>";
echo implode(", ", $student) . "<br>";
echo "<b>Keys: </b>";
print_r(array_keys($student));
echo "<br> <b>Values: </b>";
print_r(array_values($student));
echo "<br>";
if (array_key_exists("age", $student)) {
    echo "<b>'age' exists in array</b> <br>";
}
echo "<b>Ավելացնել նոր դաշտ city : </b>";
$student["city"] = "Yerevan";
print_r($student);

echo "<h2>Խնդիր 10: Զանգվածի որոնում և ֆիլտրում</h2>";
$numbers = [5, 12, 8, 130, 44, 3];
echo "<b>Տրված է այս զամգվածը․ </b>";
echo implode(", ", $numbers) . "<br>";
echo "<b>Max: </b>" . max($numbers) . "<br>";
echo "<b>Min: </b>" . min($numbers) . "<br>";
echo "<b>Sum: </b>" . array_sum($numbers) . "<br>";
echo "<b>Ֆիլտրել միայն զույգ թվերը: </b>";
$evenNumbers = array_filter($numbers, function($n) {
    return $n % 2 == 0;
});
print_r($evenNumbers);
echo "<b>Ստուգել արդյոք 44-ը զանգվածում կա: </b>";
if (in_array(44, $numbers)) {
    echo "44 is in the array\n";
}

echo "<h2>Խնդիր 11:  Զանգվածի դասավորում և միացում</h2>";
$fruits = ["apple", "banana"];
$veggies = ["carrot", "potato"];
echo "<b>Տրված է այս զամգվածները․ </b> <br>";
echo implode(", ", $fruits) . "<br>";
echo implode(", ", $veggies) . "<br>";
echo "<b>Դասավորել fruits զանգվածը այբբենական կարգով: </b>";
sort($fruits);
print_r($fruits);
echo "<br> <b>Միացնել երկու զանգվածները: </b>";
$all = array_merge($fruits, $veggies);
print_r($all);
echo "<br> <b>Հետ շրջել միացված զանգվածը: </b>";
$reversed = array_reverse($all);
print_r($reversed);
echo "<br> <b>Ստեղծիր string մեկ տողում բոլոր տարրերից, բաժանված ստորակետերով: </b>";
$string = implode(", ", $reversed);
echo $string;

echo "<h2>Խնդիր 12:  Զանգվածների թվագրում (Map)</h2>";
$prices = [100, 200, 150, 300];
echo "<b>Տրված է այս զամգվածը․ </b> ";
echo implode(", ", $prices) . "<br>";
echo "<b>Ավելացրու 20% ԱԱՀ բոլոր գներին: </b>";
$withVAT = array_map(function($price) {
    return $price * 1.2;
}, $prices);
echo implode(", ", $withVAT) . "<br>";
echo "<b>Կիրառիր 10% զեղչ բոլոր գներին: </b>";
$withDiscount = array_map(function($price) {
    return $price * 0.9;
}, $withVAT);
echo implode(", ", $withDiscount) . "<br>";
echo "<b>Ստեղծել նոր զանգված XXX AMD ֆորմատով: </b>";
$formattedPrices = array_map(function($price) {
    return round($price, 2) . " AMD";
}, $withDiscount);
echo implode(", ", $formattedPrices) . "<br>";
echo "<b>Արդյունքը տպել: </b>";
echo "<pre>"; 
print_r($formattedPrices);
echo "</pre>";

echo "<h2>Խնդիր 13: Բազմաչափ զանգվածներ</h2>";
$students = [
    ["name" => "Alice", "grades" => [90, 85, 92]],
    ["name" => "Bob", "grades" => [78, 82, 88]],
    ["name" => "Charlie", "grades" => [95, 90, 93]]
];
echo "<b>Ստեղծիր զանգված 3 ուսանողների տվյալներով:</b><br>";
foreach ($students as $student) {
    echo $student["name"] . " - Grades: " . implode(", ", $student["grades"]) . "<br>";
}
$averages = [];
foreach ($students as $student) {
    $avg = array_sum($student["grades"]) / count($student["grades"]);
    $averages[$student["name"]] = $avg;
}
echo "<b>Հաշվել միջին գնահատականները:</b><br>";
foreach ($averages as $name => $avg) {
    echo "$name: $avg<br>";
}
$topStudent = array_keys($averages, max($averages))[0];
echo "<b>Ամենաբարձր միջին ունեցող ուսանողը:</b> $topStudent<br>";
$names = array_column($students, "name");
echo "<b>Բոլոր ուսանողների անունները:</b> " . implode(", ", $names) . "<br>";

echo "<h2>Խնդիր 14: Զանգվածների համակցում</h2>";
$keys = ["name", "age", "city"];
$values = ["John", 25, "Yerevan"];
echo "<b>Տրված է այս զամգվածները․ </b> <br>";
echo implode(", ", $keys) . "<br>";
echo implode(", ", $values) . "<br>";
$assoc = array_combine($keys, $values);
echo "<b>ԱՀամակցում է դրանք մեկ ասոցիատիվ զանգվածի մեջ:</b>";
print_r($assoc);
echo "<br>";
$assoc["grade"] = "A";
echo "<b>Ավելացրել ենք նոր դաշտ 'grade':</b>";
print_r($assoc);
echo "<br>";
unset($assoc["age"]);
echo "<b>Հեռացրել ենք 'age' դաշտը:</b>";
print_r($assoc);
echo "<br>";
?>
