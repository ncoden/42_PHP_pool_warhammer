var x = document.createElement('script');
x.src = '//code.jquery.com/jquery-1.11.2.min.js';
document.getElementsByTagName("head")[0].appendChild(x);
x.src = '/resources/lib/json.js';
document.getElementsByTagName("head")[0].appendChild(x);
x.src = '/resources/lib/json_parse.js';
document.getElementsByTagName("head")[0].appendChild(x);

function AJAX_game_create(name)
{
		/*
<- gameId
<- shipModels (not to be used on the client side)
<- elements
<- weaponModels (not to be used on the client side) 
	This is not a ajax call, just a url
	*/
	 
}

function AJAX_game_id(gameid)
{

	var returnstring = 
"{\"players\":[{\"id\":0,\"name\":\"Brian\"},{\"id\":1,\"name\":\"Bastien\"}],\"shipModels\":[{\"id\":1,\"name\":\"assault\/space_marine\",\"width\":3,\"height\":1,\"sprite\":\"a\",\"defaultPP\":5,\"defaultHull\":10,\"defaultShield\":5,\"inerty\":2,\"speed\":5},{\"id\":2,\"name\":\"chaplain\/sorcerer\",\"width\":3,\"height\":1,\"sprite\":\"b\",\"defaultPP\":5,\"defaultHull\":10,\"defaultShield\":5,\"inerty\":2,\"speed\":5},{\"id\":3,\"name\":\"d\/raptor\",\"width\":3,\"height\":1,\"sprite\":\"c\",\"defaultPP\":5,\"defaultHull\":10,\"defaultShield\":5,\"inerty\":2,\"speed\":5},{\"id\":4,\"name\":\"force_commander\/aspiring\",\"width\":3,\"height\":1,\"sprite\":\"d\",\"defaultPP\":5,\"defaultHull\":10,\"defaultShield\":5,\"inerty\":2,\"speed\":5},{\"id\":5,\"name\":\"greyknights\/tanks\",\"width\":3,\"height\":1,\"sprite\":\"e\",\"defaultPP\":5,\"defaultHull\":10,\"defaultShield\":5,\"inerty\":2,\"speed\":5}],\"ships\":[{\"id\":1,\"player\":1,\"posX\":139,\"posY\":94,\"active\":1,\"state\":1,\"weapons\":[54,56,60,64]},{\"id\":2,\"player\":1,\"posX\":124,\"posY\":92,\"active\":1,\"state\":1,\"weapons\":[54,56,60,64]},{\"id\":3,\"player\":1,\"posX\":111,\"posY\":88,\"active\":1,\"state\":1,\"weapons\":[54,56,60,64]},{\"id\":4,\"player\":1,\"posX\":136,\"posY\":66,\"active\":1,\"state\":1,\"weapons\":[54,56,60,64]},{\"id\":5,\"player\":1,\"posX\":10,\"posY\":30,\"width\":2,\"height\":6,\"active\":1,\"state\":1,\"weapons\":[70,71]},{\"id\":1,\"player\":0,\"posX\":1,\"posY\":1,\"active\":1,\"state\":1,\"weapons\":[54,56,60,64]},{\"id\":2,\"player\":0,\"posX\":23,\"posY\":1,\"active\":1,\"state\":1,\"weapons\":[54,56,60,64]},{\"id\":3,\"player\":0,\"posX\":42,\"posY\":1,\"active\":1,\"state\":1,\"weapons\":[54,56,60,64]},{\"id\":4,\"player\":0,\"posX\":2,\"posY\":13,\"active\":1,\"state\":1,\"weapons\":[54,56,60,64]},{\"id\":5,\"player\":0,\"posX\":30,\"posY\":17,\"width\":2,\"height\":6,\"active\":1,\"state\":1,\"weapons\":[70,71]}],\"elements\":[{\"type\":\"asteroid\",\"posX\":700,\"posY\":25,\"width\":10,\"height\":10},{\"type\":\"asteroid\",\"posX\":800,\"posY\":500,\"width\":10,\"height\":10},{\"type\":\"asteroid\",\"posX\":500,\"posY\":900,\"width\":10,\"height\":10}],\"weaponModels\":[{\"id\":100,\"name\":\"weapon1\",\"shortRange\":10,\"MediumRange\":20,\"LongRange\":30,\"dispersion\":0,\"width\":1},{\"id\":100,\"name\":\"weapon2\",\"shortRange\":10,\"MediumRange\":20,\"LongRange\":30,\"dispersion\":0,\"width\":1}]}";
	console.log("AJAX_game_id " +  gameid);
	var datas= {
		"gameId": gameid
	};
	$.ajax(
	{
		url : '/api/game/load',
		type: 'POST',
		error: function(response)
		{
			PROCESS_game_id(response);
		},
		data : datas,
		success: function(response) 
		{
		   	PROCESS_game_id(response);
		}
	}
);
//ajax call will be asynchronous.... so i must stock and store an event for ajax calls 
	/*
<- players
 <- shipModels
 <- ships ?
 <- elements
 <- weaponModels
 <- weapons ?
	*/

}

function AJAX_game_refresh(gameid)
{
	console.log("AJAX_game_refresh " +  gameid);
	  var datas= [];
	  datas.push({"gameid": gameid});
	$.ajax(
	{
	  url : '/api/game/refresh_test',
	  type: 'POST',
	  error: function(response) {
	      console.log("FAILURE " + gameid);
	   },
	  data : datas,
	  success: function(response) {
	       callback(response);}
	}
	);
}

function AJAX_ship_move(gameid, shipid, pp, rotation, movement)
{
	var returnstring = 
	"";
	/*
	 <- events
	 */
}

function AJAX_ship_fire(gameid, shipid, pp, rotation, movement)
{
	var returnstring = 
	"";
	/*
	<- events
*/
}

function PROCESS_game_create(response)
{
	console.log("PROCESS_game_create: " + response +"\n END_PROCESS_game_create");
}
function PROCESS_game_id(response)
{
	console.log("PROCESS_game_id: " + response +"\n END_PROCESS_game_id");
	//obj = JSON.parse(response);

	//alert(obj.count);
}