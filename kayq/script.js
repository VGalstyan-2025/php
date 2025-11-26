function runFunction() {
    const value = document.getElementById("inputValue").value;
    const func = document.getElementById("functionSelect").value;
    let result;

    switch(func) {
        case "round":
            result = roundToTwo(parseFloat(value));
            break;
        case "isNumber":
            result = isNumber(value);
            break;
        case "lengthOfNumber":
            result = numberLength(value);
            break;
        case "integerPart":
            result = integerPart(parseFloat(value));
            break;
        case "toUpper":
            result = toUpperCaseText(value);
            break;
        case "containsWord":
            result = containsWord(value, "hello");
            break;
        case "replaceSpaces":
            result = replaceSpaces(value);
            break;
        case "firstLast3":
            result = firstLastThree(value);
            break;
        case "trimString":
            result = trimString(value);
            break;
        case "stringLength":
            result = stringLength(value);
            break;
        case "addElement":
            result = addElement(value.split(','), prompt("Ավելացրու նոր էլեմենտը:"));
            break;
        case "removeLast":
            result = removeLast(value.split(','));
            break;
        case "findFirstOver10":
            result = findFirstOver10(value.split(',').map(Number));
            break;
        case "filterEven":
            result = filterEven(value.split(',').map(Number));
            break;
        case "multiplyBy2":
            result = multiplyBy2(value.split(',').map(Number));
            break;
        case "sumArray":
            result = sumArray(value.split(',').map(Number));
            break;
        case "includesElement":
            const el = prompt("Որ էլեմենտն ես ուզում ստուգել:");
            result = includesElement(value.split(','), el);
            break;
        case "mergeArrays":
            const arr2 = prompt("Մուտքագրիր երկրորդ զանգվածը (օր.՝ 10,20,30):").split(',');
            result = mergeArrays(value.split(','), arr2);
            break;
            case "sliceArray":
            result = sliceArray(value.split(','));
            break;
        case "sortArray":
            result = sortArray(value.split(',').map(Number));
            break;
        case "objectKeys":
            result = objectKeys(JSON.parse(value));
            break;
        case "objectValues":
            result = objectValues(JSON.parse(value));
            break;
        case "hasKey":
            const key = prompt("Որ բանալին ստուգել?");
            result = hasKey(JSON.parse(value), key);
            break;
        case "mergeObjects":
            const obj2 = JSON.parse(prompt("Մուտքագրիր երկրորդ օբյեկտը (օր.՝ {\"b\":2}):"));
            result = mergeObjects(JSON.parse(value), obj2);
            break;
        case "objectEntries":
            result = objectEntries(JSON.parse(value));
            break;
        default:
            result = "Ընտրիր ֆունկցիա։";
    }

    document.getElementById("result").textContent = "Արդյունք → " + result;
}

    // 1️⃣ 
    function roundToTwo(num) {
        return isNaN(num) ? "Մուտքը թիվ չէ" : num.toFixed(2);
    }

    // 2️⃣ 
    function isNumber(value) {
        return !isNaN(value) && value.trim() !== "" ? "Այո, թիվ է" : "Ոչ, թիվ չէ";
    }

    // 3️⃣ 
    function numberLength(value) {
        return value.toString().length;
    }

    // 4️⃣ 
    function integerPart(num) {
        return isNaN(num) ? "Մուտքը թիվ չէ" : Math.trunc(num);
    }

    // 5️⃣ 
    function toUpperCaseText(str) {
        return str.toUpperCase();
    }

    // 6️⃣ 
    function containsWord(str, word) {
        return str.toLowerCase().includes(word.toLowerCase()) ? "Այո, պարունակում է" : "Չի պարունակում";
    }

    // 7️⃣ 
    function replaceSpaces(str) {
        return str.replaceAll(" ", "_");
    }

    // 8️⃣ 
    function firstLastThree(str) {
        if (str.length < 6) return "Շատ կարճ է։";
        return str.slice(0, 3) + "..." + str.slice(-3);
    }
    // 9️⃣ 
    function trimString(str) {
        return str.trim();
    }

    // 🔟 
    function stringLength(str) {
        return str.length;
    }

    // 1️⃣1️⃣ 
    function addElement(arr, newEl) {
        arr.push(newEl);
        return arr;
    }

    // 1️⃣2️⃣ 
    function removeLast(arr) {
        arr.pop();
        return arr;
    }

    // 1️⃣3️⃣ 
    function findFirstOver10(arr) {
        return arr.findIndex(num => num > 10);
    }

    // 1️⃣4️⃣ 
    function filterEven(arr) {
        return arr.filter(num => num % 2 === 0);
    }

    // 1️⃣5️⃣
    function multiplyBy2(arr) {
        return arr.map(num => num * 2);
    }

    // 1️⃣6️⃣
    function sumArray(arr) {
        return arr.reduce((sum, num) => sum + num, 0);
    }

    // 1️⃣7️⃣
    function includesElement(arr, el) {
        return arr.includes(el) ? "Այո, պարունակում է" : "Չի պարունակում";
    }

    // 1️⃣8️⃣
    function mergeArrays(arr1, arr2) {
        return arr1.concat(arr2);
    }

    // 1️⃣9️⃣
    function sliceArray(arr) {
        return arr.slice(1,4); 
    }

    //2️⃣0
    function sortArray(arr) { 
        return arr.sort((a,b)=>a-b);
    }

    //2️⃣1️⃣
    function objectKeys(obj) { 
        return Object.keys(obj); 
    }

    //2️⃣2️⃣
    function objectValues(obj) { 
        return Object.values(obj); 
    }

    //2️⃣3️⃣
    function hasKey(obj, key) { 
        return obj.hasOwnProperty(key) ? "Այո, կա" : "Ոչ, չկա"; 
    }

    //2️⃣4️⃣
    function mergeObjects(obj1, obj2) { 
        return {...obj1, ...obj2}; 
    }

    //2️⃣5️⃣
    function objectEntries(obj) {
        return Object.entries(obj); 
    }

function changeText(id) {
    id.innerHTML = "22.10.2025!";
}
function addToList(){
    const input = document.getElementById("myInput");
    const text =input.value.trim();

    if(text === "") return;

    const li = document.createElement("li");
    li.textContent = text;

    document.getElementById("myList").appendChild(li);
    input.value="";
}