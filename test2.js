
function Client(firstname, lastname, email) {
    this.firstname = firstname;
    this.lastname = lastname;
    this.email = email;
}

Client.prototype.full_name = function() {
    return this.firstname + ' ' + this.lastname;
}

Client4 = new Client('Dimitar', 'Dimitrov', 'dimitra@abv.bg');
Client5 = new Client('Ivan', 'Dimitrov5', 'dimitra@abv.bg');
Client6 = new Client('Stoyan', 'Dobrev', 'stoyan@abv.bg');
Client7 = new Client('Anelia', 'Petrova', 'anelia@abv.bg');
Client8 = new Client('Boris', 'Borisov', 'boris@abv.bg');

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
clients = [Client4,Client5,Client6,Client7,Client8];
firstnames = [];
for (i in clients) {
    firstnames.push(clients[i].firstname);
}
a=[2,6,1,30,50,20,15,5,6];
a.push(8);
console.log(clients);
console.log(a);
console.log(firstnames);
//clients.sort(compare_clients);

