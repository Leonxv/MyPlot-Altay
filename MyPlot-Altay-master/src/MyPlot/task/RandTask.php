<?php
declare(strict_types=1);
namespace MyPlot\task;

use MyPlot\MyPlot;
use MyPlot\Plot;
use pocketmine\block\Block;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\scheduler\Task;

class RandTask extends Task {
	/** @var MyPlot $plugin */
	private $plugin;
	private $plot, $level, $height, $bottomBlock, $plotFillBlock, $plotFloorBlock, $plotBeginPos, $xMax, $zMax, $maxBlocksPerTick, $pos,$test,$plotSize,$test2,$id,$d;

	/**
	 * ClearPlotTask constructor.
	 *
	 * @param MyPlot $plugin
	 * @param Plot $plot
	 * @param int $maxBlocksPerTick
	 */
	public function __construct(MyPlot $plugin, Plot $plot, int $maxBlocksPerTick = 256,$id,$d) {
        $this->id = $id;
		$this->plot = $plot;
					$this->player = $player;
					$this->plotBeginPos = $plugin->getPlotPosition($plot);
					$this->level = $this->plotBeginPos->getLevel();
					$this->plotBeginPos = $this->plotBeginPos->subtract(1,0,1);
					$plotLevel = $plugin->getLevelSettings($plot->levelName);
					$plotSize = $plotLevel->plotSize;
					$this->xMax = $this->plotBeginPos->x + $plotSize + 1;
					$this->zMax = $this->plotBeginPos->z + $plotSize + 1;
					$this->height = $plotLevel->groundHeight;
					$this->plotWallBlock = $block;
				}
				public function onRun(int $currentTick) : void {
					if($this->height === 32){
						$hs = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32);
						foreach($hs as $h){
					        for($x = $this->plotBeginPos->x; $x <= $this->xMax; $x++) {
						        $this->level->setBlock(new Vector3($x, $h, $this->plotBeginPos->z), $this->plotWallBlock, false, false);
						        $this->level->setBlock(new Vector3($x, $h, $this->zMax), $this->plotWallBlock, false, false);
					        }
					        for($z = $this->plotBeginPos->z; $z <= $this->zMax; $z++) {
						        $this->level->setBlock(new Vector3($this->plotBeginPos->x, $this->height + 1, $z), $this->plotWallBlock, false, false);
						        $this->level->setBlock(new Vector3($this->xMax, $h, $z), $this->plotWallBlock, false, false);
							}
						}
				    }elseif($this->height === 64){
						$hs = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64);
						foreach($hs as $h){
					        for($x = $this->plotBeginPos->x; $x <= $this->xMax; $x++) {
						        $this->level->setBlock(new Vector3($x, $h, $this->plotBeginPos->z), $this->plotWallBlock, false, false);
						        $this->level->setBlock(new Vector3($x, $h, $this->zMax), $this->plotWallBlock, false, false);
					        }
					        for($z = $this->plotBeginPos->z; $z <= $this->zMax; $z++) {
						        $this->level->setBlock(new Vector3($this->plotBeginPos->x, $this->height + 1, $z), $this->plotWallBlock, false, false);
						        $this->level->setBlock(new Vector3($this->xMax, $h, $z), $this->plotWallBlock, false, false);
							}
						}
					}else{
						$this->player->sendMessage("§cUnable world height. Please use 32 or 64!")
					}
				}
			});
		}
	}
}
