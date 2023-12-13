<?php

class CategoryTree {

    public $category = [];
    public $parent = [];

    public function addCategory(string $category, string $parent = null): void 
    {
        if ($parent == null) {
            $parent = "null";
        }

        $this->category[] = $category;
        $this->parent[] = $parent;
    }

    public function getChildren(string $parent): array 
    {
        $result = [];
        $arr = array_combine($this->category, $this->parent);
        
        foreach ($arr as $key => $value) {
            if ($value == $parent) {
                $result[] = $key;
            }
        }

        return $result;
    }
}

$c = new CategoryTree;
$c->addCategory('A', null);
$c->addCategory('B', 'A');
$c->addCategory('C', 'A');
//echo '<pre>';
//var_dump($c->parent);
//echo '</pre>';
//echo '<pre>';
//var_dump($c->getChildren('A'));
//echo '</pre>';
echo implode(',', $c->getChildren('A'));