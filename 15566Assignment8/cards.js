// define the functions
function printCard() {
    var nameLine = "<strong>Name: </strong>" + this.name + "<br>";
    var emailLine = "<strong>Email: </strong>" + this.email + "<br>";
    var addressLine = "<strong>Address: </strong>" + this.address + "<br>";
    var phoneLine = "<strong>Phone: </strong>" + this.phone + "<br>";
    var birthday = "<strong>Birthday: </strong>" + this.birthday + "<hr>";
    document.write(nameLine, emailLine, addressLine, phoneLine, birthday);
    }

    function Card(name,email,address,phone,birthday) {
    this.name = name;
    this.email = email;
    this.address = address;
    this.phone = phone;
    this.birthday = birthday;
    this.printCard = printCard;
    }

    // Create the objects
    var sue = new Card("Sue Suthers", "sue@suthers.com", "123 Elm Street",
    "555-555-9876", "01/27/2001");
    var fred = new Card("Fred Fanboy", "fred@fanboy.com", "233 Oak Lane",
    "555-555-4444", "01/27/2001");
    var jimbo = new Card("Jimbo Jones", "jimbo@jones.com", "233 Walnut Circle",
    "555-555-1344", "01/27/2001");

    // Now print them
    sue.printCard();
    fred.printCard();
    jimbo.printCard();
