<?php

require_once('Licorne.class.php');

class Ship extends Licorne
{
	const						STATE_OK = 1;
	const						STATE_KILLED = 2;

	private						$_id;
	private						$_round;
	private						$_model;
	private						$_player;
	private						$_orientation;
	private						$_moving;
	private						$_pp;
	private						$_speed;
	private						$_hull;
	private						$_shield;
	private						$_weapons;

	public static function		doc()
	{
		return (file_get_contents('Ship.doc.txt'));
	}

	public function				__construct(array $kwargs)
	{
		if (isset($kwargs['id'])
			&& isset($kwargs['round'])
			&& isset($kwargs['model'])
			&& isset($kwargs['player'])
			&& isset($kwargs['posX'])
			&& isset($kwargs['posY'])
			&& isset($kwargs['orientation'])
			&& isset($kwargs['moving'])
			&& isset($kwargs['pp'])
			&& isset($kwargs['speed'])
			&& isset($kwargs['hull'])
			&& isset($kwargs['shield'])
			&& isset($kwargs['weapons']))
		{
			$this->_id = $kwargs['id'];
			$this->_round = intval($kwargs['round']);
			$this->_model = intval($kwargs['model']);
			$this->_player = intval($kwargs['player']);
			$this->setPos(intval($kwargs['posX']), intval($kwargs['posY']));
			$this->_orientation = intval($kwargs['orientation']);
			$this->_moving = intval($kwargs['moving']);
			$this->_pp = intval($kwargs['pp']);
			$this->_speed = intval($kwargs['speed']);
			$this->_hull = intval($kwargs['hull']);
			$this->_shield = intval($kwargs['shield']);
			$this->_weapons = $kwargs['weapons'];
		}
	}

	public function				usePP(array $kwargs)
	{
		$sum = array_recursive_sum($kwargs);
		if ($this->_p > $sum)
		{
			// update pp
			$this->_pp -= $sum;
			DataBase::update('ships', $this->_id, array('pp' => $this->_pp));

			// increase speed
			if (isset($kwargs['speed']))
			{
				for ($i = 0; $i <  $kwargs['speed']; $i++)
					$this->_speed += Dice::toss();
				DataBase::update('ships', $this->_id, array('speed' => $this->_speed));
			}

			// increase shield
			if (isset($kwargs['shield']))
			{
				$this->_shield += $kwargs['shield'];
				DataBase::update('ships', $this->_id, array('shield' => $this->_speed));
			}

			// increase weapon
			if (isset($kwargs['weapons'])
				&& is_array($kwargs['weapons']))
			{
				foreach ($kwargs['weapons'] as $id => $weapon_point)
				{
					if (in_array($id, $this->_weapons))
					{
						$weapon = InstanceManager::getWeapon($id);
						$charge = $weapon->getCharge() + $weapon_point;
						$weapon->setCharge($charge);
						DataBase::update('weapons', $id, array('charge' => $charge));
					}
				}
			}

			// repair ship
			if (isset($kwargs['repair']) && !$this->moving)
			{
				while ($kwargs['repair'] > 0
					&& $this->_hull < $this->_model->_default_hull)
				{
					if (Dice::toss() == 6)
						$this->_hull++;
					$kwargs['repair']--;
				}
				DataBase::update('ships', $this->_id, array('hull' => $this->_hull));
			}
		}
	}

	public function				inflictDamages($damages)
	{
		// Inflict damages to shield
		$this->_shield -= $damages;
		if ($this->_shield < 0)
		{
			// if shield is destroyed, inflict others damages to hull
			$this->$_hull += $this->_shield;
			$this->_shield = 0;
			if ($this->_hull <= 0)
			{
				// if hull is destroyed, kill the ship
				$this->_hull = 0;
				$this->kill();
			}
			DataBase::update('ships', $this->_id, array('hull' => $this->_hull));
		}
		DataBase::update('ships', $this->_id, array('shield' => $this->_shield));
	}

	public function				kill()
	{
		EventManager::trigger('ship_killed', $this->_id);
		DataBase::update('ships', $this->_id, array('state' => self::STATE_KILLED));
		$this->_state = self::STATE_KILLED;
	}
}

?>