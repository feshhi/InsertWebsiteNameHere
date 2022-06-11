
// initialize the counter and the array
var numbernames=0;
var names = new Array();
function SortNames() {
   document.theform.sorted.value = "";
   // Get the name from the text field
   thename=document.theform.newname.value;
   thename = thename.toUpperCase();
   // Add the name to the array
   names[numbernames]=thename;
   // Increment the counter
   numbernames++;
   // Sort the array
   names.sort();

   for(let i = 0; i < names.length; i++){
      document.theform.sorted.value += + (i + 1) + ". " +  names[i] + "\n";
   }

}
