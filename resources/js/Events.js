
var x = document.createElement('script');
x.src = 'https://code.createjs.com/soundjs-0.6.0.min.js';
document.getElementsByTagName("head")[0].appendChild(x);

var		FLAG_Setup_Ships = false;

var		SHIP_ID_DATA =
{
	1 : "assault/space_marine",
	2 : "chaplain/sorcerer",
	3 : "d/raptor",
	4 : "force_commander/aspiring",
	5 : "greyknights/tanks",
	6 : "t/chaos_lord",
};
var		DIR_SOUND = "/resources/sounds/"

var		MAP_SHIPS = [];
var		stage;

function Events_init(thestage)
{
	stage = thestage;
}

function Event_Load_Sounds()
{
	for (var key in SHIP_ID_DATA)
	{
		var res = SHIP_ID_DATA[key].split("/");
		for (i = 1; i <= 10; i++)
		{
			createjs.Sound.registerSound(DIR_SOUND + res[0]+ i + ".mp3", res[0]+ i );
			createjs.Sound.registerSound(DIR_SOUND + res[1]+ i + ".mp3", res[1]+ i );
		}
		
	}
}

function Event_Clear_Map_Ships()
{
	if (MAP_SHIPS.length > 0)
	{
		for (i = 0; i < MAP_SHIPS.length ; i++)
		{
			MAP_SHIPS[i].destroyship(stage);
		}
	}
	MAP_SHIPS = [];
}

function Event_Render_Map_Ships()
{
	if (MAP_SHIPS.length > 0)
	{
		for (i = 0; i < MAP_SHIPS.length ; i++)
		{
			MAP_SHIPS[i].rendership(stage);
			MAP_SHIPS[i].Makeclickable(stage);
		}
	}
}

function Events_Setup_Ships(shipmodels, ships)
{
	Event_Clear_Map_Ships();
	for (var key in shipmodels)
	{
  		if (shipmodels.hasOwnProperty(key)) 
  			console.log(key + " -> " + shipmodels[key]);
  	}
	for (var skey in ships)
	{
		for (var smkey in shipmodels)
		{
			if (shipmodels[smkey]['id'] == ships[skey]['model'])
			{
				var mship = new Ship(
					ships[skey]['player'] + 1, 
					shipmodels[smkey]['id'],
					ships[skey]['id'],
					shipmodels[smkey]['name'],
					shipmodels[smkey]['width'] * 5,
					shipmodels[smkey]['height'] * 5,
					shipmodels[smkey]['sprite'],
					shipmodels[smkey]['defaultPP'],
					shipmodels[smkey]['defaultHull'],
					shipmodels[smkey]['defaultShield'],
					shipmodels[smkey]['inerty'],
					shipmodels[smkey]['speed'],
					ships[skey]['posX'],
					ships[skey]['posY']);
				MAP_SHIPS.push(mship);
			}
		}
  		//add sound ships[key]['id']
  	}
  	FLAG_Setup_Ships = true;
}

function Events_Load_Sounds()
{

}