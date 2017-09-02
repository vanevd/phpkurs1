var test = {};
test.d1 = 1;  
test.t = 'test';
test.b = 20;

test.full_name = function() {
    return this.firstname + ' ' + this.lastname;
}

var Client1 = new Object();
var Client2 = {};
Client2.firstname = "Ivan1";
Client2.lastname = "Ivanov1";
Client2.full_name = test.full_name;


var Client3 = {
    firstname: "Ivan",
    lastname:"Ivanov",
    email:"ivan@anv.bg",
    full_name: function() {
        return this.firstname + ' ' + this.lastname;
    }
};

function Client(firstname, lastname, email) {
    this.firstname = firstname;
    this.lastname = lastname;
    this.email = email;
}

Client.prototype.full_name = function() {
    return this.firstname + ' ' + this.lastname;
}

function test2() {
    function test1(a1,b1) {
        var b = 15;
        return a1+b1;
    }
    test1(5.6);
}


c = test2();

Client4 = new Client('Dimitar', 'Dimitrov', 'dimitra@abv.bg');
Client5 = new Client('Dimitar5', 'Dimitrov5', 'dimitra@abv.bg');
Client6 = new Client('Dimitar6', 'Dimitrov6', 'dimitra@abv.bg');
Client7 = new Client('Dimitar7', 'Dimitrov7', 'dimitra@abv.bg');
Client8 = new Client('Dimitar8', 'Dimitrov8', 'dimitra@abv.bg,dd@abv.bg,tt@abv.bg');

clients = [Client4,Client5,Client6,Client7,Client8];
console.log(Client1);
console.log(Client2);
console.log(Client3);
console.log(Client4);
console.log(Client5);
console.log(Client6);
console.log(test.b);

for (i in clients) {
    for (j in clients[i]) {
        if (typeof clients[i][j] == 'string') {
            console.log(clients[i][j]);
        }
    }        
}
a = 'firstname';
console.log(Client6[a])
console.log(clients);
console.log('test');
for (i=0, l=clients.length; i<l; i++) {
    console.log(clients[i]);
}
console.log(Client6.lastname.charAt(2));
Client8.email = Client8.email.replace(new RegExp('abv', 'g'), 'mail');
console.log(Client8);

