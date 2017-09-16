function sum(a,b) {
    var c=a+b; 
    return c;
}

function mp(c,d) {
    var a=c*d;
    return a;
}

function a_sum(a) {
    var s=0;
    var i;
    for (i=0; i<a.length; i++) {
        s += a[i];
    }
    return s;
}

function a_print(f) {
    var i;
    for (i=0; i<f.length; i++) {
        console.log(f[i]);
    }
    return a_sum(f);
}

function a_avg(g) {
    if (g.length>0) {
        return Math.round(a_sum(g)/g.length*100) /100;
        
    } else {
        return 0;
    }
}

function Person(name,salary) {
    this.name=name;
    this.salary=salary;
}

function p_sum(d) {
    var s=0;
    var i;
    for (i=0; i<d.length; i++) {
        s += d[i].salary;

    }
return s;
}