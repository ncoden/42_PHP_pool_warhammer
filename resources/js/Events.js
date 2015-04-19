
var x = document.createElement('script');
x.src = '/resources/js/Ships.js';
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

var		MAP_SHIPS = [];
var		stage;

function Events_init(thestage)
{
	stage = thestage;
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
			if (shipmodels[smkey]['id'] == ships[skey]['id'])
			{
				var mship = new Ship(
					ships[skey]['player'] + 1, 
					ships[skey]['id'],
					shipmodels[smkey]['name'],
					shipmodels[smkey]['width'] * 5,
					shipmodels[smkey]['height'] * 5,
					shipmodels[smkey]['sprite'],
					shipmodels[smkey]['defaultPP'],
					shipmodels[smkey]['defaultHull'],
					shipmodels[smkey]['defaultshield'],
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