<?php
namespace Akeneo\CatalogBundle\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;
/**
 *
 * Product type field as document
 *
 * @author    Nicolas Dupont <nicolas@akeneo.com>
 * @copyright Copyright (c) 2012 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *
 * @MongoDB\Document
 */
class ProductFieldMongo
{

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
    * @MongoDB\String
    */
    protected $code;

    /**
     * @MongoDB\Raw
     * @var ArrayCollection
     */
    protected $titles = array();

    /**
     * TODO define custom field type ?
     * @MongoDB\String
     */
    protected $type;

    /**
     * Used locale
     * @var string
     */
    protected $locale;

    /**
    * Constructor
    */
    public function __construct()
    {
        // TODO: prepersist is not enought : MongoException: zero-length keys are not allowed, did you use $ with double quotes?

        $this->locale = 'en_US';
    }

    /**
     * Ensure there is a current locale used
     * @MongoDB\PostLoad¶
     */
    public function postLoad()
    {
        // TODO: use default application locale or current gui locale
        $this->locale = 'en_US';
    }

    /**
    * Ensure there is a current locale used
    * @MongoDB\PrePersist¶
    */
    public function prePersist()
    {
        // TODO: use default application locale or current gui locale
        if (!$this->locale) {
            $this->locale = 'en_US';
        }
    }

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return ProductFieldMongo
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get code
     *
     * @return string $code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return ProductFieldMongo
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return ProductTypeMongo
     */
    public function setTitle($title)
    {
        $this->titles[$this->locale] = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->titles[$this->locale];
    }

    /**
     * Set titles
     *
     * @param raw $titles
     * @return ProductFieldMongo
     */
    public function setTitles($titles)
    {
        $this->titles = $titles;
        return $this;
    }

    /**
     * Get titles
     *
     * @return raw $titles
     */
    public function getTitles()
    {
        return $this->titles;
    }

    /**
    * Get used locale
    * @return string $locale
    */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set used locale
     * @param string $locale
     */
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }
}
