<?php

/**
 * Selector
 * Kirby Fileselect Field for Kirby 2
 *
 * @version   1.3.0
 * @author    Jonas Döbertin <hello@jd-powered.net>
 *            for digital storytelling pioneers <digital@storypioneers.com>
 * @copyright digital storytelling pioneers <digital@storypioneers.com>
 * @link      https://github.com/storypioneers/kirby-selector
 * @license   GNU GPL v3.0 <http://opensource.org/licenses/GPL-3.0>
 */

class SelectorField extends BaseField {

    /**
     * Base directory for language files
     *
     * @var string
     * @since 1.2.0
     */
    const LANG_DIR = 'languages';

    /**
     * Define frontend assets
     *
     * @var array
     * @since 1.0.0
     */
    public static $assets = array(
        'css' => array(
            'selector.css',
        ),
        'js' => array(
            'selector.js',
        ),
    );

    /**
     * Select mode (single/multiple)
     *
     * @var string
     * @since 1.0.0
     */
    protected $mode = 'single';

    /**
     * Sort mode
     *
     * @var string
     * @since 1.1.0
     */
    protected $sort = 'filename';

    /**
     * Flip sort order
     *
     * @var string
     * @since 1.1.0
     */
    protected $flip = false;

    /**
     * Covered file types
     *
     * @var array
     * @since 1.0.0
     */
    protected $types = array('all');

    /**
     * Autoselect a file
     *
     * @var string
     * @since 1.2.0
     */
    protected $autoselect = 'none';

    /**
     * Filename filter
     *
     * @var bool|string
     * @since 1.3.0
     */
    protected $filter = false;

    /**
     * Option default values
     *
     * @var array
     * @since 1.0.0
     */
    protected $defaultValues = array(
        'mode'    => 'single',
        'options' => 'all',
    );

    /**
     * Valid option values
     *
     * @var array
     * @since 1.0.0
     */
    protected $validValues = array(
        'mode'  => array(
            'single',
            'multiple',
        ),
        'types' => array(
            'all',
            'image',
            'video',
            'audio',
            'document',
            'archive',
            'code',
            'unknown',
        ),
        'autoselect' => array(
            'none',
            'first',
            'last',
            'all'
        ),
    );

    /**
     * Field setup
     *
     * (1) Load language files
     *
     * @since 1.2.0
     *
     * @return \SelectorField
     */
    public function __construct()
    {
        /*
            (1) Load language files
         */
        $baseDir = __DIR__ . DS . self::LANG_DIR . DS;
        $lang    = panel()->language();
        if(file_exists($baseDir . $lang . '.php'))
        {
            require $baseDir . $lang . '.php';
        }
        else
        {
            require $baseDir . 'en.php';
        }
    }

    /**
     * Magic setter
     *
     * Set a fields property and apply default value if required.
     *
     * @since 1.0.0
     *
     * @param string $option
     * @param mixed  $value
     */
    public function __set($option, $value)
    {
        /* Set given value */
        $this->$option = $value;

        /* Check if value is valid */
        switch($option)
        {
            case 'mode':
                if(!in_array($value, $this->validValues['mode']))
                    $this->mode = $this->defaultValues['mode'];
                break;

            case 'types':
                if(!is_array($value) or empty($value))
                    $this->types = array('all');
                break;

            case 'sort':
                if(!is_string($value) or empty($value))
                    $this->sort = 'filename';
                break;

            case 'flip':
                if(!is_bool($value))
                    $this->flip = false;
                break;

            case 'autoselect':
                if(!in_array($value, $this->validValues['autoselect']))
                    $this->autoselect = 'none';
                break;

            case 'filter':
                if(!is_string($value) or empty($value))
                    $this->filter = false;
                break;
        }
    }

    /**
     * Generate label markup
     *
     * @since 1.0.0
     *
     * @return string
     */
    public function label()
    {
        /* Action button */
        $action = new Brick('a');
        $action->addClass('file-add-button label-option');
        $action->html('<i class="icon icon-left fa fa-plus-circle"></i>' . l('pages.show.files.add'));
        $action->attr('href', purl($this->page(), 'upload'));

        /* Label */
        $label = parent::label();

        /**
         * Fields don't have to have a label assigned.
         * With this, we deal with missing label information.
         *
         * @since 1.3.0
         */
        if(!is_null($label))
        {
            $label->addClass('figure-label');
            $label->append($action);
            return $label;
        }

        return null;
    }

    /**
     * Generate field content markup
     *
     * @since 1.0.0
     *
     * @return string
     */
    public function content()
    {
        $wrapper = new Brick('div');
        $wrapper->addClass('selector');
        $wrapper->data(array(
            'field' => 'selector',
            'name'  => $this->name(),
            'page'  => $this->page(),
            'mode'  => $this->mode,
            'autoselect' => $this->autoselect(),
        ));
        $wrapper->html(tpl::load(__DIR__ . DS . 'template.php', array('field' => $this)));
        return $wrapper;
    }

    /**
     * Return the current value
     *
     * @since 1.0.0
     *
     * @return array
     */
    public function value()
    {
        if(is_string($this->value))
            $this->value = str::split($this->value, ',', 1);

        return $this->value;
    }

    /**
     * Get files based on types option
     *
     * @since 1.0.0
     *
     * @return \Files
     */
    public function files()
    {
        /**
         * FIX: When used in site options, we don't have a `$this->page`
         * property we can use to access the pages files.
         *
         * (1) If we have page property, we'll use that to fetch the files.
         * (2) If we don't have a page property we're on the site options page.
         *     (2.1) If we're using Kirby 2.1+ we can use the new `site()->files()`
         *           method to get access to the new global site files to use them.
         *     (2.2) If we are using a lower version, global site files don't
         *           exist. We'll return an empty collection object instead.
         *
         * @since 1.3.0
         */
        if(!is_null($this->page)) /* (1) */
        {
            $files = $this->page->files(); /* (1) */
        }
        else /* (2) */
        {
            if(version_compare(Kirby::version(), '2.1', '>=')) /* (2.1) */
            {
                $files = site()->files(); /* (2.1) */
            }
            else
            {
                return new Collection; /* (2.2) */
            }
        }

        /**
         * FIX: Create a new reference to $this to overcome the unavailability
         * of $this within closures in PHP < 5.4.0 by passing this new reference
         * with the "use" language construct.
         *
         * @since 1.0.1
         */
        $field = &$this;

        $files = $files->sortBy($this->sort, ($this->flip) ? 'desc' : 'asc')
            ->filter(function($file) use ($field) {
                return $field->includeAllFiles() or in_array($file->type(), $field->types);
            });

        /**
         * Filter files by filename if a filter has been set.
         *
         * @since 1.3.0
         */
        if($this->filter)
        {
            $files = $files->filterBy('filename', '*=', $this->filter);
        }

        return $files;
    }

    /**
     * Generate file slug
     *
     * @since 1.0.0
     *
     * @param  \File $file
     * @return string
     */
    public function itemId($file)
    {
        return $this->name() . '-' . str::slug($file->filename());
    }

    /**
     * Check if a file is present in the current value
     *
     * @since 1.0.0
     *
     * @param  \File $file
     * @return bool
     */
    public function isInValue($file)
    {
        return in_array($file->filename(), $this->value());
    }

    /**
     * Check if the types array includes "all"
     *
     * @since 1.0.0
     *
     * @return bool
     */
    public function includeAllFiles()
    {
        return in_array('all', $this->types);
    }

}
