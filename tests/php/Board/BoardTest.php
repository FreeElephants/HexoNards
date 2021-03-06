<?php

namespace Hexammon\HexoNardsTests\Board;

use Hexammon\HexoNards\Board\Board;
use Hexammon\HexoNards\Board\Exception\TileOutOfBoundsException;
use Hexammon\HexoNardsTests\AbstractTestCase;

/**
 * @author samizdam <samizdam@inbox.ru>
 */
class BoardTest extends AbstractTestCase
{

    public function testGetTileByCoordinates()
    {
        $tile = $this->createTileWithMocks();

        $board = new Board(Board::TYPE_HEX, ['1.1' => $tile], [], []);
        $actual = $board->getTileByCoordinates('1.1');

        $this->assertSame($actual, $tile);
    }

    public function testGetTileByCoordinatesOutOfBoundsException()
    {
        $board = new Board(Board::TYPE_HEX, [], [], []);

        $this->expectException(TileOutOfBoundsException::class);

        $board->getTileByCoordinates('1.1');
    }

    public function testGetters()
    {
        $tile = $this->createTileWithMocks();
        $board = new Board(Board::TYPE_HEX, ['1.1' => $tile], [], []);
        $this->assertEmpty($board->getRows());
        $this->assertEmpty($board->getColumns());
    }
}