// Creating variables
var myX = 0, myY = 0;
var mumia_left=new Image();
mumia_left.src="mumia-left1.png"
var mumia_right=new Image();
mumia_right.src="mumia-right1.png"
var mumia_up=new Image();
mumia_up.src="mumia-up1.png"
var mumia_down=new Image();
mumia_down.src="mumia-down1.png"
var mumia = mumia_right;
var mumiaX = 0;
var mumiaY = 0;
var planina = new Image();
planina.src = "planina.jpg";

function update() {
 //   myX = myX+(mouseX-myX)/10;
 //   myY = myY+(mouseY-myY)/10;
    if (isKeyPressed [39]) {
        mumia = mumia_right;
        mumiaX = mumiaX + 2;
    }
    if (isKeyPressed[37]) {
        mumia = mumia_left;
        mumiaX = mumiaX - 2;
    }
    if (isKeyPressed[38]) {
        mumia = mumia_up;
        mumiaY = mumiaY - 2;
    }
    if (isKeyPressed[40]) {
        mumia = mumia_down;
        mumiaY = mumiaY + 2;
    }
}

function draw() {
    // This is how you draw a rectangle
   // context.fillRect(myX, myY, 30, 30);
    context.drawImage(planina, 0, 0, 1000, 600);
    context.drawImage(mumia, mumiaX, mumiaY, 150, 150);
};

function keydown(key) {
    // Show the pressed keycode in the console
    console.log("Pressed", key);
         
};

function mouseup() {
    // Show coordinates of mouse on click
    console.log("Mouse clicked at", mouseX, mouseY);
};
