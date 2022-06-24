<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="background">
    <?php
        $txt_file = fopen('/home3/jaidenmt/public_html/77777Exam2/words.txt','r');
        while($line = fgets($txt_file)) {
            $wordArray = str_split($line);

            $vowelsInWord = 0;

            foreach($wordArray as $char){
                if($char == 'a' or $char == 'e' or $char == 'i' or $char == 'o' or $char == 'u' ){
                    $vowelsInWord = $vowelsInWord + 1;
                }
            }

            $vowelArray[$line] = $vowelsInWord;
        }

        $zeroVowels = array();
        $oneVowels = array();
        $twoVowels = array();
        $threeVowels = array();
        $fourVowels = array();
        $fiveVowels = array();
        $sixVowels = array();
        $sixVowels = array();

        foreach($vowelArray as $x => $x_value){

            switch($x_value){
                case 0:
                    array_push($zeroVowels, $x);
                    break;
                case 1:
                    array_push($oneVowels, $x);
                    break;
                case 2:
                    array_push($twoVowels, $x);
                    break;
                case 3:
                    array_push($threeVowels, $x);
                    break;
                case 4:
                    array_push($fourVowels, $x);
                    break;
                case 5:
                    array_push($fiveVowels, $x);
                    break;
                case 6:
                    array_push($sixVowels, $x);
                    break;
            }
        }

        function sortByLength($a,$b){
            return strlen($a)-strlen($b);
        }

        usort($zeroVowels, 'sortByLength');
        usort($oneVowels, 'sortByLength');
        usort($twoVowels, 'sortByLength');
        usort($threeVowels, 'sortByLength');
        usort($fourVowels, 'sortByLength');
        usort($fiveVowels, 'sortByLength');
        usort($sixVowels, 'sortByLength');


        fclose($txt_file);
    ?>
    <div class="containerVerticalFlex">
        <div class="navBar">
            <a class="anchorStyling" href="/102938.html">
                <div class="navBarBackgroundItem">
                    <p class="navBarItem">Home</p>
                </div>
            </a>
        </div>
        <div class="containerHorizontalFlex">
            <div class="containerVerticalFlex" style="justify-content: flex-start; gap: 30px;">
                <button id = "zeroVowels" onclick="zeroVowelsDisplay()">Zero Vowels</button>
                <nav>
                    <ul id="zeroVowelsList">
                    </ul>
                </nav>
            </div>
            <div class="containerVerticalFlex">
                <button id = "oneVowel" onclick="oneVowelsDisplay()">One Vowel</button>
                <nav>
                    <ul id="oneVowelsList">
                    </ul>
                </nav>
            </div>
            <div class="containerVerticalFlex">
                <button id = "twoVowels" onclick="twoVowelsDisplay()">Two Vowels</button>
                <nav>
                    <ul id="twoVowelsList">
                    </ul>
                </nav>
            </div>
            <div class="containerVerticalFlex">
                <button id = "threeVowels" onclick="threeVowelsDisplay()">Three Vowels</button>
                <nav>
                    <ul id="threeVowelsList">
                    </ul>
                </nav>
            </div>
            <div class="containerVerticalFlex">
                <button id = "fourVowels" onclick="fourVowelsDisplay()">Four Vowels</button>
                <nav>
                    <ul id="fourVowelsList">
                    </ul>
                </nav>
            </div>
            <div class="containerVerticalFlex">
                 <button id = "fiveVowels" onclick="fiveVowelsDisplay()">Five Vowels</button>
                 <nav>
                    <ul id="fiveVowelsList">
                    </ul>
                </nav>
            </div>
            <div class="containerVerticalFlex">
                <button id = "sixVowels" onclick="sixVowelsDisplay()">Six Vowels</button>
                <nav>
                    <ul id="sixVowelsList">
                    </ul>
                </nav>
            </div>
        </div>

        <div id="area"></div>
    </div>
    <script type="text/javascript">

        var dragSrcEl = null;

        function handleDragStart(e) {
            // Target (this) element is the source node.
            dragSrcEl = this;

            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/html', this.outerHTML);

            this.classList.add('dragElem');
        }
        function handleDragOver(e) {
            if (e.preventDefault) {
                e.preventDefault(); // Necessary. Allows us to drop.
            }
            this.classList.add('over');

            e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

            return false;
        }

        function handleDragEnter(e) {
            // this / e.target is the current hover target.
        }

        function handleDragLeave(e) {
            this.classList.remove('over');  // this / e.target is previous target element.
        }

        function handleDrop(e) {
            // this/e.target is current target element.

            if (e.stopPropagation) {
                e.stopPropagation(); // Stops some browsers from redirecting.
            }

        // Don't do anything if dropping the same column we're dragging.
        if (dragSrcEl != this) {
            // Set the source column's HTML to the HTML of the column we dropped on.
            //alert(this.outerHTML);
            //dragSrcEl.innerHTML = this.innerHTML;
            //this.innerHTML = e.dataTransfer.getData('text/html');
            this.parentNode.removeChild(dragSrcEl);
            var dropHTML = e.dataTransfer.getData('text/html');
            this.insertAdjacentHTML('beforebegin',dropHTML);
            var dropElem = this.previousSibling;
            addDnDHandlers(dropElem);
            
        }
        this.classList.remove('over');
            return false;
        }

        function handleDragEnd(e) {
        // this/e.target is the source node.
            this.classList.remove('over');

        /*[].forEach.call(cols, function (col) {
            col.classList.remove('over');
        });*/
        }

        function addDnDHandlers(elem) {
            elem.addEventListener('dragstart', handleDragStart, false);
            elem.addEventListener('dragenter', handleDragEnter, false)
            elem.addEventListener('dragover', handleDragOver, false);
            elem.addEventListener('dragleave', handleDragLeave, false);
            elem.addEventListener('drop', handleDrop, false);
            elem.addEventListener('dragend', handleDragEnd, false);
        }

        var cols = document.querySelectorAll('ul .column');
        [].forEach.call(cols, addDnDHandlers);

        // --------------------------------------------------------- //
        function zeroVowelsDisplay(){
            let targetList = document.getElementById("zeroVowelsList");
            let zeroVowelArray = <?php echo json_encode($zeroVowels); ?>;
            if(targetList.childElementCount == 0){
                for(let i = 0; i < zeroVowelArray.length; i++){
                let li = document.createElement("li");
                li.innerHTML = zeroVowelArray[i];
                li.classList.add('column');
                li.setAttribute("draggable", "true");
                targetList.appendChild(li);
                }
            }
            else{
                targetList.innerHTML = "";
            }
        }

        function oneVowelsDisplay(){
            let targetList = document.getElementById("oneVowelsList");
            let oneVowelArray = <?php echo json_encode($oneVowels); ?>;
            if(targetList.childElementCount == 0){
                for(let i = 0; i < oneVowelArray.length; i++){
                let li = document.createElement("li");
                li.innerHTML = oneVowelArray[i];
                li.classList.add('column');
                li.setAttribute("draggable", "true");
                targetList.appendChild(li);
                }
            }
            else{
                targetList.innerHTML = "";
            }
        }

        function twoVowelsDisplay(){
            let targetList = document.getElementById("twoVowelsList");
            let twoVowelArray = <?php echo json_encode($twoVowels); ?>;
            if(targetList.childElementCount == 0){
                for(let i = 0; i < twoVowelArray.length; i++){
                let li = document.createElement("li");
                li.innerHTML = twoVowelArray[i];
                li.classList.add('column');
                li.setAttribute("draggable", "true");
                targetList.appendChild(li);
                }
            }
            else{
                targetList.innerHTML = "";
            }
        }

        function threeVowelsDisplay(){
            let targetList = document.getElementById("threeVowelsList");
            let threeVowelArray = <?php echo json_encode($threeVowels); ?>;
            if(targetList.childElementCount == 0){
                for(let i = 0; i < threeVowelArray.length; i++){
                let li = document.createElement("li");
                li.innerHTML = threeVowelArray[i];
                li.classList.add('column');
                li.setAttribute("draggable", "true");
                targetList.appendChild(li);
                }
            }
            else{
                targetList.innerHTML = "";
            }
        }

        function fourVowelsDisplay(){
            let targetList = document.getElementById("fourVowelsList");
            let fourVowelArray = <?php echo json_encode($fourVowels); ?>;
            if(targetList.childElementCount == 0){
                for(let i = 0; i < fourVowelArray.length; i++){
                let li = document.createElement("li");
                li.innerHTML = fourVowelArray[i];
                li.classList.add('column');
                li.setAttribute("draggable", "true");
                targetList.appendChild(li);
                }
            }
            else{
                targetList.innerHTML = "";
            }
        }

        function fiveVowelsDisplay(){
            let targetList = document.getElementById("fiveVowelsList");
            let fiveVowelArray = <?php echo json_encode($fiveVowels); ?>;
            if(targetList.childElementCount == 0){
                for(let i = 0; i < fiveVowelArray.length; i++){
                let li = document.createElement("li");
                li.innerHTML = fiveVowelArray[i];
                li.classList.add('column');
                li.setAttribute("draggable", "true");
                targetList.appendChild(li);
                }
            }
            else{
                targetList.innerHTML = "";
            }
        }

        function sixVowelsDisplay(){
            let targetList = document.getElementById("sixVowelsList");
            let sixVowelArray = <?php echo json_encode($sixVowels); ?>;
            if(targetList.childElementCount == 0){
                for(let i = 0; i < sixVowelArray.length; i++){
                let li = document.createElement("li");
                li.innerHTML = sixVowelArray[i];
                li.classList.add('column');
                li.setAttribute("draggable", "true");
                targetList.appendChild(li);
                }
            }
            else{
                targetList.innerHTML = "";
            }
        }
    </script>
</body>
</html>