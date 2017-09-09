var myJs = {};

function Client(firstname, lastname, email) {
    this.firstname = firstname;
    this.lastname = lastname;
    this.email = email;
}

Client.prototype.full_name = function() {
    return this.firstname + ' ' + this.lastname;
}

function Clients() {

}

Clients.prototype.addClient = function(firstname, lastname, email) {
    $("#clients").append('<tr class="client"><td>'+firstname+'</td><td>'+lastname+'</td><td>'+email+'</td></tr>');
}

Clients.prototype.list = function() {
    var clients, i;
    clients = $("tr.client");
    for (i=0; i<clients.length; i++) {
        console.log(clients[i]);
    }
}

Clients.prototype.delete = function(item) {
    var clients = $("tr.client");
    try {
        if (item < clients.length -1) {
            clients[item+1].remove();
        } else {
            alert('Invalid index!');
        }    
    } catch (e) {
        alert('System error!');
    }
}

Clients.prototype.color = function(item, color) {
    var clients = $("tr.client");
    try {
        if (item < clients.length -1) {
            clients[item+1].style['color'] =  color;
        } else {
            alert('Invalid index!');
        }    
    } catch (e) {
        console.log(e);
        alert('System error!');
    }
}

Clients.prototype.bgcolor = function(item, color) {
    var clients = $("tr.client");
    try {
        if (item < clients.length -1) {
            clients[item+1].style['background-color'] =  color;
        } else {
            alert('Invalid index!');
        }    
    } catch (e) {
        console.log(e);
        alert('System error!');
    }
}

Clients.prototype.css = function(item, attr, value) {
    var clients = $("tr.client");
    try {
        if (item < clients.length -1) {
            clients[item+1].style[attr] =  value;
        } else {
            alert('Invalid index!');
        }    
    } catch (e) {
        console.log(e);
        alert('System error!');
    }
}

function Items() {

}

myJs.select = function(sel) {
    var  items = new Items(), item, sel_items, i;
    if (sel.charAt(0) == '#') {
        item = document.getElementById(sel.substring(1));
        items.items ={};
        items.items[0] = item;
        items.items.length = 1;
    } else if (sel.charAt(0) == '.') {
        items.items = document.getElementsByClassName(sel.substring(1));
    } else {

    }
    return items;
}

myJs.Items = function() {

}

Items.prototype.addClass =  function(className) {
    var classes, found, i;
    for (i=0; i<this.items.length; i++) {
        classes = this.items[i].className.split(' ');
        found = false;
        for (j=0; j<classes.length; j++) {
            if (classes[j] == className) {
                found = true;
            }
        }
        if (!found) {
            this.items[i].className += ' ' + className; 
        }
    }
    return this;
}

Items.prototype.removeClass = function(className) {
    var i, classes, newClassName;
    for (i=0; i<this.items.length; i++) {
        classes = this.items[i].className.split(' ');
        newClassName = "";
        for (j=0; j<classes.length; j++) {
            if (classes[j] != className) {
                if (j>0) {
                    newClassName += ' ';
                }
                newClassName += classes[j];
            }
        }
        this.items[i].className = newClassName;
    }
    return this;
}

Items.prototype.showClass = function() {
    var i;
    for (i=0; i<this.items.length; i++) {
        console.log(this.items[i].className);
    }
    return this;
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
