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
namespace Rorua\ArabicRootExtractor;

/**
 * Main entry point.
 *
 * @category Rorua
 * @package  Rorua\ArabicRootExtractor
 * @author   Romain Ruaud <romain.ruaud@gmail.com>
 */
class Extractor
{
    /**
     * @var ExtractorProviderInterface[]
     */
    private $providers;

    /**
     * @var array Default extractors
     */
    private $defaultProviders = [
        "Regular Expressions" => "Rorua\\ArabicRootExtractor\\Provider\\Regex"
    ];

    /**
     * Extractor constructor.
     *
     * @param array $options The options, if any
     */
    public function __construct($options =[])
    {
        $this->registerProviders($this->defaultProviders);

        if (isset($options['providers'])) {
            $this->registerProviders($options['providers']);
        }
    }

    /**
     * Process word's root extraction.
     *
     * @param string $word the word
     *
     * @return array The possible responses by providers
     */
    public function process($word)
    {
        $response = [];

        /** @var ExtractorProviderInterface $provider */
        foreach($this->providers as $providerName => $provider) {
            $response[$providerName] = $provider->extract($word);
        }

        return $response;
    }

    /**
     * Register a bunch of providers
     *
     * @param array $providers The providers
     *
     * @throws \Exception
     */
    private function registerProviders($providers)
    {
        foreach ($providers as $providerName => $providerClassName) {
            $this->registerProvider($providerName, $providerClassName);
        }
    }

    /**
     * Register a unique provider
     *
     * @param string $providerName      The provider Name
     * @param string $providerClassName The provider Class Name
     *
     * @throws \Exception
     */
    private function registerProvider($providerName, $providerClassName)
    {
        $provider = new $providerClassName();

        if (!$provider instanceof ExtractorProviderInterface) {
            throw new \Exception("Provider {$providerName} must implement ExtractorProviderInterface");
        }

        $this->providers[$providerName] = $provider;
    }
}
