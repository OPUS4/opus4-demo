<?php
/**
 * This file is part of OPUS. The software OPUS has been originally developed
 * at the University of Stuttgart with funding from the German Research Net,
 * the Federal Department of Higher Education and Research and the Ministry
 * of Science, Research and the Arts of the State of Baden-Wuerttemberg.
 *
 * OPUS 4 is a complete rewrite of the original OPUS software and was developed
 * by the Stuttgart University Library, the Library Service Center
 * Baden-Wuerttemberg, the Cooperative Library Network Berlin-Brandenburg,
 * the Saarland University and State Library, the Saxon State Library -
 * Dresden State and University Library, the Bielefeld University Library and
 * the University Library of Hamburg University of Technology with funding from
 * the German Research Foundation and the European Regional Development Fund.
 *
 * LICENCE
 * OPUS is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the Licence, or any later version.
 * OPUS is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details. You should have received a copy of the GNU General Public License
 * along with OPUS; if not, write to the Free Software Foundation, Inc., 51
 * Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 *
 * @category    Test
 * @package     OpusTest\Demo\TestAsset
 * @author      Jens Schwidder <schwidder@zib.de>
 * @copyright   Copyright (c) 2020, OPUS 4 development team
 * @license     http://www.gnu.org/licenses/gpl.html General Public License
 */

namespace OpusTest\Demo\TestAsset;

class TestCase extends \PHPUnit_Framework_TestCase
{

    /**
     * Prüft, ob ein Kommando auf den System existiert (Mac OS-X, Linux)
     * @param string $command Name des Kommandos
     * @return boolean TRUE - wenn Kommando existiert
     */
    protected function isCommandAvailable($command)
    {
        // TODO $this->getLogger()->debug("Checking command $command");
        // TODO $this->getLogger()->debug('User: ' . get_current_user());
        $result = shell_exec("which $command");
        return (empty($result) ? false : true);
    }

    /**
     * Prüft, ob Kommando existiert und markiert Test als Fail oder Skipped.
     *
     * @param string $command Name des Kommandos
     */
    protected function verifyCommandAvailable($command)
    {
        if (! $this->isCommandAvailable($command)) {
            if ($this->isFailTestOnMissingCommand()) {
                $this->fail("Command '$command' not installed.");
            } else {
                $this->markTestSkipped("Skipped because '$command' is not installed.");
            }
        }
    }

    protected function isFailTestOnMissingCommand()
    {
        return false;
    }
}
