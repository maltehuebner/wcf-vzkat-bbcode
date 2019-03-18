<?php declare(strict_types=1);

namespace wcf\system\bbcode;

use wcf\util\StringUtil;

/**
 * Parses the [zeichen] bbcode tag.
 *
 * @author     Malte Hübner
 * @license    GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package    com.woltlab.wcf
 * @subpackage system.bbcode
 * @category   Community Framework
 */
class ZeichenBBCode extends AbstractBBCode
{
    const HOST_NAME = 'http://localhost:8080';

    public function getParsedTag(array $openingTag, $content, array $closingTag, BBCodeParser $parser): string
    {
        if (!isset($openingTag['attributes'][0])) {
            return '';
        }

        if ($parser->getOutputType() === 'text/simplified-html') {
            return $openingTag['attributes'][0];
        }

        $signNumber = $openingTag['attributes'][0];

        return sprintf('<img src="%s/sign/%s" />', self::HOST_NAME, $signNumber);
    }
}