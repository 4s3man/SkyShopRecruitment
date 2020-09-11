<?php

namespace Kuba;

class Task6Tree
{
    private $isChanged = false;

    private $treeData = [];

    private $tree = [];

    public function __construct(array $tree = [])
    {
        if ($tree) {
            foreach ($tree as $node) {
                if ($this->isValidNode($node)) {
                    $this->innerAdd($node['id'], $node['parent_id'], $node['name']);
                }
            }
        }
    }

    public function add(int $id, int $parentId, string $name): void
    {
        $this->innerAdd($id, $parentId, $name);
    }

    public function getTree(): array
    {
        if ($this->isChanged) {
            $this->tree = $this->buildTree();
            $this->isChanged = false;
        }

        return $this->tree;
    }

    private function isValidNode(array $node): bool
    {
        $id = $node['id'] ?? null;
        $parentId = $node['parent_id'] ?? null;
        $name = $node['name'] ?? null;

        return is_int($id) && is_int($parentId) && is_string($name);
    }

    private function innerAdd(int $id, int $parentId, string $name): void
    {
        $this->treeData[$id] = ['id' => $id, 'parent_id' => $parentId, 'name' => $name];
        $this->isChanged = true;
    }

    private function buildTree($parentId = 0)
    {
        $branch = [];

        foreach ($this->treeData as $element) {
            if ($element['parent_id'] === $parentId) {
                $children = $this->buildTree($element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }
}
