<?php
/**
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @category  Rorua
 * @package   Rorua\ArabicRootExtractor
 * @author    Romain Ruaud <romain.ruaud@gmail.com>
 * @copyright 2016 Romain Ruaud
 * @license   Open Software License ("OSL") v. 3.0
 */
namespace Rorua\ArabicRootExtractor\Provider;

use Rorua\ArabicRootExtractor\ExtractorProviderInterface;

/**
 * Regexp. based extractor.
 *
 * @category Rorua
 * @package  Rorua\ArabicRootExtractor
 * @author   Romain Ruaud <romain.ruaud@gmail.com>
 */
class Regex implements ExtractorProviderInterface
{
    /**
     * Extract the triliteral root of a word
     *
     * @param string $word The word
     *
     * @return array
     */
    public function extract($word)
    {
        // TODO: Implement extract() method.
    }
}
