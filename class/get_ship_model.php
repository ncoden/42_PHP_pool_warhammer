<html>
<head>
</head>
<body>
<?php
/** The name of the database */
define('DB_NAME', 'rush01');
/** MySQL database username */
define('DB_USER', 'root');
/** MySQL database password */
define('DB_PASSWORD', '123456');
/** MySQL hostname */
define('DB_HOST', 'localhost');

class init_connec
{
	public static function init()
	{
		// Create connection
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}
}

class buildShipModel
{
	private $_id;
	private $_name;
	private $_width;
	private $_height;
	private $_sprite;
	private $_defaultPp;
	private $_defaultHull;
	private $_defaultShield;
	private $_inertia;
	private $_speed;
	private $_category;

	public function __construct($ship_model)
	{
		$this->$_id = $ship_model['id'];
		$this->$_name = $ship_model['name'];
		$this->$_width = $ship_model['width'];
		$this->$_height = $ship_model['height'];
		$this->$_sprite = $ship_model['sprite'];
		$this->$_defaultPp = $ship_model['defaultPp'];
		$this->$_defaultHull = $ship_model['defaultHull'];
		$this->$_defaultShield = $ship_model['defaultShield'];
		$this->$_inertia = $ship_model['inertia'];
		$this->$_speed = $ship_model['speed'];
		$this->$_category = $ship_model['category'];
	}
}

class niquetamerephp {

static $_array_ships_models = array();

	static public function getShipModels($id, $conn)
	{
		global $_array_ships_models;
		foreach ($_array_ships_models as $key => $obj)
		{
			if ($obj->id == $id)
			{
				return ($obj);
			}
		}
		$sql = "SELECT * FROM shipsmodel WHERE id='$id'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
				$obj = new buildShipModel($row);	
		    }
		} else {
		    echo "0 results";
		}
	}
}
$conn = init_connec::init();
niquetamerephp::getShipModels(1, $conn);
?>
</body>