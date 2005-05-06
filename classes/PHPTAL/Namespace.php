<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
//  
//  Copyright (c) 2004-2005 Laurent Bedubourg
//  
//  This library is free software; you can redistribute it and/or
//  modify it under the terms of the GNU Lesser General Public
//  License as published by the Free Software Foundation; either
//  version 2.1 of the License, or (at your option) any later version.
//  
//  This library is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
//  Lesser General Public License for more details.
//  
//  You should have received a copy of the GNU Lesser General Public
//  License along with this library; if not, write to the Free Software
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
//  
//  Authors: Laurent Bedubourg <lbedubourg@motion-twin.com>
//  

class PHPTAL_NamespaceAttribute
{
    public function __construct($name, $kind, $priority)
    {
        $this->_name = $name;
        $this->_kind = $kind;
        $this->_priority = $priority;
    }

    public function getName(){ return $this->_name; }
    public function getKind(){ return $this->_kind; }
    public function getPriority(){ return $this->_priority; }
    
    private $_name;         /* Attribute name without the namespace: prefix */
    private $_kind;         /* SURROUND | REPLACE | CONTENT */
    private $_priority;     /* [0 - 1000] */
}

class PHPTAL_Namespace
{
    public $xmlns;
    public $name;

    public function __construct($name, $xmlns)
    {
        $this->_attributes = array();
        $this->name = $name;
        $this->xmlns = $xmlns;
    }

    public function hasAttribute($attributeName)
    {
        return array_key_exists(strtolower($attributeName), $this->_attributes);
    }

    public function getAttribute($attributeName)
    {
        return $this->_attributes[strtolower($attributeName)];
    }
    
    public function addAttribute(PHPTAL_NamespaceAttribute $attribute)
    {
        $this->_attributes[strtolower($attribute->getName())] = $attribute;
    }

    public function getAttributes()
    {
        return $this->_attributes;
    }

    protected $_attributes;
}

?>