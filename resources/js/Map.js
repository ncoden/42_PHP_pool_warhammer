var stage;
var colors = ["DimGray", "LightSlateGray", "Green"];
var selected = null;
var squares = [];
var _map_width = 150; 
var _map_height = 100; 
var _map_tile_height = 10;
var _map_tile_width = 10;
var map_prebake_map = true;
var _mapoffset_X = 0;
var _mapoffset_Y = 0;

var _map_text_x;
var _map_text_y;

console.log("MAP LOADED\n");
/**
 *  Returns a random number between 0-2
 */
function getRandomNumber()
{
    return Math.floor(Math.random() * 3);
}
 
function generateGrid(thestage)
{
    var bitmap = new createjs.Bitmap("/resources/bg/bg2.jpg");
    bitmap.image.onload = function()
    {
          var originalW = bitmap.image.width;
          var originalH = bitmap.image.height;
          var desiredW = _map_width * _map_tile_width;
          var desiredH = _map_height * _map_tile_height;
          bitmap.scaleX = desiredW / originalW;
          bitmap.scaleY = desiredH / originalH;
          
    }    
    thestage.addChild(bitmap);
    bitmap.x = _mapoffset_X;
    bitmap.y = _mapoffset_Y;

     bitmap2 = new createjs.Bitmap("/resources/bg/taskbar.png");
    bitmap2.image.onload = function()
    {
        var originalW = bitmap2.image.width;
        var originalH = bitmap2.image.height;
        var desiredW = 1000;
        var desiredH = 320;
        bitmap2.scaleX = desiredW / originalW;
        bitmap2.scaleY = desiredH / originalH;
        bitmap2.x = _map_tile_width* _map_width - 123;
        bitmap2.y = _map_tile_height * _map_height;
        bitmap2.rotation = -90;
        thestage.addChild(bitmap2);
        _map_text_x = new createjs.Text("X: 0.0", "15px Arial", "#ff7700");
        _map_text_x.x = _map_width * _map_tile_width + 30;
        _map_text_x.y = 670;
        _map_text_x.textBaseline = "alphabetic";
        stage.addChild(_map_text_x);
        _map_text_y = new createjs.Text("Y: 0.0", "15px Arial", "#ff7700");
        _map_text_y.x = _map_width * _map_tile_width + 30;
        _map_text_y.y = 690;
        _map_text_y.textBaseline = "alphabetic";
        stage.addChild(_map_text_y);

    }    
    var square;
    var count = 0;
    stage = thestage;
    var square3 = new createjs.Shape();
    square3.graphics.beginFill(colors[2]);
    square3.graphics.drawRect(0, 0, _map_tile_width, _map_tile_height);
    square3.alpha = 0.1;
    if (!map_prebake_map)
    {
        var square1 = new createjs.Shape();
        square1.graphics.beginFill(colors[0]);
        square1.graphics.drawRect(0, 0, _map_tile_width, _map_tile_height);
        var square2 = new createjs.Shape();
        square2.graphics.beginFill(colors[1]);
        square2.graphics.drawRect(0, 0, _map_tile_width, _map_tile_height);
     

        for (var x = 0; x < _map_width; x++)
        {
            for (var y = 0; y < _map_height; y++)
            {
               // var color = colors[count % 2];
                if (count%2)
                    square = square1.clone(true);
                else
                    square = square2.clone(true);
                square.x = x * _map_tile_width;
                square.y = y * _map_tile_height;
               
                square.alpha = 0.7;
                stage.addChild(square);
     
                var id = square.x + "_" + square.y;
                squares[id] = square;
                count++;
                if (y + 1 == _map_height)
                    count--;
            }
        }
    }
  

    stage.addChild(square3);

    stage.on("stagemousemove", function(evt) {
        var x = evt.stageX  -  (evt.stageX % _map_tile_width);
        var y = evt.stageY - ( evt.stageY % _map_tile_height);
        if (x < _map_width * _map_tile_width)
            if (y < _map_height * _map_tile_height)
            {
                square3.x = x;
                square3.y = y;
                square3.alpha = 1;
                _map_text_x.text = "X: "+ x/_map_tile_width;
                _map_text_y.text = "Y: "+ y/_map_tile_height;
                stage.update();
                return;
            }
            square3.alpha = 0;
    });
   
}
 
 