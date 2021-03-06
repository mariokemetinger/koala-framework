<?php
/**
 * @package Model
 * @subpackage Iterator
 */
class Kwf_Model_Tree_RecursiveIterator implements RecursiveIterator
{
    private $_rowset;

    public function __construct(Kwf_Model_Tree_Row $row)
    {
        $this->_rowset = $row->getChildNodes();
    }

    public function current()
    {
        return $this->_rowset->current();
    }

    public function key()
    {
        return $this->_rowset->key();
    }

    public function next()
    {
        return $this->_rowset->next();
    }

    public function rewind()
    {
        return $this->_rowset->rewind();
    }

    public function valid()
    {
        return $this->_rowset->valid();
    }

    public function getChildren()
    {
        $c = get_class($this);
        return new $c($this->current());
    }

    public function hasChildren()
    {
        return $this->current()->getChildNodes()->count() > 0;
    }
}
