var myJs = {};

function Client(firstname, lastname, email) {
    this.firstname = firstname;
    this.lastname = lastname;
    this.email = email;
}

Client.prototype.full_name = function() {
    return this.firstname + ' ' + this.lastname;
}

myJs.addClass = function(items, className) {
    var classes, found;
    for (i=0; i<items.length; i++) {
        classes = items[i].className.split(' ');
        found = false;
        for (j=0; j<classes.length; j++) {
            if (classes[j] == className) {
                found = true;
            }
        }
        if (!found) {
            items[i].className += ' ' + className; 
        }
    }
}

myJs.removeClass = function(items, className) {
    for (i=0; i<items.length; i++) {
        classes = items[i].className.split(' ');
        newClassName = "";
        for (j=0; j<classes.length; j++) {
            if (classes[j] != className) {
                if (j>0) {
                    newClassName += ' ';
                }
                newClassName += classes[j];
            }
        }
        items[i].className = newClassName;
    }
}

myJs.showClass = function(items) {
    for (i=0; i<items.length; i++) {
        console.log(items[i].className);
    }
}

client4 = new Client('Dimitar', 'Dimitrov', 'dimitra@abv.bg');
client5 = new Client('Ivan', 'Dimitrov5', 'dimitra@abv.bg');
client6 = new Client('Stoyan', 'Dobrev', 'stoyan@abv.bg');
client7 = new Client('Anelia', 'Petrova', 'anelia@abv.bg');
client8 = new Client('Boris', 'Borisov', 'boris@abv.bg');

function compare_clients(a,b) {
    if (a.email == 'stoyan@abv.bg') {
        return -1;
    }
    if (b.email == 'stoyan@abv.bg') {
        return 1;
    }
    if (a.email > b.email) {
        return 1;
    }
    if (a.email < b.email) {
        return -1;
    }
    return 0;
}
clients = [client4,client5,client6,client7,client8];
