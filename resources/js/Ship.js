var x = document.createElement('script');
x.src = '/resources/js/Map.js';
document.getElementsByTagName("head")[0].appendChild(x);
x.src = 'https://code.createjs.com/tweenjs-0.6.0.min.js';
document.getElementsByTagName("head")[0].appendChild(x);
x.src = 'https://code.createjs.com/easeljs-0.6.0.min.js';
document.getElementsByTagName("head")[0].appendChild(x);
x.src = 'client/Utils.js';

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
        var shadow = new createjs.Shadow("#ff0000", 0, 0, 5);
        var self = this;
        this.shipContainer.addEventListener("click", function (event){
            self.ship.shadow = shadow;
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

    }
}

function update_ships()
{

}