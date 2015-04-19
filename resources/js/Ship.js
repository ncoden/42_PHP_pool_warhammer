var x = document.createElement('script');
x.src = '/resources/js/Map.js';
document.getElementsByTagName("head")[0].appendChild(x);
x.src = 'https://code.createjs.com/tweenjs-0.6.0.min.js';
document.getElementsByTagName("head")[0].appendChild(x);
x.src = 'https://code.createjs.com/easeljs-0.6.0.min.js';
document.getElementsByTagName("head")[0].appendChild(x);
x.src = 'client/Utils.js';
var text1 = 0;
var text2 = 0;
var text3 = 0;
var text4 = 0;
var text5 = 0;
var text6 = 0;
var text7 = 0;
var text8 = 0;
var text8 = 0;
var text9 = 0;
var text10 = 0;
var text11 = 0;
var shadow = 0;
var self = 0;

var stage;
var DIR_SHIP = "/resources/ships/";

var ship_rotation = {
    RIGHT : 0,
    DOWN : 1,
    LEFT : 2,
    UP : 3
}
var array_ships = [];



function Ship (player, id, name, width, height, thesprite, defaultpp, defaulthull, defaultshield, inerty, speed, startmapx, startmapy)
{
    this.tilex = 0;
    this.tiley = 0;
    this.name = name;
    this.id = id;
    this.width = width;
    this.height = height;
    this.defaultpp = defaultpp;
    this.defaulthull = defaulthull;
    this.defaultshield = defaultshield;
    this.inerty = inerty;
    this.speed = speed; 
    this.player = player;
    var img = new Image();
    img.src = DIR_SHIP + thesprite +this.player+ ".png";
    console.log(img.src);
    this.ship = new createjs.Bitmap(img);
    this.shipContainer = new createjs.Container();
    
    var mship = this.ship;
    var mshipcontainer = this.shipContainer;
    this.currotation = ship_rotation.RIGHT;
    this.mapX = startmapx;
    this.mapY = startmapy;

    this.ship.image.onload = function()
    {
        mship.regX = img.width / 2;
        mship.regY = img.height / 2;
        mship.x =  img.width / 2;
        mship.y = img.height / 2;
        mship.scaleX = (_map_tile_width * width ) / img.width;
        mship.scaleY = (_map_tile_height * height) / img.height;
        mshipcontainer.addChild(mship);
        var x = _map_tile_width * startmapx + _mapoffset_X;
        var y = _map_tile_height * startmapy + _mapoffset_Y;
        mshipcontainer.x = x - mship.regX + (mship.scaleX * mship.regX);
        mshipcontainer.y = y - mship.regY + (mship.scaleY * mship.regY);
    }
    
    this.setPos_Map = function(gridX, gridY)
    {
        var x = _map_tile_width * gridX + _mapoffset_X;
        var y = _map_tile_height * gridY + _mapoffset_Y;
        this.mapX = gridX;
        this.mapY = gridY;
        this.shipContainer.x = x - this.ship.regX + (mship.scaleX * mship.regX);
        this.shipContainer.y = y - this.ship.regY + (mship.scaleY * mship.regY);
    }
    this.setRotation = function(therotation) 
    {
        if (therotation == ship_rotation.RIGHT)
        {
            this.ship.rotation = 0;
        }
        else if (therotation == ship_rotation.DOWN)
        {
            this.ship.rotation = 90;
        }
        else if (therotation == ship_rotation.LEFT)
        {
            this.ship.rotation = 180;
        }
        else if (therotation == ship_rotation.UP)
        {
            this.ship.rotation = -90;
        }
    }
    this.rendership = function(mystage)
    {
        mystage.addChildAt(this.shipContainer, mystage.getNumChildren());
    }

    this.Makeclickable = function(mystage)
    {
        if (this.player == 2)
        {
            shadow = new createjs.Shadow("#0000FF", 0, 0, 10);
            text1 = new createjs.Text("NAME:  " + this.name, "13px Arial bold", "#0000FF");
            text2 = new createjs.Text("ENERGY", "13px Arial bold", "#0000FF");
            text3 = new createjs.Text("PP:  " + this.defaultpp, "11px Arial bold", "#BBBBBB");
            text4 = new createjs.Text("HULL:  " + this.defaulthull, "11px Arial bold", "#BBBBBB");
            text5 = new createjs.Text("SHIELD:  " + this.defaultshied, "11px Arial bold", "#BBBBBB");
            text6 = new createjs.Text("MOVEMENT", "13px Arial bold", "#0000FF");
            text7 = new createjs.Text("INERTY:  " + this.inerty, "11px Arial bold", "#BBBBBB");
            text8 = new createjs.Text("SPEED:  " + this.speed, "11px Arial bold", "#BBBBBB");
            text9 = new createjs.Text("POSITION:", "13px Arial bold", "#0000FF");
            text10 = new createjs.Text("X:  " + this.mapX, "11px Arial bold", "#BBBBBB");
            text11 = new createjs.Text("Y:  " + this.mapY, "11px Arial bold", "#BBBBBB");
        }
        else 
        {
            shadow = new createjs.Shadow("#ff0000", 0, 0, 10);
            text1 = new createjs.Text("NAME:  " + this.name, "13px Arial bold", "#FF0000");
            text2 = new createjs.Text("ENERGY", "13px Arial bold", "#FF0000");
            text3 = new createjs.Text("PP:  " + this.defaultpp, "11px Arial bold", "#BBBBBB");
            text4 = new createjs.Text("HULL:  " + this.defaulthull, "11px Arial bold", "#BBBBBB");
            text5 = new createjs.Text("SHIELD:  " + this.defaultshied, "11px Arial bold", "#BBBBBB");
            text6 = new createjs.Text("MOVEMENT", "13px Arial bold", "#FF0000");
            text7 = new createjs.Text("INERTY:  " + this.inerty, "11px Arial bold", "#BBBBBB");
            text8 = new createjs.Text("SPEED:  " + this.speed, "11px Arial bold", "#BBBBBB");
            text9 = new createjs.Text("POSITION:", "13px Arial bold", "#FF0000");
            text10 = new createjs.Text("X:  " + this.mapX, "11px Arial bold", "#BBBBBB");
            text11 = new createjs.Text("Y:  " + this.mapY, "11px Arial bold", "#BBBBBB");
        }
        self = this;
        this.shipContainer.addEventListener("click", function (event){
            self.ship.shadow = shadow;
            text1.textAlign = "left";
            text1.x = 1525;
            text1.y = 400;
            text2.textAlign = "left";
            text2.x = 1525;
            text2.y = 415;
            text3.textAlign = "left";
            text3.x = 1525;
            text3.y = 435;
            text4.textAlign = "left";
            text4.x = 1525;
            text4.y = 450;
            text5.textAlign = "left";
            text5.x = 1525;
            text5.y = 465;
            text6.textAlign = "left";
            text6.x = 1525;
            text6.y = 485;
            text7.textAlign = "left";
            text7.x = 1525;
            text7.y = 500;
            text8.textAlign = "left";
            text8.x = 1525;
            text8.y = 515;
            text9.textAlign = "left";
            text9.x = 1525;
            text9.y = 535;
            text10.textAlign = "left";
            text10.x = 1525;
            text10.y = 560;
            text11.textAlign = "left";
            text11.x = 1525;
            text11.y = 575;
            text1.textBaseline = "alphabetic";
            text1.textBaseline = "alphabetic";
            mystage.addChild(text1);
            mystage.addChild(text2);
            mystage.addChild(text3);
            mystage.addChild(text4);
            mystage.addChild(text5);
            mystage.addChild(text6);
            mystage.addChild(text7);
            mystage.addChild(text8);
            mystage.addChild(text9);
            mystage.addChild(text10);
            mystage.addChild(text11);
        });
    }

    this.setPos = function(posX, posY)
    {
        this.shipContainer.x = posX - this.ship.regX + (mship.scaleX * mship.regX);
        this.shipContainer.y = posY - this.ship.regY + (mship.scaleY * mship.regY);
    }

    this.tweenPos_Map = function(gridX, gridY)
    {
        var x = _map_tile_width * gridX + _mapoffset_X;
        var y = _map_tile_height * gridY + _mapoffset_Y;
        this.mapX = gridX;
        this.mapY = gridY;
        var newx = x - this.ship.regX + (mship.scaleX * mship.regX);
        var newy = y - this.ship.regY + (mship.scaleY * mship.regY);
        createjs.Tween.get(this.shipContainer, { loop: false })
        .to({ x: newx, y:newy }, 200 * this.speed, createjs.Ease.getPowInOut(4));
    }
    this.destroyship= function(mystage)
    {
        mystage.removeChild(this.shipContainer);
    }
}

function update_ships()
{

}

