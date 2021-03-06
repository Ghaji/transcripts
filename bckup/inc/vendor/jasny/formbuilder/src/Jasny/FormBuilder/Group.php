<?php

namespace Jasny\FormBuilder;

/**
 * Base class for an HTML element with children.
 */
class Group extends Element
{
    /**
     * The HTML tag name.
     * @var string
     */
    const TAGNAME = null;
    
    /**
     * Child nodes of the group.
     * @var array
     */
    protected $children = [];
    
    
    /**
     * Add a decorator to the element.
     * 
     * @param Decorator|string $decorator  Decorator object or name
     * @param mixed            $_          Additional arguments are passed to the constructor
     * @return Element  $this
     */
    public function addDecorator($decorator)
    {
        // parent::addDecorator($decorator, ...$_);
        call_user_func_array([get_parent_class(), 'addDecorator'], func_get_args());
        
        foreach ($this->getChildren() as $child) {
            if ($this->getOption('decorate') === false) continue;
            $decorator->apply($child, true);
        }
        
        return $this;
    }

    /**
     * Apply decorators from parent
     * 
     * @param Group $parent
     */
    protected function applyDeepDecorators($parent)
    {
        if ($this->getOption('decorate') === false) return;
        
        parent::applyDeepDecorators($parent);
        
        foreach ($this->getChildren() as $child) {
            $child->applyDeepDecorators($parent);
        }
    }
    
    
    /**
     * Add an child to the group.
     * 
     * @param Element|string $child
     * @param array          $options  Element options
     * @param array          $attr     HTML attributes
     * @return Group $this
     */
    public function add($child, array $options=[], array $attr=[])
    {
        if (!isset($child)) return $this;
        
        if (is_string($child) && $child[0] !== '<') {
            $child = $this->build($child, $options, $attr);
        }
        
        if ($child instanceof Element) $child->setParent($this);
        $this->children[] = $child;
        
        if ($child instanceof Element) $child->applyDeepDecorators($this);
        
        return $this;
    }
    
    /**
     * Add an child and return it.
     * 
     * @param Element|string $child
     * @param array          $options  Element options
     * @param array          $attr     HTML attributes
     * @return Element $child
     */
    public function begin($child, array $options=[], array $attr=[])
    {
        if (is_string($child) && $child[0] !== '<') {
            $child = $this->build($child, $options, $attr);
        }
        
        if (!$child instanceof Element) {
            throw new \InvalidArgumentException("To add a " . gettype($child) . " use the add() method");
        }
        
        $this->add($child);
        return $child;
    }
    
    
    /**
     * Get the children of the group.
     * 
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }
    
    /**
     * Find a specific child through deep search.
     * 
     * @param Element|string $element  Element name or #id
     * @param boolean        $unlink   Unlink the found element
     * @return Element
     */
    protected function deepSearch($element, $unlink=false)
    {
        if (is_string($element)) {
            if ($element[0] === '#') {
                $id = substr($element, 1);
            } else {
                $name = $element;
            }
        }
        
        $found = null;
        foreach ($this->children as $i=>$child) {
            if (!$child instanceof Element) continue;
            
            if (isset($id)) {
                if ($child->getId() === $id) $found = $child;
            } elseif (isset($name)) {
                if ($child->getName() == $name) $found = $child;
            } elseif (isset($element)) {
                if ($child === $element) $found = $child;
            }
            
            if ($found && $unlink) unset($this->children[$i]);
            
            if (!$found && $child instanceof Group) {
                $found = $child->deepSearch($element);
            }
            
            if (isset($found)) return $found;
        }
        
        return null; // Not found
    }
    
    /**
     * Get a specific child (deep search).
     * 
     * @param string  $name    Element name or #id
     * @return Element
     */
    protected function get($name)
    {
        return $this->deepSearch($name);
    }
    
    /**
     * Get all the form elements in the group (deep search).
     * 
     * @return Control[]
     */
    public function getControls()
    {
        $elements = [];
        
        foreach ($this->children as $child) {
            if ($child instanceof Control) {
                $name = $child->getName();
                if ($name) {
                    $elements[$name] = $child;
                } else {
                    $elements[] = $child;
                }
            } elseif ($child instanceof Group) {
                $elements = array_merge($elements, $child->getControls());
            }
        }
        
        return $elements;
    }
    
    /**
     * Remove a specific child (deep search)
     * 
     * @param Element|string $element  Element, element name or #id
     * @return Group $this
     */
    public function remove($element)
    {
        if ($this->deepSearch($element, true)) {
            $element->parent = null;
        }
        
        return $this;
    }
    
    /**
     * Set the element content.
     * 
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        foreach ($this->children as $child) {
            if ($child instanceof Element) $child->parent = null;
        }
        
        $this->children = isset($content) ? [$content] : [];
        return $this;
    }
    
    
    /**
     * Set the values of the elements.
     * 
     * @param array $values
     * @return Group  $this
     */
    public function setValues($values)
    {
        $values = (array)$values;

        foreach ($this->getControls() as $element) {
            $name = $element->getName();
            if ($name && isset($values[$name])) $element->setValue($values[$name]);
        }
        
        return $this;
    }
    
    /**
     * Get the values of the elements.
     * 
     * @return array
     */
    public function getValues()
    {
        $values = [];
        
        foreach ($this->getControls() as $element) {
            if ($element->getName()) $values[$element->getName()] = $element->getValue();
        }
        
        return $values;
    }
    
    /**
     * Validate the elements in the group.
     * 
     * @return boolean
     */
    protected function validate()
    {
        $ret = true;
        
        foreach ($this->children as $child) {
            if (!$child instanceof Element || $child->getOption('validation') == false) continue;
            $ret = $ret && $child->isValid();
        }
        
        return $ret;
    }
    
    
    /**
     * Render the opening tag
     * 
     * @return string
     */
    public function open()
    {
        $tagname = $this::TAGNAME;
        return $tagname ? "<{$tagname} {$this->attr}>" : null;
    }

    /**
     * Render the closing tag
     * 
     * @return string
     */
    public function close()
    {
        $tagname = $this::TAGNAME;
        return $tagname ? "</{$tagname}>" : null;
    }
    
    /**
     * Render the content of the HTML element.
     * 
     * @return string
     */
    protected function renderContent()
    {
        $items = [];

        foreach ($this->children as $child) {
            if (!isset($child) || ($child instanceof Element && !$child->getOption('render'))) continue;
            $items[] = $child instanceof Element ? $child = $child->toHTML() : $child;
        }

        return join("\n", $items);
    }
    
    /**
     * Render the child to HTML.
     * 
     * @return string
     */
    protected function render()
    {
        return $this->open() . "\n" . $this->getContent() . "\n" . $this->close();
    }
}
