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

function facturiel(n) {
    var res = 1;
    for (i=1; i<=n; i++) {
        res = res * i;
    }
    return res;
}

function facturielr(n) {
    if (n == 1) {
        return facturielr(n-1) * n;
        //return 1;
    } else {
        return facturielr(n-1) * n;
    }    
}

function Person(name) {
    this.name = name;
    this.childs = [];
    this.next = null;
    this.prev = null;
}

Person.prototype.add_child = function(p) {
    this.childs.push(p)
}

Person.prototype.print_names = function() {
    var i;
    console.log(this.name);
    for (i=0; i < this.childs.length; i++) {
        this.childs[i].print_names();
    }
}

function Queue() {
    this.first = null;
    this.last = null;
    this.length = 0;
}

Queue.prototype.push = function(p) {
    if ((typeof p == "object")&&(p.constructor.name == "Person")) {
        if (this.last) {
            this.last.next = p;
            p.prev = this.last;
            this.last = p;
        } else {
            this.first = p;
            this.last = this.first;
        }  
        this.length++;
    } else {
        console.log('Invalid Person');
    }    
}

Queue.prototype.pop = function() {
    var res = this.first;
    if (this.first) {
        if (this.first.next) {
            this.first = this.first.next;
            this.first.prev = null;
        } else {
            this.first = null;
            this.last = null;
        }
        this.length--;
    }    
    return res;
}

function Stack() {
    this.first = null;
    this.last = null;
    this.length = 0;
}

Stack.prototype.push = function(p) {
    if ((typeof p == "object")&&(p.constructor.name == "Person")) {
        if (this.last) {
            this.last.next = p;
            p.prev = this.last;
            this.last = p;
        } else {
            this.first = p;
            this.last = this.first;
        }  
        this.length++;
    } else {
        console.log('Invalid Person');
    }    
}

Stack.prototype.pop = function() {
    var res = this.last;
    if (this.last) {
        if (this.last.prev) {
            this.last = this.last.prev;
            this.last.next = null;
        } else {
            this.first = null;
            this.last = null;
        }
        this.length--;
    }    
    return res;
}

tp = new Person("Ivan");
tp.add_child(new Person("Dimitar"));
tp.add_child(new Person("Stojan"));
tp.childs[0].add_child(new Person("Maria"));
tp.childs[0].add_child(new Person("Petya"));
tp.childs[0].add_child(new Person("Mariana"));
tp.childs[1].add_child(new Person("Mara"));
tp.childs[1].add_child(new Person("Pena"));
tp.childs[1].childs[0].add_child(new Person("Dragan"));
tp.childs[1].childs[0].add_child(new Person("Petkan"));
tp.childs[1].childs[0].childs[0].add_child(new Person("Pencho"));
tp.childs[1].childs[0].childs[1].add_child(new Person("Stojanka"));

first = new Person("Ivan");
last = first;

i = new Person("Dimitar");
last.next = i;
i.prev = last;
last = i;

i = new Person("Stoyan");
last.next = i;
i.prev = last;
last = i;

i = new Person("Maria");
last.next = i;
i.prev = last;
last = i;

q = new Queue();
s = new Stack();
q.push(new Person("Ivan"));
q.push(new Person("Dimitar"));
q.push(new Person("Petar"));
q.push(new Person("Todor"));
q.push(new Person("Blagovest"));
q.push(new Person("Irina"));
q.push(new Person("Petya"));
q.push(new Person("Maria"));

/*
console.log(q.pop());
console.log(q.pop());
console.log(q.pop());
console.log(q.pop());
console.log(q.pop());
console.log(q.pop());
console.log(q.pop());
console.log(q.pop());
console.log(q.pop());
console.log(q.pop());
*/